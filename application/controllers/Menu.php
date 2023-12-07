<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Menu_m');
		is_logged_in();
	}

	public function index(){
		$data=[
			'title' => 'Menu Management',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'menu' => $this->db->get('user_menu')->result_array()
		];

		$this->template->load('template', 'menu/index', $data);
	}

	public function a_menu(){
    // Add Menu
    $data=[
			'title' => 'Menu Management',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];
    // Form Validation
    $this->form_validation->set_rules('m_menu', 'Menu', 'required|trim');

    if ($this->form_validation->run() == true) {
      $this->_addMenu();
    }
    $this->template->load('template', 'menu/a_menu', $data);
  }

	private function _addMenu(){
    $data = [
      'menu' => $this->input->post('m_menu'),
    ];
    $m_id=$this->input->post('m_id');
      $this->db->insert('user_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully added a new menu!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
      redirect('menu');
  }

	public function d_menu($m_id)
  {
    $query = 'ALTER TABLE `user_menu` AUTO_INCREMENT = 1';
    $this->db->delete('user_menu', ['id' => $m_id]);
    $this->db->query($query);
    $this->session->set_flashdata('message', 
				'<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully deleted a menu!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
    redirect('menu');
  }

	public function e_menu($m_id)
  {
    // Edit Menu
    $data=[
			'title' => 'Menu Management',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'm_old' => $this->db->get_where('user_menu', ['id' => $m_id])->row_array()
		];
    // Form Validation
    $this->form_validation->set_rules('m_menu', 'Menu', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->template->load('template', 'menu/e_menu', $data);
    } else {
      $menu = $this->input->post('m_menu');
      $this->_editMenu($m_id, $menu);
    }
  }

	private function _editMenu($m_id, $menu)
  {
    $data=['menu'=>$menu];
    $this->db->update('user_menu', $data, ['id' => $m_id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
        Successfully update a menu!</div>');
    redirect('menu/e_menu/'.$m_id);
  }

	public function fetch_menu(){
		if ($this->input->is_ajax_request()) {
			if ($posts = $this->Menu_m->get_entries()) {
				$data = ['responce' => 'success', 'post' => $posts];
			}else{
				$data = ['responce' => 'error', 'message' => 'Failed to fetch data'];
			}
			echo json_encode($data);
		}else{
			echo 'No direct script access allowed';
		}
	}

	public function submenu(){
		$data=[
			'title' => 'Submenu',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'submenu' => $this->Menu_m->getSubMenu()
		];

		$this->template->load('template', 'menu/submenu/index', $data);
	}

	public function a_submenu()
  {
    // Submenu Data
		$data=[
			'title' => 'Submenu',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'menu' => $this->db->get('user_menu')->result_array()
		];
    // Form Validation
    $this->form_validation->set_rules('m_id', 'Menu', 'required|trim');
    $this->form_validation->set_rules('m_title', 'Title', 'required|trim');
    $this->form_validation->set_rules('m_url', 'Url', 'required|trim');
    $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
    $this->form_validation->set_rules('is_active', 'Active', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->template->load('template', 'menu/submenu/a_submenu', $data);
    }else{
      $this->_addSubmenu();
    }
  }

	private function _addSubmenu()
  {
    $data = [
      'menu_id' => $this->input->post('m_id'),
      'title' => $this->input->post('m_title'),
      'url' => $this->input->post('m_url'),
      'icon' => $this->input->post('icon'),
      'is_active' => $this->input->post('is_active'),
    ];
      $this->db->insert('user_submenu', $data);
      $this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">Successfully added a new submenu!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>'
			);
      redirect('menu/submenu');
  }

	public function e_submenu($sm_id)
  {
      // Edit Submenu
		 $data=[
			'title' => 'Submenu',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'sm_old' => $this->db->get_where('user_submenu', ['id' => $sm_id])->row_array(),
			'menu' => $this->db->get('user_menu')->result_array(),
			'submenu' => $this->db->get('user_submenu')->result_array()
		];
      // Form Validation
      $this->form_validation->set_rules('m_id', 'Menu', 'required|trim');
      $this->form_validation->set_rules('m_title', 'Title', 'required|trim');
      $this->form_validation->set_rules('m_url', 'Url', 'required|trim');
      $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
      $this->form_validation->set_rules('is_active', 'Active', 'required|trim');

      if ($this->form_validation->run() == false) {
        $this->template->load('template', 'menu/submenu/e_submenu', $data);
      } else {
        $sm_id = $this->input->post('sm_id');
        $menuId = $this->input->post('m_id');
        $title = $this->input->post('m_title');
        $url = $this->input->post('m_url');
        $icon = $this->input->post('icon');
        $isActive = $this->input->post('is_active');
        $data=[
          'id' => $sm_id,
          'menu_id' => $menuId,
          'title'=> $title,
          'url' =>$url,
          'icon' => $icon,
          'is_active' => $isActive
        ];
        $this->_editSubmenu($sm_id, $data);
      }
  }

	private function _editSubmenu($sm_id, $data)
  {
    $this->db->where('id', $sm_id); 
    $this->db->update('user_submenu', $data, ['id' => $sm_id]);
    $this->session->set_flashdata('message',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">Successfully edited a submenu!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
    redirect('menu/e_submenu/'.$sm_id);
  }

	public function d_submenu($sm_id)
  {
    $query = 'ALTER TABLE `user_submenu` AUTO_INCREMENT = 001';
    $this->db->delete('user_submenu', ['id' => $sm_id]);
    $this->db->query($query);
    $rows = $this->db->affected_rows();
    if ($rows > 0) {
      $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">Failed to delete submenu!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>'
			);
    } else {
      $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">Successfully deleted an submenu!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>'
		);
    }
    redirect('menu/submenu');
  }
}
