<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model{
	public function getIdStock()
	{
		$this->db->select('RIGHT(kode_stock,2) as kode_stock', false);
		$this->db->order_by("kode_stock", "ASC");
		$this->db->limit(1);
		$query = $this->db->get('t_stock');
		if ($query->num_rows() <> 0) {
			$data       = $query->row(); // ambil satu baris data
			$kodeStock  = intval($data->kode_stock) + 1; // tambah 1
		} else {
			$kodeStock  = 1; // isi dengan 1
		}

		$lastKode = str_pad($kodeStock, 2, "0", STR_PAD_LEFT);
		$tahun    = date("dmY");
		$Stc      = "Stc";

		$newKode  = $Stc . $tahun. $lastKode;

		return $newKode;  // return kode baru
	}
}
