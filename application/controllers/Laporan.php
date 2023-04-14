<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Lap_penyewaan_model']);
        cek_not_login();
        cek_admin();
    }

    public function index()
    {
        $data['judul'] = "Laporan";

        $this->load->view('templates/header', $data);
        $this->load->view('laporan_penyewaan/index', $data);
        $this->load->view('templates/footer');
    }

    public function laporan_penyewaan()
    {
        $data['judul'] = "Laporan Penyewaan";

        $tgl_mulai = str_replace('/', '_', $this->input->post('tgl_mulai'));
        $tgl_sampai = str_replace('/', '_', $this->input->post('tgl_sampai'));

        $data['tgl_awal'] = $tgl_mulai;
        $data['tgl_akhir'] = $tgl_sampai;

        $data['lap_penyewaan'] = $this->Lap_penyewaan_model->Laporan_penyewaan($tgl_mulai, $tgl_sampai);
        $data['grandtotal'] = $this->Lap_penyewaan_model->total($tgl_mulai, $tgl_sampai);
        $data['tobar'] = $this->Lap_penyewaan_model->total_bayar($tgl_mulai, $tgl_sampai);

        $this->load->view('templates/header', $data);
        $this->load->view('laporan_penyewaan/tampil', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_penyewaan()
    {
        $data['judul'] = "Laporan Penyewaan";

        if (!$this->uri->segment(3) && !$this->uri->segment(4)) {
            $tgl_mulai = str_replace('/', '-', $this->input->post('tgl_mulai'));
            $tgl_sampai = str_replace('/', '-', $this->input->post('tgl_sampai'));
        } else {
            $tgl_mulai = $this->uri->segment(3);
            $tgl_sampai = $this->uri->segment(4);
        }
        $tgl_awal = str_replace('-', '/', $tgl_mulai);
        $tgl_akhir = str_replace('-', '/', $tgl_sampai);

        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['lap_penyewaan'] = $this->Lap_penyewaan_model->Laporan_penyewaan($tgl_mulai, $tgl_sampai);
        $data['grandtotal'] = $this->Lap_penyewaan_model->total($tgl_awal, $tgl_akhir);
        $data['tobar'] = $this->Lap_penyewaan_model->total_bayar($tgl_awal, $tgl_akhir);

        $this->load->view('laporan_penyewaan/cetak', $data);
    }
}
