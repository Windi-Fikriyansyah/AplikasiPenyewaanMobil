<?php
class Customer_model extends CI_Model
{

  public function tampil_data()
  {
    return $this->db->get('customer')->result_array();
  }

  public function simpan()
  {
    $data = [
      "nama" => $this->input->post('nama'),
      "alamat" => $this->input->post('alamat'),
      "gender" => $this->input->post('gender'),
      "no_telpn" => $this->input->post('no_telpn'),
      "no_ktp" => $this->input->post('no_ktp'),
    ];
    $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    $this->db->insert('customer', $data);
  }

  public function hapus($id)
  {
    $this->db->where('id_customer', $id);
    $this->db->delete('customer');
    $this->session->set_flashData('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
  }

  public function get_id($id)
  {
    return $this->db->get_where('customer', ['id_customer' => $id])->row_array();
  }

  public function ubah()
  {
    $data = [
      "nama" => $this->input->post('nama'),
      "alamat" => $this->input->post('alamat'),
      "gender" => $this->input->post('gender'),
      "no_telpn" => $this->input->post('no_telpn'),
      "no_ktp" => $this->input->post('no_ktp'),
    ];
    $this->session->set_flashData('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>Data Berhasil Diupdate</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>');
    $this->db->where('id_customer', $this->input->post('id'));
    $this->db->update('customer', $data);
  }
}
