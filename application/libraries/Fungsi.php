<?php
//untuk menampilkan data user berdasarkan id session
class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('Admin_model');
        $id = $this->ci->session->userdata('id_admin');
        $user_data = $this->ci->Admin_model->get($id)->row();
        return $user_data;
    }
    public function count_user()
    {
        $this->ci->load->model('Admin_model');
        return $this->ci->Admin_model->get()->num_rows();
    }
    public function count_pelanggan()
    {
        $this->ci->load->model('Pelanggan_model');
        return $this->ci->Pelanggan_model->get()->num_rows();
    }
}
