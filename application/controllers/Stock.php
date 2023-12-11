<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->Model('Master_m');
		is_logged_in();
	}

	public function stock_in_data(){
		$data=[
			'title' => 'StockIn',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
		];

		$this->template->load('template', 'stock/in/index', $data);
	}

	public function stock_in_add(){
		$data=[
			'title' => 'StockIn',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
		];

		$this->template->load('template', 'stock/in/add', $data);
	}
}
