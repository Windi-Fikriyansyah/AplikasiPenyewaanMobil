<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_merek extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model('Merek_model');
    }

    public function index()
    {
        $data['data_merek'] = $this->Merek_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('data_merek/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->Merek_model->simpan();
        redirect('data_merek');
    }

    public function hapus($id)
    {
        $this->Merek_model->hapus($id);
        redirect('data_merek');
    }

    public function ubah($id)
    {
        $data['judul'] = "Halaman Edit";
        $data['ubah_datamerek'] = $this->Merek_model->get_id($id);

        $this->form_validation->set_rules('nama_merek', 'nama_merek', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('data_merek/ubah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Merek_model->ubah();
            redirect('data_merek');
        }
    }
}
