<?php

class M_data extends CI_Model{

	public function hitung_users(){
			$query = $this->db->query("SELECT * FROM pengguna");
			$total = $query->num_rows();
			return $total;
		}
	public function hitung_pegawai(){
			$query = $this->db->query("SELECT * FROM pegawai");
			$total = $query->num_rows();
			return $total;
		}
	public function hitung_pns(){
			$query = $this->db->query("SELECT * FROM pegawai where status_kep = 'PNS'");
			$total = $query->num_rows();
			return $total;
		}
	public function hitung_honorer(){
			$query = $this->db->query("SELECT * FROM pegawai where status_kep = 'HONORER'");
			$total = $query->num_rows();
			return $total;
		}
	public function hitung_kontrak(){
			$query = $this->db->query("SELECT * FROM pegawai where status_kep = 'KONTRAK'");
			$total = $query->num_rows();
			return $total;
		}

		



}