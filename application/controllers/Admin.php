<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$data = array();

		$data['title'] = 'Admin';

		$id = '';

		$data['arrayZamestnanci'] = $this->Admin_model->zamestnanciLoad($id);
		$data['arrayJazdy'] = $this->Admin_model->jazdyLoad($id);
		$data['arrayAuta'] = $this->Admin_model->autaLoad($id);

		//graf
		$today = date("Y-m-d");

		$graf = array();

		for ($i = 5; $i >= 0; $i--) {
			$skuska = array();

			$minus = strtotime($today);
			$minusDone = strtotime('-'.$i.' days', $minus);
			$minus = date("Y-m-d", $minusDone);

			$vrateneHodnoty = $this->Admin_model->nacitajGraf($minus);

			$shortMinus = date("m.d/y", $minusDone);

			$skuska = array('date' => $shortMinus, 'pocet' => $vrateneHodnoty);

		
			array_push($graf, $skuska);
		}


		$data['graf'] = $graf;

		$this->load->view('templates/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function addzamestnanec() {

		$data = array();
		
		$data['title'] = 'Pridaj zamestnanca';

		if (isset($_POST['pridatZamestnanca'])) {
			$meno = $_POST['meno'];
			$priezvisko = $_POST['priezvisko'];
			$loginname = $_POST['loginname'];
			$loginpassword = $_POST['loginpassword'];
			$plat = $_POST['plat'];

			if (!$meno || !$priezvisko || !$loginname || !$loginpassword || !$plat) {
				$data['error_msg'] = 'Vyplň všetky polia';
			} else {
				$pridat = $this->Admin_model->pridatZamestnanec($meno, $priezvisko, $loginname, $loginpassword, $plat);
				if ($pridat) {
					redirect('/admin');
				}
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('admin/addzamestnanec', $data);
		$this->load->view('templates/footer', $data);
		$data['error_msg'] = '';
	}

	public function editzamestnanec($id) {
		$data = array();
		
		$data['title'] = 'Uprav zamestnanca';

		if (isset($_POST['upravitZamestnanca'])) {
			$meno = $_POST['meno'];
			$priezvisko = $_POST['priezvisko'];
			$loginname = $_POST['loginname'];
			$loginpassword = $_POST['loginpassword'];
			$plat = $_POST['plat'];
			$car = $_POST['jazdi'];
			$id_user = $_POST['id_user'];

			if (!$meno || !$priezvisko || !$loginname || !$loginpassword || !$plat || !$car || !$id_user) {
				$data['error_msg'] = 'Vyplň všetky polia';
			} else {
				$edit = $this->Admin_model->upravitZamestnanec($meno, $priezvisko, $loginname, $loginpassword, $plat, $car, $id_user);
				//$data['error_msg'] = $car;
				if ($edit) {
					redirect('/admin');
				}
			}
		}
		$carsAll = "";
		$data['cars'] = $this->Admin_model->autaLoad($carsAll);
		$data['arrayZamestnanci'] = $this->Admin_model->zamestnanciLoad($id);

		$this->load->view('templates/header', $data);
		$this->load->view('admin/editzamestnanec', $data);
		$this->load->view('templates/footer', $data);
		$data['error_msg'] = '';
	}

	public function delete($id) {
		$vymazat = $this->Admin_model->delete($id);

		if ($vymazat) {
			redirect('/admin');
		}
	}

	public function viewjazda($id) {
		
		$data = array();
		
		$data['title'] = 'Pozri jazdu';

		$data['arrayJazdy'] = $this->Admin_model->jazdyLoad($id);

		$this->load->view('templates/header', $data);
		$this->load->view('admin/viewjazda', $data);
		$this->load->view('templates/footer', $data);
	}

	public function addauto() {

		$data = array();
		
		$data['title'] = 'Pridaj auto';

		if (isset($_POST['pridatAuto'])) {
			$znacka = $_POST['znacka'];
			$spz = $_POST['spz'];

			if (!$znacka || !$spz) {
				$data['error_msg'] = 'Vyplň všetky polia';
			} else {
				$pridat = $this->Admin_model->pridatAuto($znacka, $spz);
				if ($pridat) {
					redirect('/admin');
				}
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('admin/addauto', $data);
		$this->load->view('templates/footer', $data);
		$data['error_msg'] = '';
	}

	public function editauto($id) {
		$data = array();
		
		$data['title'] = 'Uprav Auto';

		if (isset($_POST['upravitAuto'])) {
			$meno = $_POST['meno'];
			$priezvisko = $_POST['priezvisko'];
			$loginname = $_POST['loginname'];
			$loginpassword = $_POST['loginpassword'];
			$plat = $_POST['plat'];
			$car = $_POST['jazdi'];
			$id_user = $_POST['id_user'];

			if (!$meno || !$priezvisko || !$loginname || !$loginpassword || !$plat || !$car || !$id_user) {
				$data['error_msg'] = 'Vyplň všetky polia';
			} else {
				$edit = $this->Admin_model->upravitZamestnanec($meno, $priezvisko, $loginname, $loginpassword, $plat, $car, $id_user);
				//$data['error_msg'] = $car;
				if ($edit) {
					redirect('/admin');
				}
			}
		}

		$data['cars'] = $this->Admin_model->autaLoad($id);

		$this->load->view('templates/header', $data);
		$this->load->view('admin/editauto', $data);
		$this->load->view('templates/footer', $data);
		$data['error_msg'] = '';
	}

	public function deleteauto($id) {
		$vymazat = $this->Admin_model->deleteauto($id);

		if ($vymazat) {
			redirect('/admin');
		}
	}
}
