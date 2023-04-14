<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model('Customer_model');
    }

    public function index()
    {


        $data['judul'] = "Halaman Data Mobil";
        $data['data_customer'] = $this->Customer_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('data_customer/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->Customer_model->simpan();
        redirect('data_customer');
    }

    public function hapus($id)
    {
        $this->Customer_model->hapus($id);
        redirect('data_customer');
    }

    public function ubah($id)
    {
        $data['judul'] = "Halaman Edit";
        $data['ubah_datacustomer'] = $this->Customer_model->get_id($id);

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('gender', 'gender', 'required|trim');
        $this->form_validation->set_rules('no_telpn', 'no_telpn', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'no_ktp', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('data_customer/ubah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Customer_model->ubah();
            redirect('data_customer');
        }
    }
}
