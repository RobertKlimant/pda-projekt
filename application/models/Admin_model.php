<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
  public function __construct()
	{
		$this->load->database();
	}
	
	public function nacitajGraf($date) {
		$this->db->select('*');
		$this->db->from('rides');
		$query = $this->db->get();
		$arrayRides = $query->result_array();

		$pocet = 0;
		foreach ($arrayRides as $value) {
			$dbtime = date("Y-m-d", strtotime($value['time']));

			if ($dbtime == $date) {
				$pocet++;
			}
		}

		return $pocet;
	}

	public function zamestnanciLoad($id) {
		if ($id == '') {
			$this->db->select('*');
			$this->db->from('users');
			//$this->db->join('cars', 'users.id = cars.vodic');
			$query = $this->db->get();
			$arrayUsers = $query->result_array();
			$skuska = array();
			$i = 0;
			foreach ($arrayUsers as $value) {
				$this->db->select('*');
				$this->db->from('cars');
				//$this->db->join('cars', 'users.id = cars.vodic');
				$this->db->where('vodic', $value['id']);
				$query = $this->db->get();
				$spz = $query->result_array();
				if (!empty($spz)) {
					$arrayUsers[$i] += array('spz' => $spz[0]['spz']);
				} else {
					$arrayUsers[$i] += array('spz' => '---');
				}
				$i++;
			}
			return $arrayUsers;
		} else {
			$this->db->select('*');
			$this->db->from('users');
			//$this->db->join('cars', 'users.id = cars.vodic');
			$this->db->where('id', $id);
			$query = $this->db->get();
			$arrayUsers = $query->result_array();
			$skuska = array();
			$i = 0;
			foreach ($arrayUsers as $value) {
				$this->db->select('*');
				$this->db->from('cars');
				//$this->db->join('cars', 'users.id = cars.vodic');
				$this->db->where('vodic', $id);
				$query = $this->db->get();
				$spz = $query->result_array();
				if (!empty($spz)) {
					$arrayUsers[$i] += array('spz' => $spz[0]['spz'], 'znacka' => $spz[0]['znacka'], 'id_car' => $spz[0]['id_car']);
				} else {
					$arrayUsers[$i] += array('spz' => '---');
				}
				$i++;
			}
			return $arrayUsers;
		}
	}

	public function jazdyLoad($id) {
		if ($id == "") {
			$this->db->select('*');
			$this->db->from('rides');
			$this->db->order_by('rides.time','desc');   
			$query = $this->db->get();
			return $query->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('rides');
			$this->db->where('id_jazda', $id);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function autaLoad($id) {
		if ($id == "") {
			$this->db->select('*');
			$this->db->from('cars');
			$query = $this->db->get();
			return $query->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('cars');
			$this->db->where('id_car', $id);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function pridatZamestnanec($meno, $priezvisko, $loginname, $loginpassword, $plat) {
    $data = array(
      'idnumber'=>$loginname,
      'password'=>$loginpassword,
      'meno'=>$meno,
			'priezvisko'=>$priezvisko,
			'plat'=>$plat,
    );
    $insert = $this->db->insert('users', $data);
    return $insert;
	}

	public function upravitZamestnanec($meno, $priezvisko, $loginname, $loginpassword, $plat, $car, $id_user) {
    $data = array(
      'idnumber'=>$loginname,
      'password'=>$loginpassword,
      'meno'=>$meno,
			'priezvisko'=>$priezvisko,
			'plat'=>$plat,
		);
		$this->db->where('id', $id_user);
		$this->db->update('users', $data);

		if ($car == "nejde") {
			$this->db->where('vodic', $id_user);
			$this->db->update('cars', array('vodic' => null));
		} else {
			$this->db->where('vodic', $id_user);
			$this->db->update('cars', array('vodic' => null));
			$this->db->where('id_car', $car);
			$this->db->update('cars', array('vodic' => $id_user));
		}

    return true;
	}

	public function pridatAuto($znacka, $spz) {
    $data = array(
      'znacka'=>$znacka,
      'spz'=>$spz
    );
    $insert = $this->db->insert('cars', $data);
    return $insert;
	}

	public function upravitAuto($znacka, $spz, $id_auto) {
    $data = array(
      'znacka'=>$znacka,
      'spz'=>$spz
		);
		$this->db->where('id_car', $id_auto);
		$this->db->update('cars', $data);

    return true;
	}
	
	public function delete($id) {
		$delete = $this->db->delete('users',array('id'=>$id));
		return $delete;
	}

	public function deleteauto($id) {
		$delete = $this->db->delete('cars',array('id_car'=>$id));
		return $delete;
	}
}
?>