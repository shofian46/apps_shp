<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		is_logged_in();
		$this->load->model('Admin_m', 'admin');
	}

	public function index()
	{
		$data= array(
			'title' => 'Admin',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array())
		;

		$this->template->load('template', 'admin/index', $data);
	}

	public function role(){
		$data= array(
			'title' => 'Role',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'role' => $this->admin->get_entries()
			);
    $this->template->load('template', 'admin/role/index', $data);
  }

	public function a_role(){
    // Add Role
		$data= array(
			'title' => 'Role',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			);
    // Form Validation
    $this->form_validation->set_rules('d_role', 'Role', 'required|trim');

    if ($this->form_validation->run() == true) {
      $this->_addRole();
    }
    $this->template->load('template', 'admin/role/a_role', $data);
  }

	private function _addRole(){
    $data = [
      'role' => $this->input->post('d_role'),
    ];
      $this->db->insert('user_role', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Successfully added a new role!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>',
		'</div>');
        redirect('admin/role');
  }

	public function e_role($r_id){
    // Edit Role
		$data= array(
			'title' => 'Role',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'r_old' => $this->db->get_where('user_role', ['id' => $r_id])->row_array()
			);
    // Form Validation
    $this->form_validation->set_rules('d_role', 'Role Name', 'required|trim');

    if ($this->form_validation->run() == false) {
			$this->template->load('template', 'admin/role/e_role', $data);
    } else {
      $role = $this->input->post('d_role');
      $this->_editRole($r_id, $role);
    }
  }

	private function _editRole($r_id, $role){
    $data=['role'=>$role];
    $this->db->update('user_role', $data, ['id' => $r_id]);
    $this->session->set_flashdata('message', '
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				Successfully update a role!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
    redirect('admin/e_role/'.$r_id);
  }

	public function d_role($r_id)
  {
    $query = 'ALTER TABLE `user_role` AUTO_INCREMENT = 1';
    $this->db->delete('user_role', ['id' => $r_id]);
    $this->db->query($query);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Successfully deleted a role!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>'
			);
    redirect('admin/role');
  }

	public function roleAccess($role_id){
    // Edit Role
		$data= array(
			'title' => 'Role',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'role' => $this->db->get_where('user_role', ['id' => $role_id])->row_array()
		);

    $this->db->where('id !=', 1);
    $data['menu'] = $this->db->get('user_menu')->result_array();
    $data['user_role']= $this->db->get_where('user_role',['id' => $this->session->userdata('role_id')])->row_array();

		$this->template->load('template', 'admin/role/role-access', $data);
    
  }

	public function changeAccess(){
		$menuId = $this->input->post('menuId');
		$roleId = $this->input->post('roleId');

		$data=[
			'role_id' => $roleId,
			'menu_id' => $menuId
		];

		$result = $this->db->get_where('user_access', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access', $data);
		}else{
			$this->db->delete('user_access', $data);
		}

		$this->session->set_flashdata('message', '
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				Successfully Access Changed!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
	}
}
