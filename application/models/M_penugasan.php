<?php
class M_penugasan extends CI_Model{

	function get_all_penugasan(){
		if ($this->session->userdata("jenis_pengguna")==3) {
			$id_pegawai=$this->session->userdata("id_pengguna");
			$hsl=$this->db->query("SELECT * FROM pegawai,jabatan,penugasan where 
		
			pegawai.id_jabatan=jabatan.id_jabatan AND penugasan.id_pegawai=pegawai.id_pegawai AND penugasan.id_pegawai='$id_pegawai'");
		}else{
			$hsl=$this->db->query("SELECT * FROM pegawai,jabatan,penugasan where 
			
			pegawai.id_jabatan=jabatan.id_jabatan AND penugasan.id_pegawai=pegawai.id_pegawai");
		}
		return $hsl;
	}


	function hapus_penugasan($kode){
		$hsl=$this->db->query("DELETE FROM penugasan where id_penugasan='$kode'");
		return $hsl;
	}

	public function add_penugasan($data){
			$this->db->insert('penugasan', $data);
			return true;
		}

		public function get_penugasan_by_id($id){
			$query = $this->db->get_where('penugasan', array('id_penugasan' => $id));
			return $result = $query->row_array();
		}

		public function edit_penugasan($data, $id){
			$this->db->where('id_penugasan', $id);
			$this->db->update('penugasan', $data);
			return true;
		}

}	