<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data= array(
			'title' => 'Dashboard',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array())
		;

		$this->template->load('template', 'user/index', $data);
	}
}
