<?php
class M_penggajian extends CI_Model{

	function get_all_penggajian(){
		$hsl=$this->db->query("SELECT * FROM penggajian,pegawai where penggajian.id_pegawai=pegawai.id_pegawai");
		return $hsl;
	}


	function hapus_penggajian($kode){
		$hsl=$this->db->query("DELETE FROM penggajian where id_penggajian='$kode'");
		return $hsl;
	}

	public function add_penggajian($data){
			$this->db->insert('penggajian', $data);
			return true;
		}

		public function get_penggajian_by_id($id){
			$query = $this->db->get_where('penggajian', array('id_penggajian' => $id));
			return $result = $query->row_array();
		}

		public function edit_penggajian($data, $id){
			$this->db->where('id_penggajian', $id);
			$this->db->update('penggajian', $data);
			return true;
		}

}	