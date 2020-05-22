<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
  }

  function check($idnumber, $password) {
    $query = $this->db->get_where('users', array('idnumber' => $idnumber, 'password' => $password));
    $array = $query->result_array();

    if ($query->num_rows() > 0 && $query->num_rows() < 2) {
      return $array;
    } else {
      return '0';
    }
	}
}