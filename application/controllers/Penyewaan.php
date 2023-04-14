<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyewaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model(['Mdata_mobil', 'Penyewaan_model', 'Customer_model']);
    }


    public function index()
    {
        $data['judul'] = "Transaksi";

        $data['data_penyewaan'] = $this->Penyewaan_model->tampil();
        $data['customer'] = $this->Customer_model->tampil_data();
        $data['mobil'] = $this->Mdata_mobil->tampil_tersedia();

        $tampil = $this->Penyewaan_model->no_otomatis();
        if (empty($tampil[0]['id_rental'])) {
            $no = date('Ymd') . "000001";
        } else {
            $a = date('Ymd');
            $urut = $tampil[0]['id_rental'];
            $no_1 = substr($urut, 8, 6);
            $hasil = ((int) $no_1) + 1;
            $hasil_2 = sprintf('%06s', $hasil);
            $no = $a . $hasil_2;
        }
        $data['no_otomatis'] = $no;

        $this->load->view('templates/header', $data);
        $this->load->view('penyewaan/index', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $this->Penyewaan_model->simpan();
        $this->Penyewaan_model->update_mobil();
        redirect('penyewaan');
    }

    public function simpan_customer()
    {
        $this->Customer_model->simpan();
        redirect('penyewaan');
    }

    public function data_penyewaan()
    {
        $data['data_penyewaan'] = $this->Penyewaan_model->tampil();
        $this->load->view('templates/header', $data);
        $this->load->view('penyewaan/data_penyewaan', $data);
        $this->load->view('templates/footer');
    }

    public function pengembalian()
    {
        $data['data_penyewaan'] = $this->Penyewaan_model->tampil_data();
        $this->load->view('templates/header', $data);
        $this->load->view('penyewaan/pengembalian', $data);
        $this->load->view('templates/footer');
    }

    public function bayar()
    {
        $this->Penyewaan_model->bayar();
        $this->Penyewaan_model->mobil_kembali();
        redirect('penyewaan/pengembalian');
    }

    public function hapus($id)
    {
        $this->Penyewaan_model->hapus($id);
        $this->Penyewaan_model->mobil_batal($id);
        redirect('penyewaan/data_penyewaan');
    }
}
