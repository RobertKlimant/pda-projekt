<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {
  public function __construct()
	{
		$this->load->database();
  }
  
  function vypisPlatby(/*$id=""*/) {
		/*if(!empty($id)){
			$query = $this->db->get_where('skuska', array('payment_id' => $id));
			return $query->row_array();
		}else{
			$query = $this->db->get('skuska');
			return $query->result_array();
    }*/
		$query = $this->db->get('skuska');
    return $query->result_array();
	}
}

?>