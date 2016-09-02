<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friends extends CI_Controller {

	public function  __construct(){
		parent::__construct();
		$this->load->model('friend');
		$this->viewdata = array();
		$this->viewdata['name'] = $this->session->userdata('name');
		$this->viewdata['id'] = $this->session->userdata('id');
		if ($this->session->userdata('loggedin')!=true){
			session_destroy();
			redirect('/');
		}
	}
	public function index(){
		$data = $this->viewdata;
		$data['all_friends'] = $this->friend->get_all($this->session->userdata('id')); 
		$data['other_users'] = $this->friend->other_users($this->session->userdata('id'));
		$this->load->view('main_view', $data);
	}
	public function view($id){
		$data['friends_profile'] = $this->friend->view_friends_profile(array('user_id' => $this->session->userdata('id'), 'friends.id' => $id));
		$this->load->view('friends_profile_view', $data);
	}
	public function delete($id){
		//received id #2
		$this->friend->remove_from_friends(array('friend_id' => $id, 'user_id' => $this->session->userdata('id')));
		redirect('/friends');
	}
	public function add($id){
		$this->friend->add_to_list(array('friend_id' => $id, 'user_id' => $this->session->userdata('id')));
		redirect('/friends');
	}
	public function view_other_users_profile($id){
		$data['other_users_profile'] = $this->friend->view_other_users_profile(array('user_id' => $this->session->userdata('id'), 'users.id' => $id));
		$this->load->view('other_profile_view', $data);
	}


}