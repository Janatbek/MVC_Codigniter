<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_model {

	public function register($userInfo){

		$query = "INSERT INTO users (
		name,
		alias,
		email,
		password,
		dob,
		created_at,
		updated_at)
		VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
		$this->db->query($query, array(
			$userInfo['name'],
			$userInfo['alias'],
			$userInfo['email'],
			$userInfo['password'],
			$userInfo['dob'],
			));
		return $this->db->insert_id();
	}

	public function login($userInfo){
		$query = "SELECT id, name FROM users
							WHERE email = ?
							AND password = ?";
		return $this->db->query($query, array(
			$userInfo['email'],
			$userInfo['password']))->row_array();
	}

}