<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->Model('Master_m');
		is_logged_in();
	}

	public function index(){
			$data=[
			'title' => 'Gudang',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'gudang' => $this->db->get('gudang')->result_array()
		];

		$this->template->load('template', 'master/gudang/index', $data);
	}

	public function a_gudang(){
		$data=[
			'title' => 'Gudang',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'gudangid' => $this->Master_m->getIdGudang()
		];

		// Form Validation
    $this->form_validation->set_rules('m_kode_gudang', 'ID Gudang', 'required|trim');
    $this->form_validation->set_rules('m_gudang', 'Gudang', 'required|trim');

    if ($this->form_validation->run() == true) {
      $this->_addGudang();
    }
		$this->template->load('template', 'master/gudang/a_gudang', $data);
	}

	private function _addGudang(){
    $data = [
      'kode_gudang' => $this->input->post('m_kode_gudang'),
      'nama_gudang' => $this->input->post('m_gudang'),
    ];
    $m_kode_gudang=$this->input->post('m_kode_gudang');
      $this->db->insert('gudang', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully added a new gudang!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
      redirect('master');
  }

	public function e_gudang($gudang_id)
  {
    // Edit Menu
    $data=[
			'title' => 'Gudang',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'gd_old' => $this->db->get_where('gudang', ['id_gudang' => $gudang_id])->row_array()
		];
    // Form Validation
    $this->form_validation->set_rules('m_kode_gudang', 'ID Gudang', 'required|trim');
    $this->form_validation->set_rules('m_gudang', 'Gudang', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->template->load('template', 'master/gudang/e_gudang', $data);
    } else {
      $kode_gudang = $this->input->post('m_kode_gudang');
      $gudang = $this->input->post('m_gudang');
      $this->_editGudang($gudang_id, $gudang, $kode_gudang);
    }
  }

	private function _editGudang($gudang_id, $gudang, $kode_gudang)
  {
    $data=['nama_gudang'=>$gudang, 'kode_gudang' => $kode_gudang];
    $this->db->update('gudang', $data, ['id_gudang' => $gudang_id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success rounded-0 mb-2" role="alert">
        Successfully update a gudang!</div>');
    redirect('master/e_gudang/'.$gudang_id);
  }

	public function d_gudang($gudang_id)
  {
    $query = 'ALTER TABLE `gudang` AUTO_INCREMENT = 1';
    $this->db->delete('gudang', ['id_gudang' => $gudang_id]);
    $this->db->query($query);
    $this->session->set_flashdata('message', 
				'<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully deleted a gudang!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
    redirect('master/gudang');
  }

	public function category(){
		$data=[
			'title' => 'Category',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'category' => $this->db->get('category')->result_array()
		];

		$this->template->load('template', 'master/category/index', $data);
	}

	public function a_category(){
		$data=[
			'title' => 'Cetgory',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'categoryId' => $this->Master_m->getIdCategory()
		];

		// Form Validation
    $this->form_validation->set_rules('m_kode_category', 'ID Category', 'required|trim');
    $this->form_validation->set_rules('m_category', 'Category', 'required|trim');

    if ($this->form_validation->run() == true) {
      $this->_addCategory();
    }
		$this->template->load('template', 'master/category/a_category', $data);
	}

	private function _addCategory(){
    $data = [
      'kode_category' => $this->input->post('m_kode_category'),
      'nama_category' => $this->input->post('m_category'),
    ];
    $m_kode_category=$this->input->post('m_kode_category');
      $this->db->insert('category', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully added a new category!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
      redirect('master/category');
  }

	public function e_category($m_id_category)
  {
    // Edit Menu
    $data=[
			'title' => 'Category',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'cat_old' => $this->db->get_where('category', ['id_category' => $m_id_category])->row_array()
		];
    // Form Validation
    $this->form_validation->set_rules('m_kode_category', 'Kode Category', 'required|trim');
    $this->form_validation->set_rules('m_category', 'Category', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->template->load('template', 'master/category/e_category', $data);
    } else {
      $category = $this->input->post('m_category');
      $kodecategory = $this->input->post('m_kode_category');
      $this->_editCategory($m_id_category, $category, $kodecategory);
    }
  }

	private function _editCategory($m_id_category, $category, $kodecategory)
  {
    $data=['nama_category'=>$category, 'kode_category' => $kodecategory];
    $this->db->update('category', $data, ['id_category' => $m_id_category]);
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully update a category!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
    redirect('master/e_category/'.$m_id_category);
  }

	public function d_category($m_id_category)
  {
    $query = 'ALTER TABLE `category` AUTO_INCREMENT = 1';
    $this->db->delete('category', ['id_category' => $m_id_category]);
    $this->db->query($query);
    $this->session->set_flashdata('message', 
				'<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully deleted a category!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
    redirect('master/category');
  }

	public function warna(){
		$data=[
			'title' => 'Warna',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'warna' => $this->db->get('warna')->result_array()
		];

		$this->template->load('template', 'master/warna/index', $data);
	}

	public function a_warna(){
		$data=[
			'title' => 'Warna',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'warnaId' => $this->Master_m->getIdWarna()
		];

		// Form Validation
    $this->form_validation->set_rules('m_kode_warna', 'ID Warna', 'required|trim');
    $this->form_validation->set_rules('m_warna', 'Warna', 'required|trim');

    if ($this->form_validation->run() == true) {
      $this->_addWarna();
    }
		$this->template->load('template', 'master/warna/a_warna', $data);
	}

	private function _addWarna(){
    $data = [
      'kode_warna' => $this->input->post('m_kode_warna'),
      'nama_warna' => $this->input->post('m_warna'),
    ];
    $m_kode_warna=$this->input->post('m_kode_warna');
      $this->db->insert('warna', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully added a new warna!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
      redirect('master/warna');
  }

	public function d_warna($m_kode_warna)
  {
    $query = 'ALTER TABLE `warna` AUTO_INCREMENT = 1';
    $this->db->delete('warna', ['kode_warna' => $m_kode_warna]);
    $this->db->query($query);
    $this->session->set_flashdata('message', 
				'<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully deleted a warna!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
    redirect('master/warna');
  }

	public function e_warna($m_id_warna)
  {
    // Edit Menu
    $data=[
			'title' => 'Warna',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'wrn_old' => $this->db->get_where('warna', ['id_warna' => $m_id_warna])->row_array()
		];
    // Form Validation
    $this->form_validation->set_rules('m_kode_warna', 'ID Warna', 'required|trim');
    $this->form_validation->set_rules('m_warna', 'Warna', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->template->load('template', 'master/warna/e_warna', $data);
    } else {
      $warna = $this->input->post('m_warna');
      $kodewarna = $this->input->post('m_kode_warna');
      $this->_editWarna($m_id_warna, $warna, $kodewarna);
    }
  }

	private function _editWarna($m_id_warna, $warna, $kodewarna)
  {
    $data=['nama_warna'=>$warna, 'kode_warna'=>$kodewarna,];
    $this->db->update('warna', $data, ['id_warna' => $m_id_warna]);
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully update a warna!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
    redirect('master/e_warna/'.$m_id_warna);
  }
	
	public function barang(){
		$data=[
			'title' => 'Barang',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'barang' => $this->Master_m->getBarang()
		];

		$this->template->load('template', 'master/barang/index', $data);
	}

	public function a_barang(){
		$data=[
			'title' => 'Barang',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'warnaId' => $this->db->get('warna')->result_array(),
			'gudangId' => $this->db->get('gudang')->result_array(),
			'barangId' => $this->Master_m->getIdBarang()
		];

		// Form Validation
    $this->form_validation->set_rules('m_kode_barang', 'ID Barang', 'required|trim');
    $this->form_validation->set_rules('m_barang', 'Barang', 'required|trim');

    if ($this->form_validation->run() == true) {
      $this->_addBarang();
    }
		$this->template->load('template', 'master/barang/a_barang', $data);
	}

	private function _addBarang(){
    $data = [
      'kode_barang' => $this->input->post('m_kode_barang'),
      'nama_barang' => $this->input->post('m_barang'),
      'warna_id' => $this->input->post('m_kode_warna'),
      'satuan' => $this->input->post('satuan'),
      'gudang_id' => $this->input->post('m_kode_gudang'),
      'stok' => $this->input->post('stok'),
    ];
    $m_kode_barang=$this->input->post('m_kode_barang');
      $this->db->insert('m_barang', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully added a new barang!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
      redirect('master/barang');
  }

	public function e_barang($m_id_barang)
  {
    // Edit Menu
    $data=[
			'title' => 'Barang',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'brg_old' => $this->db->get_where('m_barang', ['id_barang' => $m_id_barang])->row_array(),
			'warnaId' => $this->db->get('warna')->result_array(),
			'gudangId' => $this->db->get('gudang')->result_array(),
			'barangId' => $this->Master_m->getIdBarang()
		];
    // Form Validation
    $this->form_validation->set_rules('m_kode_barang', 'ID Barang', 'required|trim');
    $this->form_validation->set_rules('m_barang', 'Barang', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->template->load('template', 'master/barang/e_barang', $data);
    } else {
			$m_kode_barang = $this->input->post('m_kode_barang');
			$m_nama_barang = $this->input->post('m_barang');
			$m_warna_id = $this->input->post('m_kode_warna');
			$m_satuan = $this->input->post('satuan');
			$m_kode_gudang = $this->input->post('m_kode_gudang');
			$stok = $this->input->post('stok');

      $this->_editBarang($m_id_barang, $m_kode_barang, $m_nama_barang, $m_warna_id, $m_satuan, $m_kode_gudang, $stok);
    }
  }

	private function _editBarang($m_id_barang,$m_kode_barang, $m_nama_barang, $m_warna_id, $m_satuan, $m_kode_gudang, $stok)
  {
    $data=[
			'kode_barang'=>$m_kode_barang,
			'nama_barang'=>$m_nama_barang, 
			'warna_id'=>$m_warna_id, 
			'satuan'=>$m_satuan, 
			'gudang_id'=>$m_kode_gudang, 
			'stok'=>$stok, 
		];
    $this->db->update('m_barang', $data, ['id_barang' => $m_id_barang]);
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully update a barang!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
    redirect('master/e_barang/'.$m_id_barang);
  }

	public function d_barang($m_id_barang)
  {
    $query = 'ALTER TABLE `m_barang` AUTO_INCREMENT = 1';
    $this->db->delete('m_barang', ['id_barang' => $m_id_barang]);
    $this->db->query($query);
    $this->session->set_flashdata('message', 
				'<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully deleted a barang!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
    redirect('master/barang');
  }

	public function bahan(){
		$data=[
			'title' => 'Bahan',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'bahan' => $this->Master_m->getBahan()
		];

		$this->template->load('template', 'master/bahan/index', $data);
	}

	public function a_bahan(){
		$data=[
			'title' => 'Bahan',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'warnaId' => $this->db->get('warna')->result_array(),
			'categoryId' => $this->db->get('category')->result_array(),
			'gudangId' => $this->db->get('gudang')->result_array(),
			'barangId' => $this->Master_m->getIdBahan()
		];

		// Form Validation
    $this->form_validation->set_rules('m_kode_bahan', 'ID Bahan', 'required|trim');
    $this->form_validation->set_rules('m_bahan', 'Bahan', 'required|trim');
    $this->form_validation->set_rules('m_kode_category', 'Category', 'required|trim');
    $this->form_validation->set_rules('m_kode_warna', 'Warna', 'required|trim');
    $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
    $this->form_validation->set_rules('m_kode_gudang', 'Gudang', 'required|trim');
    $this->form_validation->set_rules('stok', 'Stok', 'required|trim');

    if ($this->form_validation->run() == true) {
      $this->_addBahan();
    }
		$this->template->load('template', 'master/bahan/a_bahan', $data);
	}

	private function _addBahan(){
    $data = [
      'kode_bahan' => $this->input->post('m_kode_bahan'),
      'nama_bahan' => $this->input->post('m_bahan'),
      'id_category' => $this->input->post('m_kode_category'),
      'id_warna' => $this->input->post('m_kode_warna'),
      'satuan' => $this->input->post('satuan'),
      'id_gudang' => $this->input->post('m_kode_gudang'),
      'stok' => $this->input->post('stok'),
    ];
    // $m_kode_bahan=$this->input->post('m_kode_bahan');
      $this->db->insert('m_bahan', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully added a new bahan!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
      redirect('master/bahan');
  }

	public function d_bahan($m_id_bahan)
  {
    $query = 'ALTER TABLE `m_bahan` AUTO_INCREMENT = 1';
    $this->db->delete('m_bahan', ['id_bahan' => $m_id_bahan]);
    $this->db->query($query);
    $this->session->set_flashdata('message', 
				'<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully deleted a bahan!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
    redirect('master/bahan');
  }

	public function e_bahan($m_id_bahan)
  {
    // Edit Menu
    $data=[
			'title' => 'Bahan',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'bhn_old' => $this->db->get_where('m_bahan', ['id_bahan' => $m_id_bahan])->row_array(),
			'warnaId' => $this->db->get('warna')->result_array(),
			'gudangId' => $this->db->get('gudang')->result_array(),
			'categoryId' => $this->db->get('category')->result_array(),
			'bahanId' => $this->Master_m->getIdBahan()
		];
    // Form Validation
    $this->form_validation->set_rules('m_kode_bahan', 'ID Bahan', 'required|trim');
    $this->form_validation->set_rules('m_bahan', 'Bahan', 'required|trim');
    $this->form_validation->set_rules('m_kode_category', 'Category', 'required|trim');
    $this->form_validation->set_rules('m_kode_warna', 'Warna', 'required|trim');
    $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
    $this->form_validation->set_rules('m_kode_gudang', 'Gudang', 'required|trim');
    $this->form_validation->set_rules('stok', 'Stok', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->template->load('template', 'master/bahan/e_bahan', $data);
    } else {
			$m_kode_bahan = $this->input->post('m_kode_bahan');
			$m_nama_bahan = $this->input->post('m_bahan');
			$m_category_id = $this->input->post('m_kode_category');
			$m_warna_id = $this->input->post('m_kode_warna');
			$m_satuan = $this->input->post('satuan');
			$m_kode_gudang = $this->input->post('m_kode_gudang');
			$stok = $this->input->post('stok');

      $this->_editBahan($m_id_bahan, $m_kode_bahan, $m_nama_bahan, $m_category_id, $m_warna_id, $m_satuan, $m_kode_gudang, $stok);
    }
  }

	private function _editBahan($m_id_bahan, $m_kode_bahan, $m_nama_bahan, $m_category_id, $m_warna_id, $m_satuan, $m_kode_gudang, $stok)
  {
    $data=[
			'kode_bahan'=>$m_kode_bahan,
			'nama_bahan'=>$m_nama_bahan, 
			'id_category'=>$m_category_id, 
			'id_warna'=>$m_warna_id, 
			'satuan'=>$m_satuan, 
			'id_gudang'=>$m_kode_gudang, 
			'stok'=>$stok, 
		];
    $this->db->update('m_bahan', $data, ['id_bahan' => $m_id_bahan]);
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert"> Successfully update a bahan!.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>',
			'</div>');
    redirect('master/e_bahan/'.$m_id_bahan);
  }

}
