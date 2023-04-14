<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_not_login();
        cek_admin();
        $this->load->model('Admin_model');
    }
    public function index()
    {
        $data['judul'] = "Admin";

        $data['admin'] = $this->Admin_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $this->Admin_model->simpan();
        redirect('admin');
    }

    public function hapus($id)
    {
        $this->Admin_model->hapus($id);
        redirect('admin');
    }



    public function ubah($id = '')
    {
        $data['judul'] = "Admin";
        $data['ubah_admin'] = $this->Admin_model->get_id($id);

        $this->form_validation->set_rules('nama_admin', 'nama_admin', 'required|trim');
        $this->form_validation->set_rules(
            'username',
            'username',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'pass1',
            'Password',
            'min_length[5]|matches[pass2]',
            [
                'min_length' => "Password minimal 5 digit",
                'matches' => "Password tidak sesuai"
            ]
        );
        $this->form_validation->set_rules(
            'pass2',
            'Konfirmasi Password',
            'matches[pass1]',
            ['matches' => "Konfirmasi Password tidak sesuai"]
        );


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->ubah();
            redirect('admin');
        }
    }
}
