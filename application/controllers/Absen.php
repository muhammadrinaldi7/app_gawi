<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
        $this->load->model('m_absen_masuk');
        $this->load->library('upload');
        $this->load->model('m_data');
    }

    public function index()
    {
        $x['data_absen_masuk'] = $this->m_absen_masuk->get_all_absen_masuk();
        $this->load->view('backend/header', $x);
        $this->load->view('backend/absen');
        $this->load->view('backend/footer');
    }

    public function lihat()
    {
        $x['data_absen_masuk'] = $this->m_absen_masuk->get_all_absen_masuk();
        $this->load->view('backend/header', $x);
        $this->load->view('backend/lihat_absen_masuk');
        $this->load->view('backend/footer');
    }

    public function filter()
    {
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');
        $data['tgl1'] = $this->input->post('tgl1');
        $data['tgl2'] = $this->input->post('tgl2');
        $data['data_absen_masuk'] = $this->db->query("SELECT * FROM absen_masuk,pegawai where absen_masuk.id_pegawai=pegawai.id_pegawai AND date(tgl_waktu_masuk) BETWEEN '$tgl1' AND '$tgl2' ");
        $this->load->view('backend/cetak_absen_masuk', $data);
    }

    public function filter2()
    {
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');
        $data['tgl1'] = $this->input->post('tgl1');
        $data['tgl2'] = $this->input->post('tgl2');
        $this->load->view('backend/cetak_perabsen', $data);
    }

    public function lokasi($id)
    {
        $x['data'] = $this->db->query("SELECT * FROM absen_masuk,pegawai where absen_masuk.id_pegawai=pegawai.id_pegawai AND id_absen_masuk='$id'")->row_array();
        $this->load->view('backend/header', $x);
        $this->load->view('backend/lokasi_absen');
        $this->load->view('backend/footer');
    }


    public function cetak()
    {
        $x['data_absen_masuk'] = $this->m_absen_masuk->get_all_absen_masuk();
        $this->load->view('backend/cetak_absen_masuk', $x);
    }

    public function cetak2($id)
    {
        $x['data'] = $this->db->query("select * from absen_masuk,pegawai,jabatan where pegawai.id_pegawai=absen_masuk.id_pegawai
		AND jabatan.id_jabatan=pegawai.id_jabatan AND id_absen_masuk='$id'")->row_array();
        $this->load->view('backend/cetak_perabsen_masuk', $x);
    }


    public function simpan_absen_masuk()
    {
        if ($this->input->post('status_kehadiran') == "Hadir") {
            $stat = 0;
        } else {
            $stat = 1;
        }



        $data = array(
            'id_pegawai' => $this->input->post('id_pegawai'),
            'status_kehadiran' => $this->input->post('status_kehadiran'),
            'lat_masuk' => $this->input->post('lat_masuk'),
            'long_masuk' => $this->input->post('long_masuk'),
            'ket_masuk' => $this->input->post('ket_masuk'),
            'stat' => $stat,
        );

        $result = $this->m_absen_masuk->add_absen_masuk($data);
        if ($result) {
            $this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
            redirect(base_url('absen_masuk'));
        }
    }



    public function update_absen_masuk()
    {
        $id = $this->input->post('id_absen_masuk');

        $data = array(
            'id_pegawai' => $this->input->post('id_pegawai'),
            'status_kehadiran' => $this->input->post('status_kehadiran'),
            'lat_masuk' => $this->input->post('lat_masuk'),
            'long_masuk' => $this->input->post('long_masuk'),
            'ket_masuk' => $this->input->post('ket_masuk'),
        );

        $result = $this->m_absen_masuk->edit_absen_masuk($data, $id);
        if ($result) {
            $this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
            redirect(base_url('absen_masuk'));
        }
    }

    function hapus_absen_masuk()
    {
        $kode = $this->input->post('kode');
        $this->m_absen_masuk->hapus_absen_masuk($kode);
        echo $this->session->set_flashdata('berhasil_hapus', 'berhasil_hapus');
        redirect('absen_masuk');
    }
}
