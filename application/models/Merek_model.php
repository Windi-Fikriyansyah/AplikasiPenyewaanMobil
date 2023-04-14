<?php
class Merek_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('merek')->result_array();
    }

    public function simpan()
    {
        $data = [
            "nama_merek" => $this->input->post('nama_merek'),
        ];
        $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan</strong> 
        <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $this->db->insert('merek', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_merek', $id);
        $this->db->delete('merek');
        $this->session->set_flashData('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus</strong> 
        <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    }

    public function get_id($id)
    {
        return $this->db->get_where('merek', ['id_merek' => $id])->row_array();
    }

    public function ubah()
    {
        $data = [
            "nama_merek" => $this->input->post('nama_merek'),
        ];
        $this->session->set_flashData('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>Data Berhasil Diupdate</strong> 
          <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>');
        $this->db->where('id_merek', $this->input->post('id'));
        $this->db->update('merek', $data);
    }
}
