<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		//$this->load->model('Buy_model');
	}

	public function index() {

		$data = array();

		$data['check'] = $this->session->userdata('check');

		$this->load->view('templates/header');
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');

	}
}
