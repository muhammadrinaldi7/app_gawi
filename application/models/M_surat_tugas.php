<?php
class M_surat_tugas extends CI_Model{

	function get_all_surat_tugas(){
		$hsl=$this->db->query("SELECT * FROM surat_tugas,pegawai,jabatan where surat_tugas.id_pegawai=pegawai.id_pegawai AND pegawai.id_jabatan=jabatan.id_jabatan");
		return $hsl;
	}


	function hapus_surat_tugas($kode){
		$hsl=$this->db->query("DELETE FROM surat_tugas where id_surat_tugas='$kode'");
		return $hsl;
	}

	public function add_surat_tugas($data){
			$this->db->insert('surat_tugas', $data);
			return true;
		}

		public function get_surat_tugas_by_id($id){
			$query = $this->db->get_where('surat_tugas', array('id_surat_tugas' => $id));
			return $result = $query->row_array();
		}

		public function edit_surat_tugas($data, $id){
			$this->db->where('id_surat_tugas', $id);
			$this->db->update('surat_tugas', $data);
			return true;
		}

}	