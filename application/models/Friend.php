<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friend extends CI_model {

	public function get_all($id){
		$query = "SELECT friends.id, friends.alias FROM `users` 
		join friendships ON users.id = friendships.user_id
		JOIN users friends on friendships.friend_id = friends.id
		WHERE users.id = ?;";
		return $this->db->query($query, $id)->result_array();
	}
	public function other_users($id){
		$query = "SELECT id, alias
		FROM users
		WHERE users.id NOT IN
		(
		SELECT friend_id FROM friendships WHERE user_id = '$id'
		UNION 
		SELECT user_id FROM friendships WHERE friend_id = '$id'
		)";
		return $this->db->query($query)->result_array();
	}
	public function view_friends_profile($data){
		
		$query = "SELECT friends.alias, friends.name, friends.email FROM `users` 
		join friendships ON users.id = friendships.user_id
		JOIN users friends on friendships.friend_id = friends.id
		WHERE users.id = ? and friends.id = ?;";
		return $this->db->query($query, $data)->result_array();
	}
	public function add_to_list($data){
		$this->db->insert('friends_app.friendships', $data);
	}
	public function remove_from_friends($data){
		$this->db->delete('friends_app.friendships', $data);
	}
	public function view_other_users_profile($data){
		$user_id = $data['user_id'];
			$query = "SELECT id,name, alias, email
			FROM users
			WHERE users.id NOT IN
			(
			SELECT friend_id FROM friendships WHERE user_id = '$user_id'
			UNION 
			SELECT user_id FROM friendships WHERE friend_id = '$user_id'
			) AND users.id =5";

			return $this->db->query($query, $data)->result_array();
	}
}