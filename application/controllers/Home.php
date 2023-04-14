<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model(['Mdata_mobil', 'Lap_penyewaan_model']);
    }

    public function index()
    {

        $data['judul'] = "Home";

        $data['tersedia'] = $this->Mdata_mobil->mobil_tersedia();
        $data['disewa'] = $this->Mdata_mobil->mobil_tidak_tersedia();
        $data['total_perhari'] = $this->Lap_penyewaan_model->total_perhari();
        $data['total_perbulan'] = $this->Lap_penyewaan_model->total_perbulan();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
