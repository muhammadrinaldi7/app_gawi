<?php
class M_profil extends CI_Model{

	function get_all_profil(){
		$hsl=$this->db->query("SELECT * FROM pengguna");
		return $hsl;
	}


	function hapus_profil($kode){
		$hsl=$this->db->query("DELETE FROM pengguna where id_pengguna='$kode'");
		return $hsl;
	}

	public function add_profil($data){
			$this->db->insert('pengguna', $data);
			return true;
		}

		public function get_profil_by_id($id){
			$query = $this->db->get_where('pengguna', array('id_pengguna' => $id));
			return $result = $query->row_array();
		}

		public function edit_profil($data, $id){
			$this->db->where('id_pengguna', $id);
			$this->db->update('pengguna', $data);
			return true;
		}
		public function edit_profil2($data, $id){
			$this->db->where('id_customer', $id);
			$this->db->update('customer', $data);
			return true;
		}

}	