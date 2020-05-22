<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		//$this->load->model('Welcome_model');
	}

	public function index()
	{
		$data = array();

		$data['meno'] = 'Róbert';
		$data['priezvisko'] = 'Klimant';

		$data['title'] = 'Admin';

		$this->load->view('templates/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
