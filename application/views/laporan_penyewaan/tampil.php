<div class="container-fluid">
    <!-- DataTales Example -->
    <?php echo $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <a href="<?= base_url('laporan/cetak_laporan_penyewaan/' . $tgl_awal . '/' . $tgl_akhir); ?>" target="_blank" class="btn btn-success mt-1"><i class="fa fa-check"></i>&nbsp;Cetak</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5px;">No</th>
                            <th>Tgl Sewa</th>
                            <th>No Penyewaan</th>
                            <th>Tgl Kembali</th>
                            <th>Jumlah</th>
                            <th>Mobil</th>
                            <th>Harga</th>
                            <th>Customer</th>
                            <th>No Telpn</th>
                            <th>Alamat</th>
                            <th>Total Harga</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($lap_penyewaan as $dt) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt['tgl_sewa']; ?></td>
                                <td><?= $dt['id_rental']; ?></td>
                                <td><?= $dt['tgl_kembali']; ?></td>
                                <td><?= $dt['jumlah_sewa']; ?></td>
                                <td><?= $dt['nama']; ?> - <?= $dt['no_plat']; ?></td>
                                <td><?= $dt['harga']; ?></td>
                                <td><?= $dt['nama_customer']; ?></td>
                                <td><?= $dt['no_telpn']; ?></td>
                                <td><?= $dt['alamat']; ?></td>
                                <td><?= $dt['total_harga']; ?></td>
                                <td><?= $dt['total_bayar']; ?></td>
                                <td><?= $dt['status'] == 1 ? "Disewa" : "Selesai" ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <th colspan="10">Total Pendapatan Rental Mobil</th>
                        <th><?= $grandtotal; ?></th>
                        <th><?= $tobar; ?></th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>