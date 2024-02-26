<?php
class M_jabatan extends CI_Model{

	function get_all_jabatan(){
		$hsl=$this->db->query("SELECT * FROM jabatan");
		return $hsl;
	}


	function hapus_jabatan($kode){
		$hsl=$this->db->query("DELETE FROM jabatan where id_jabatan='$kode'");
		return $hsl;
	}

	public function add_jabatan($data){
			$this->db->insert('jabatan', $data);
			return true;
		}

		public function get_jabatan_by_id($id){
			$query = $this->db->get_where('jabatan', array('id_jabatan' => $id));
			return $result = $query->row_array();
		}

		public function edit_jabatan($data, $id){
			$this->db->where('id_jabatan', $id);
			$this->db->update('jabatan', $data);
			return true;
		}

}	