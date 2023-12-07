<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_m extends CI_Model{

	public function getIdGudang()
	{
		$this->db->select('RIGHT(kode_gudang,2) as kode_gudang', false);
		$this->db->order_by("kode_gudang", "ASC");
		$this->db->limit(1);
		$query = $this->db->get('gudang');
		if ($query->num_rows() <> 0) {
			$data       = $query->row(); // ambil satu baris data
			$kodeGudang  = intval($data->kode_gudang) + 1; // tambah 1
		} else {
			$kodeGudang  = 1; // isi dengan 1
		}

		$lastKode = str_pad($kodeGudang, 2, "0", STR_PAD_LEFT);
		$tahun    = date("Y-");
		$Gd      = "MG-";

		$newKode  = $Gd . $lastKode;

		return $newKode;  // return kode baru
	}

	public function getIdCategory()
	{
		$this->db->select('RIGHT(kode_category,2) as kode_category', false);
		$this->db->order_by("kode_category", "ASC");
		$this->db->limit(1);
		$query = $this->db->get('category');
		if ($query->num_rows() <> 0) {
			$data       = $query->row(); // ambil satu baris data
			$kodeCategory  = intval($data->kode_category) + 1; // tambah 1
		} else {
			$kodeCategory  = 1; // isi dengan 1
		}

		$lastKode = str_pad($kodeCategory, 2, "0", STR_PAD_LEFT);
		$tahun    = date("Y-");
		$Gd      = "Cat-";

		$newKode  = $Gd . $lastKode;

		return $newKode;  // return kode baru
	}

	public function getIdWarna()
	{
		$this->db->select('RIGHT(kode_warna,2) as kode_warna', false);
		$this->db->order_by("kode_warna", "ASC");
		$this->db->limit(1);
		$query = $this->db->get('warna');
		if ($query->num_rows() <> 0) {
			$data       = $query->row(); // ambil satu baris data
			$kodeWarna  = intval($data->kode_warna) + 1; // tambah 1
		} else {
			$kodeWarna  = 1; // isi dengan 1
		}

		$lastKode = str_pad($kodeWarna, 2, "0", STR_PAD_LEFT);
		$tahun    = date("Y-");
		$Gd      = "Wrn-";

		$newKode  = $Gd . $lastKode;

		return $newKode;  // return kode baru
	}

	public function getIdBarang()
	{
		$this->db->select('RIGHT(kode_barang,2) as kode_barang', false);
		$this->db->order_by("kode_barang", "ASC");
		$this->db->limit(1);
		$query = $this->db->get('m_barang');
		if ($query->num_rows() <> 0) {
			$data       = $query->row(); // ambil satu baris data
			$kodeBarang  = intval($data->kode_barang) + 1; // tambah 1
		} else {
			$kodeBarang  = 1; // isi dengan 1
		}

		$lastKode = str_pad($kodeBarang, 2, "0", STR_PAD_LEFT);
		$tahun    = date("Y-");
		$Gd      = "Brg-";

		$newKode  = $Gd . $lastKode;

		return $newKode;  // return kode baru
	}

	public function getBarang($id = null)
	{
		$this->db->select('m_barang.*, warna.nama_warna as warna_name, gudang.nama_gudang as gudang_name')
						 ->from('m_barang')
						 ->join('warna', 'warna.id_warna = m_barang.warna_id')
						 ->join('gudang', 'gudang.id_gudang = m_barang.gudang_id');
						 if ($id != null) {
							$this->db->where('id_barang', $id);
						 }
						 $query = $this->db->get();
						 return $query;
	}

	public function getBahan($id = null)
	{
		$this->db->select('m_bahan.*, warna.nama_warna as warna_name, gudang.nama_gudang as gudang_name, category.nama_category as category_name')
						 ->from('m_bahan')
						 ->join('warna', 'warna.id_warna = m_bahan.id_warna')
						 ->join('gudang', 'gudang.id_gudang = m_bahan.id_gudang')
						 ->join('category', 'category.id_category = m_bahan.id_category');
						 if ($id != null) {
							$this->db->where('id_bahan', $id);
						 }
						 $query = $this->db->get();
						 return $query;
	}
}
?>
