<?php
class Type_model extends CI_Model
{

  public function tampil_data()
  {
    return $this->db->get('type')->result_array();
  }

  public function simpan()
  {
    $data = [
      "nama_type" => $this->input->post('nama_type'),
    ];
    $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    $this->db->insert('type', $data);
  }

  public function hapus($id)
  {
    $this->db->where('id_type', $id);
    $this->db->delete('type');
    $this->session->set_flashData('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
  }

  public function get_id($id)
  {
    return $this->db->get_where('type', ['id_type' => $id])->row_array();
  }

  public function ubah()
  {
    $data = [
      "nama_type" => $this->input->post('nama_type'),
    ];
    $this->session->set_flashData('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>Data Berhasil Diupdate</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>');
    $this->db->where('id_type', $this->input->post('id'));
    $this->db->update('type', $data);
  }
}
