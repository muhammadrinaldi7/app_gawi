<?php
class M_mutasi extends CI_Model{

	function get_all_mutasi(){
		$hsl=$this->db->query("SELECT * FROM mutasi,pegawai where mutasi.id_pegawai=pegawai.id_pegawai");
		return $hsl;
	}


	function hapus_mutasi($kode){
		$hsl=$this->db->query("DELETE FROM mutasi where id_mutasi='$kode'");
		return $hsl;
	}

	public function add_mutasi($data){
			$this->db->insert('mutasi', $data);
			return true;
		}

		public function get_mutasi_by_id($id){
			$query = $this->db->get_where('mutasi', array('id_mutasi' => $id));
			return $result = $query->row_array();
		}

		public function edit_mutasi($data, $id){
			$this->db->where('id_mutasi', $id);
			$this->db->update('mutasi', $data);
			return true;
		}

}	