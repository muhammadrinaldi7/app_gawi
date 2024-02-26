<?php
class M_absen_keluar extends CI_Model{

	function get_all_absen_keluar(){
		if ($this->session->userdata("jenis_pengguna")==3) {
			$id_pegawai=$this->session->userdata("id_pengguna");
			$hsl=$this->db->query("SELECT * FROM absen_masuk,pegawai,absen_keluar where absen_masuk.id_pegawai=pegawai.id_pegawai AND absen_keluar.id_absen_masuk=absen_masuk.id_absen_masuk AND absen_masuk.id_pegawai='$id_pegawai'");
		}else{
			$hsl=$this->db->query("SELECT * FROM absen_masuk,pegawai,absen_keluar where absen_masuk.id_pegawai=pegawai.id_pegawai AND absen_keluar.id_absen_masuk=absen_masuk.id_absen_masuk");
		}
		return $hsl;
	}


	function hapus_absen_keluar($kode){
		$hsl=$this->db->query("DELETE FROM absen_keluar where id_absen_keluar='$kode'");
		return $hsl;
	}

	public function add_absen_keluar($data){
			$this->db->insert('absen_keluar', $data);
			return true;
		}

		public function get_absen_keluar_by_id($id){
			$query = $this->db->get_where('absen_keluar', array('id_absen_keluar' => $id));
			return $result = $query->row_array();
		}

		public function edit_absen_keluar($data, $id){
			$this->db->where('id_absen_keluar', $id);
			$this->db->update('absen_keluar', $data);
			return true;
		}

}	