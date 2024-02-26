<?php
class M_cuti extends CI_Model{

	function get_all_cuti(){
		
		if ($this->session->userdata("jenis_pengguna")==3) {
			$id_pegawai=$this->session->userdata("id_pengguna");
			$hsl=$this->db->query("SELECT * FROM cuti,pegawai where cuti.id_pegawai=pegawai.id_pegawai AND cuti.id_pegawai='$id_pegawai'");
		}else{
			$hsl=$this->db->query("SELECT * FROM cuti,pegawai where cuti.id_pegawai=pegawai.id_pegawai");
		}
		return $hsl;
	}

	function get_datacuti() {
		$cdc = $this->db->query("SELECT cuti.id_pegawai,pegawai.foto_pegawai,pegawai.kode_pegawai,pegawai.nama_pegawai,pegawai.tgl_bergabung,SUM(datediff(cuti.tanggal_selesai,cuti.tanggal_mulai)) totalcuti,GROUP_CONCAT(CONCAT(cuti.tanggal_mulai,' - ',cuti.tanggal_selesai)) tanggal,GROUP_CONCAT(cuti.jenis_cuti)keterangan,12-SUM(datediff(cuti.tanggal_selesai,cuti.tanggal_mulai)) sisa 
		FROM cuti LEFT JOIN pegawai ON pegawai.id_pegawai = cuti.id_pegawai 
		WHERE cuti.status_cuti = 'DISETUJUI' 
		GROUP BY pegawai.id_pegawai
		");
		return $cdc;
	}

	function hapus_cuti($kode){
		$hsl=$this->db->query("DELETE FROM cuti where id_cuti='$kode'");
		return $hsl;
	}

	public function add_cuti($data){
			$this->db->insert('cuti', $data);
			return true;
		}

		public function get_cuti_by_id($id){
			$query = $this->db->get_where('cuti', array('id_cuti' => $id));
			return $result = $query->row_array();
		}

		public function edit_cuti($data, $id){
			$this->db->where('id_cuti', $id);
			$this->db->update('cuti', $data);
			return true;
		}

}	