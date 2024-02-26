<?php
class M_absen_masuk extends CI_Model{

	function get_all_absen_masuk(){
		if ($this->session->userdata("jenis_pengguna")==3) {
			$id_pegawai=$this->session->userdata("id_pengguna");
			$hsl=$this->db->query("SELECT * FROM absen_masuk,pegawai where absen_masuk.id_pegawai=pegawai.id_pegawai AND absen_masuk.id_pegawai='$id_pegawai'");
		}else{
			$hsl=$this->db->query("SELECT * FROM absen_masuk,pegawai where absen_masuk.id_pegawai=pegawai.id_pegawai");
		}
		return $hsl;
	}


	function hapus_absen_masuk($kode){
		$hsl=$this->db->query("DELETE FROM absen_masuk where id_absen_masuk='$kode'");
		return $hsl;
	}

	public function add_absen_masuk($data){
			$this->db->insert('absen_masuk', $data);
			return true;
		}

		public function get_absen_masuk_by_id($id){
			$query = $this->db->get_where('absen_masuk', array('id_absen_masuk' => $id));
			return $result = $query->row_array();
		}

		public function edit_absen_masuk($data, $id){
			$this->db->where('id_absen_masuk', $id);
			$this->db->update('absen_masuk', $data);
			return true;
		}

}	