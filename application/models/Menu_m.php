<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_m extends CI_Model{

	public function get_entries(){
		$query = $this->db->get('user_menu');
		if (count($query->result()) > 0) {
			# code...
			return $query->result();
		}
	}

	public function getSubMenu(){
		$query = "SELECT `user_submenu`.*, `user_menu`.`menu`
							FROM `user_submenu` JOIN `user_menu` 
							ON `user_submenu`.`menu_id` = `user_menu`.`id`
							";
		return $this->db->query($query)->result_array();
	}

	public function insert_entry($data){
		return $this->db->insert('user_menu', $data);
	}

	public function delete_entry($id){
		return $this->db->delete('user_menu', ['id' =>$id]);
	}

	public function edit_entry($id){
		$this->db->select('*')
						 ->from('user_menu')
						 ->where('id', $id);
		$query= $this->db->get();
		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	public function update_entry($data){
		return $this->db->update('user_menu', $data, ['id' => $data['id']]);
	}
}
?>
