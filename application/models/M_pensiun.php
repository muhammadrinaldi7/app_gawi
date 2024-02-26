<?php
class M_pensiun extends CI_Model{

	function get_all_pensiun(){
		$hsl=$this->db->query("SELECT * FROM pensiun,pegawai where pensiun.id_pegawai=pegawai.id_pegawai");
		return $hsl;
	}


	function hapus_pensiun($kode){
		$hsl=$this->db->query("DELETE FROM pensiun where id_pensiun='$kode'");
		return $hsl;
	}

	public function add_pensiun($data){
			$this->db->insert('pensiun', $data);
			return true;
		}

		public function get_pensiun_by_id($id){
			$query = $this->db->get_where('pensiun', array('id_pensiun' => $id));
			return $result = $query->row_array();
		}

		public function edit_pensiun($data, $id){
			$this->db->where('id_pensiun', $id);
			$this->db->update('pensiun', $data);
			return true;
		}

}	