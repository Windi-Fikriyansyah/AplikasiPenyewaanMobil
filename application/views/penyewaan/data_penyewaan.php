<div class="container-fluid">
    <!-- DataTales Example -->
    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Penyewaan</h6>
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
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_penyewaan as $dt) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt['tgl_sewa']; ?></td>
                                <td><?= $dt['id_rental']; ?></td>
                                <td><?= $dt['tgl_kembali']; ?></td>
                                <td><?= $dt['jumlah_sewa']; ?></td>
                                <td><?= $dt['nama']; ?> - <?= $dt['no_plat']; ?> - <?= number_format($dt['harga'], 0, ',', '.'); ?></td>
                                <td><?= $dt['nama_customer']; ?>-<?= $dt['no_telpn']; ?></td>
                                <td><?= $dt['total_harga']; ?></td>
                                <td><?= $dt['status'] == 1 ? "Disewa" : "Selesai" ?></td>
                                <td>
                                    <a href="<?= base_url() ?>penyewaan/hapus/<?= $dt['id_mobil']; ?>" onclick="return confirm('Yakin Data Akan dihapus..?');" type="button" class="btn btn-danger" style="width: 90px;"><i class="fa fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>