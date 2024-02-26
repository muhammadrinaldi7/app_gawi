<?php
class M_presensi extends CI_Model{

	function get_all_presensi(){
		if ($this->session->userdata("jenis_pengguna")==3) {
			$id_pegawai=$this->session->userdata("id_pengguna");
			$hsl=$this->db->query("SELECT * FROM presensi,pegawai where presensi.id_pegawai=pegawai.id_pegawai AND pegawai.id_pegawai='$id_pegawai'");
		}else{
			$hsl=$this->db->query("SELECT * FROM presensi,pegawai where presensi.id_pegawai=pegawai.id_pegawai");
		}
		return $hsl;
	}


	function hapus_presensi($kode){
		$hsl=$this->db->query("DELETE FROM presensi where id_presensi='$kode'");
		return $hsl;
	}

	public function add_presensi($data){
			$this->db->insert('presensi', $data);
			return true;
		}

		public function get_presensi_by_id($id){
			$query = $this->db->get_where('presensi', array('id_presensi' => $id));
			return $result = $query->row_array();
		}

		public function edit_presensi($data, $id){
			$this->db->where('id_presensi', $id);
			$this->db->update('presensi', $data);
			return true;
		}

}	