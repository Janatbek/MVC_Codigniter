<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('index-medical');
	}
	public function service()
	{
		$this->load->view('page-services-3');
	}
	public function about_us()
	{
		$this->load->view('page-about');
	}
	public function insurance()
	{
		$this->load->view('page-about-4');
	}
	public function team()
	{
		$this->load->view('page-team');
	}
	public function choose()
	{
		$this->load->view('page-about-me');
	}
	public function faq()
	{
		$this->load->view('page-faq');
	}
	public function appointment()
	{
		$this->load->view('page-contact-2');
	}


}
