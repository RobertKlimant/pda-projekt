<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index() {

		$data = array();

		$data['title'] = 'User';

		$check = $this->session->userdata('check');

		if (empty($check)) {
			redirect('/login');
		}

		$data['check'] = $check;

		$array = $this->Users_model->nacitajData($check);

		$data['array'] = $array;

		$spodokArray = $this->Users_model->nacitajSpodok($check);

		$data['spodokArray'] = $spodokArray;


		$this->load->view('templates/header', $data);
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer', $data);

	}

	public function add() {
		$data = array();

		$data['title'] = 'Add drive | User';

		$check = $this->session->userdata('check');

		if (empty($check)) {
			redirect('/login');
		}

		$array = $this->Users_model->nacitajData($check);

		$data['array'] = $array;

		if (isset($_POST['pridatJazdu'])) {
			$kilometers = $_POST['kilometers'];
			$kilometers = preg_replace("/[^0-9]/", "", $kilometers);
			$amount = $_POST['amount'];
			$amount = preg_replace("/[^0-9]/", "", $amount);

			if (!$kilometers || !$amount) {
				$data['error_msg'] = 'Vyplň všetky polia';
			} else {
				$pridat = $this->Users_model->pridajJazdu($check, $kilometers, $amount, $array[0]['id_car']);
				if ($pridat) {
					redirect('/users');
				}
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('users/add', $data);
		$this->load->view('templates/footer', $data);
	}

	public function view($id_jazda) {
		$data = array();

		$data['title'] = 'View drive | User';

		$check = $this->session->userdata('check');

		if (empty($check)) {
			redirect('/login');
		}

		$view = $this->Users_model->detailJazdy($check, $id_jazda);

		$data['array'] = $view;

		$this->load->view('templates/header', $data);
		$this->load->view('users/view', $data);
		$this->load->view('templates/footer', $data);
	}

	public function logout() {
		$check = $this->session->userdata('check');

		if (empty($check)) {
			redirect('/login');
		}

		$this->session->sess_destroy();
		redirect('/login');
	}
}