<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->view('loginAndReg');
	}
	public function register(){
		$this->load->model('user');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('alias', 'Alias', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|trim|matches[password]');
		$this->form_validation->set_rules('dob', 'Date of birth','required|trim');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('loginAndReg');
		}else{
			$id = $this->user->register(array(
				'email' => $this->input->post('email'),
				'name' => $this->input->post('name'),
				'alias' => $this->input->post('alias'),
				'password' => $this->input->post('password'),
				'dob' => $this->input->post('dob'),
				));

			$this->session->set_userdata('id', $id);
			$this->session->set_userdata('loggedin', true);
			$this->session->set_userdata('name', $this->input->post('name'));
			redirect('/friends');
		}

	}
	public function login(){
		$this->load->model('user');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('loginAndReg');
		}else{
			$userData = $this->user->login($this->input->post());
			if (empty($userData)) {
				redirect('/');
			}
			$this->session->set_userdata($userData);
			$this->session->set_userdata('loggedin', true);
			redirect('/friends');
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}
