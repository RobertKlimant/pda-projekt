<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
    parent::__construct();
    $this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Login_model');
	}

	public function index()
	{
    $data = array();

    //ziskanie sprav zo session
		/*if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
    }*/
    
    if ($this->session->userdata('loggedin') == 'true') {
      redirect('/users');
    }

    $data['title'] = 'Login';

    if (isset($_POST['submit'])) {

      $idnumber = $_POST['idnumber'];
      $password = $_POST['password'];

      if (!$idnumber || !$password) {
        $data['error_msg'] = 'Vyplň všetky polia';
      } else {
        $data['idnumber'] = $idnumber;

        $check = $this->Login_model->check($idnumber, $password);
        
        if ($check) {
          $this->session->set_userdata('loggedin', 'true');
          $this->session->set_userdata('check', $check);
          foreach ($check as $value) {
            $this->session->set_userdata('check', $value['id']);
          }
          redirect('/users');
        } else {
          $data['error_msg'] = 'Nesprávne prihlasovacie údaje';
        }
      }
    }

    $this->load->view('templates/header', $data);
    $this->load->view('login/index', $data);
    $this->load->view('templates/footer', $data);

    $data['error_msg'] = '';
  }
  
  public function login() {
    
  }
}
?>