<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
  }
  
  public function nacitajData($id) {
    $query = $this->db->get_where('cars', array('vodic' => $id));
    $car = $query->result_array();

    if ($query->num_rows() > 0) {
      $this->db->select('*');
      $this->db->from('rides');
      $this->db->join('users', 'rides.id_sofer = users.id');
      $this->db->join('cars', 'users.id = cars.vodic');
      $this->db->where('rides.id_sofer', $id);
      $query = $this->db->get();
      return $query->result_array();
    } else {
      $this->db->select('*');
      $this->db->from('rides');
      $this->db->join('users', 'rides.id_sofer = users.id');
      $this->db->where('rides.id_sofer', $id);
      $query = $this->db->get();
      return $query->result_array();
    }
  }

  public function nacitajSpodok($id) {
    $this->db->select('*');
    $this->db->from('rides');
    $this->db->join('cars', 'cars.id_car = rides.auto');
    $this->db->where('rides.id_sofer', $id);
    $this->db->order_by('rides.time','desc');        
    $query = $this->db->get();
    return $query->result_array();
  }

  public function pridajJazdu($check, $kilometers, $amount, $id_car) {
    
  }
}
