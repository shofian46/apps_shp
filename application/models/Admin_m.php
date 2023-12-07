<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model{
	public function get_entries()
	{
		$query = $this->db->get('user_role');
		if (count($query->result()) > 0) {
			return $query->result();
		}
	}
}
?>
