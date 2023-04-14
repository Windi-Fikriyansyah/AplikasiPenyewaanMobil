<?php
class Penyewaan_model extends CI_Model
{

    public function no_otomatis()
    {
        $this->db->select('id_rental');
        $this->db->order_by('id_rental DESC');
        return $this->db->get('penyewaan')->result_array();
    }

    public function tampil()
    {
        return $this->db->get('v_penyewaan')->result_array();
    }

    public function tampil_data()
    {
        return $this->db->get_where('v_penyewaan', ['status' => '1'])->result_array();
    }

    public function simpan()
    {
        $sisa = $this->input->post('total') - $this->input->post('bayar');
        $data = [
            "id_rental" => $this->input->post('id_rental'),
            "id_admin" => $this->fungsi->user_login()->id_admin,
            "id_customer" => $this->input->post('customer'),
            "id_mobil" => $this->input->post('mobil'),
            "tgl_sewa" => $this->input->post('tgl_sewa'),
            "tgl_kembali" => $this->input->post('tgl_kembali'),
            "jumlah_sewa" => $this->input->post('hari'),
            "total_bayar" => $this->input->post('bayar'),
            "sisa_pembayaran" => $sisa,
            "total_harga" => $this->input->post('total'),
            "status" => 1,
        ];
        $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan</strong> 
        <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $this->db->insert('penyewaan', $data);
    }

    public function update_mobil()
    {
        $data = [
            "status" => 0,
        ];
        $this->db->where('id_mobil', $this->input->post('mobil'));
        $this->db->update('mobil', $data);
    }

    public function mobil_kembali()
    {
        $data = [
            "status" => 1,
        ];
        $this->db->where('id_mobil', $this->input->post('mobil'));
        $this->db->update('mobil', $data);
    }

    public function bayar()
    {

        $jumlah_hari = $this->input->post('hari') + $this->input->post('tambahan_hari');
        $total_harga = $this->input->post('ttl') + $this->input->post('tambahan');
        $total_bayar = $this->input->post('ttl_byr') + $this->input->post('bayar');
        $sisa = $total_harga - $total_bayar;
        if ($total_bayar != $total_harga) {
            $this->session->set_flashData('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Pembayaran Gagal, Pembayaran melebihi total harga</strong> 
        <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        } else if ($total_bayar < $total_harga) {
            $this->session->set_flashData('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Pembayaran Gagal, Pembayaran kurang dari total harga</strong> 
        <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        } else {

            $data = [
                "tgl_kembali" => $this->input->post('tgl_pengembalian'),
                "jumlah_sewa" => $jumlah_hari,
                "total_harga" => $total_harga,
                "total_bayar" => $total_bayar,
                "sisa_pembayaran" => $sisa,
                "status" => 0,
            ];
            $this->session->set_flashData('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Pembayaran Berhasil Ditambahkan</strong> 
        <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
            $this->db->where('id_rental', $this->input->post('id'));
            $this->db->update('penyewaan', $data);
        }
    }

    public function hapus($id)
    {
        $this->db->where('id_mobil', $id);
        $this->db->delete('penyewaan');
        $this->session->set_flashData('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus</strong> 
        <button merek="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    }

    public function mobil_batal($id)
    {
        $data = [
            "status" => 1,
        ];
        $this->db->where('id_mobil', $id);
        $this->db->update('mobil', $data);
    }
}
