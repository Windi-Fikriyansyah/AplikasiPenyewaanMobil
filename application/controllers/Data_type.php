<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_type extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model('Type_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Data Mobil";
        $data['data_type'] = $this->Type_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('data_type/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->Type_model->simpan();
        redirect('data_type');
    }

    public function hapus($id)
    {
        $this->Type_model->hapus($id);
        redirect('data_type');
    }

    public function ubah($id)
    {
        $data['judul'] = "Halaman Edit";
        $data['ubah_datatype'] = $this->Type_model->get_id($id);

        $this->form_validation->set_rules('nama_type', 'nama_type', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('data_type/ubah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Type_model->ubah();
            redirect('data_type');
        }
    }
}
