<?php
class Mdata_mobil extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('v_mobil')->result_array();
    }

    public function mobil_tersedia()
    {
        return $this->db->get_where('mobil', ['status' => '1'])->num_rows();
    }

    public function mobil_tidak_tersedia()
    {
        return $this->db->get_where('mobil', ['status' => '0'])->num_rows();
    }

    public function simpan($pict)
    {
        $data = [
            "id_type" => $this->input->post('nama_type'),
            "id_merek" => $this->input->post('nama_merek'),
            "nama" => $this->input->post('nama'),
            "no_plat" => $this->input->post('no_plat'),
            "warna" => $this->input->post('warna'),
            "tahun" => $this->input->post('tahun'),
            "harga" => $this->input->post('harga'),
            "jumlah_kursi" => $this->input->post('jumlah_kursi'),
            "status" => 1,
            "foto" => $pict
        ];
        $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $this->db->insert('mobil', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_mobil', $id);
        $this->db->delete('mobil');
        $this->session->set_flashData('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    }

    public function get_id($id)
    {
        return $this->db->get_where('v_mobil', ['id_mobil' => $id])->row_array();
    }

    public function tampil_tersedia()
    {
        return $this->db->get_where('v_mobil', ['status' => '1'])->result_array();
    }

    public function ubah($pict)
    {
        $data = [
            "id_type" => $this->input->post('nama_type'),
            "id_merek" => $this->input->post('nama_merek'),
            "nama" => $this->input->post('nama'),
            "no_plat" => $this->input->post('no_plat'),
            "warna" => $this->input->post('warna'),
            "tahun" => $this->input->post('tahun'),
            "harga" => $this->input->post('harga'),
            "jumlah_kursi" => $this->input->post('jumlah_kursi'),
            "status" => 1,
            "foto" => $pict
        ];
        $this->session->set_flashData('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        $this->db->where('id_mobil', $this->input->post('id'));
        $this->db->update('mobil', $data);
    }
}
