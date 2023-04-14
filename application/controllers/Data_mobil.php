<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_mobil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model(['Mdata_mobil', 'Type_model', 'Merek_model']);
    }

    public function index()
    {
        $data['judul'] = "Halaman Data Mobil";
        $data['data_mobil'] = $this->Mdata_mobil->tampil_data();
        $data['nama_type'] = $this->Type_model->tampil_data();
        $data['nama_merek'] = $this->Merek_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('data_mobil/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $upload_foto = $_FILES['foto']['name'];
        if ($upload_foto != null) {
            $config['upload_path'] = './assets/foto/'; //tempat ubah file foto
            $config['allowed_types'] = 'jpg|png|jpeg'; //mengatur type foto
            $config['max_size'] = '5048'; //besar kecil ukrn file(5mb)
            $config['remove_space'] = TRUE;
            $config['overwrite'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $pict = $this->upload->data('file_name');
                $this->Mdata_mobil->simpan($pict);
                redirect('data_mobil');
            } else {
                $pesan = "Gagal ubah. file yang anda upload salah!!!";
                $url = base_url('data_mobil');
                echo "<script> 
                    alert('$pesan');
                    location='$url';
                </script>";
            }
        } else {
            $pict = 'default.jpg';
            $this->Mdata_mobil->simpan($pict);
            redirect('data_mobil');
        }
    }

    public function hapus($id)
    {
        $this->_deletefile($id);
        $this->Mdata_mobil->hapus($id);
        redirect('data_mobil');
    }

    public function _deletefile($id)
    {
        $data_mobil = $this->Mdata_mobil->get_id($id);
        if ($data_mobil['foto'] != "default.jpeg") {
            $filename = explode(".", $data_mobil['foto'])[0];
            return array_map('unlink', glob(FCPATH . "assets/foto/$filename.*"));
        }
    }


    public function ubah($id = '')
    {
        $data['judul'] = "Halaman Edit";
        $data['ubah_datamobil'] = $this->Mdata_mobil->get_id($id);
        $data['nama_type'] = $this->Type_model->tampil_data();
        $data['nama_merek'] = $this->Merek_model->tampil_data();

        $this->form_validation->set_rules('nama_type', 'nama type', 'required|trim');
        $this->form_validation->set_rules('nama_merek', 'nama merek', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama mobi', 'required|trim');
        $this->form_validation->set_rules('no_plat', 'no_plat', 'required|trim');
        $this->form_validation->set_rules('warna', 'warna', 'required|trim');
        $this->form_validation->set_rules('tahun', 'tahun', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('data_mobil/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_foto = $_FILES['foto']['name'];
            if ($upload_foto != null) {
                $config['upload_path'] = './assets/foto/'; //tempat ubah file foto
                $config['allowed_types'] = 'jpg|png|jpeg'; //mengatur type foto
                $config['max_size'] = '5048'; //besar kecil ukrn file(5mb)
                $config['remove_space'] = TRUE;
                $config['overwrite'] = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {

                    $id = $this->input->post('id'); //menghapus gambar didalam folder foto
                    $this->_deletefile($id);

                    $pict = $this->upload->data('file_name');
                    $this->Mdata_mobil->ubah($pict);
                    redirect('data_mobil');
                } else {
                    $pesan = "Gagal update. file yang anda upload salah!!!";
                    $url = base_url('data_mobil');
                    echo "<script> 
                    alert('$pesan');
                    location='$url';
                </script>";
                }
            } else {
                $pict = $this->input->post('image');
                $this->Mdata_mobil->ubah($pict);
                redirect('data_mobil');
            }
        }
    }
}
