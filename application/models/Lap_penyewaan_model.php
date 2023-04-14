<?php

class Lap_penyewaan_model extends CI_Model
{

    public function laporan_penyewaan($tgl_mulai, $tgl_sampai)
    {
        $this->db->where('tgl_sewa >=', $tgl_mulai);
        $this->db->where('tgl_sewa <=', $tgl_sampai);
        return $this->db->get('v_penyewaan')->result_array();
    }

    public function total($tgl_awal, $tgl_akhir)
    {
        $this->db->select('SUM(total_harga) as grandtotal');
        $this->db->where('tgl_sewa >=', $tgl_awal);
        $this->db->where('tgl_sewa <=', $tgl_akhir);
        return $this->db->get('penyewaan')->row()->grandtotal;
    }

    public function total_bayar($tgl_awal, $tgl_akhir)
    {
        $this->db->select('SUM(total_bayar) as tobar');
        $this->db->where('tgl_sewa >=', $tgl_awal);
        $this->db->where('tgl_sewa <=', $tgl_akhir);
        return $this->db->get('penyewaan')->row()->tobar;
    }

    public function total_perhari()
    {
        $tgl = date('Ymd');
        $this->db->select('SUM(total_bayar) as total_hari');
        return $this->db->get_where('penyewaan', ['tgl_sewa' => $tgl])->row()->total_hari;
    }

    public function total_perbulan()
    {
        $tgl = date('m');
        $this->db->select('SUM(total_bayar) as total_bulan');
        $this->db->where('MONTH(tgl_sewa)', $tgl);
        return $this->db->get('penyewaan')->row()->total_bulan;
    }
}
