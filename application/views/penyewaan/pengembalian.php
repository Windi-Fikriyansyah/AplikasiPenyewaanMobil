<div class="container-fluid">
    <!-- DataTales Example -->
    <?php echo $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pengembaian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tgl pengembalian</th>
                            <th>Mobil</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Tambahan</th>

                            <th>Sisa</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_penyewaan as $dt) : ?>

                            <tr>
                                <form action="<?= base_url('penyewaan/bayar') ?>" method="post">
                                    <td><?= $dt['tgl_kembali']; ?></td>
                                    <td><?= $dt['nama']; ?><br>-<?= $dt['no_plat']; ?><br>-<?= number_format($dt['harga'], 0, ',', '.'); ?></td>
                                    <td><?= $dt['nama_customer']; ?><br>-<?= $dt['no_telpn']; ?></td>
                                    <td>
                                        <?= number_format($dt['total_harga'], 0, ',', '.'); ?>
                                        <input type="hidden" value="<?= $dt['total_harga'] ?>" name="ttl">
                                    </td>
                                    <td>
                                        <?= number_format($dt['total_bayar'], 0, ',', '.'); ?>
                                        <input type="hidden" value="<?= $dt['total_bayar'] ?>" name="ttl_byr">
                                    </td>
                                    <?php if (date('Y-m-d') <= $dt['tgl_kembali']) { ?>

                                        <td>
                                            0
                                            <input type="hidden" value="0" name="tambahan" class="form-control" readonly>
                                        </td>
                                    <?php } else {
                                        $tgl1 = new DateTime($dt['tgl_kembali']);
                                        $tgl2 = new DateTime(date('Y-m-d'));
                                        $jarak = $tgl2->diff($tgl1);
                                        $jml = $jarak->d;
                                        $total = $dt['harga'] * $jml;
                                    ?>
                                    <input type="hidden" value="<?= $jml ?>" name="tambahan_hari">
                                        <td>
                                            <?= number_format($total, 0, ',', '.'); ?>
                                            <input type="hidden" value="<?= $total ?>" name="tambahan" class="form-control" readonly>
                                            <br>Tambahan <?= $jml ?> hari
                                        </td>
                                    <?php } ?>
                                    <td>
                                        <?php if (date('Y-m-d') <= $dt['tgl_kembali']) { ?>
                                            <?= number_format($dt['sisa_pembayaran'], 0, ',', '.'); ?>
                                            <input type="hidden" value="<?= $dt['sisa_pembayaran'] ?>" name="sisa_byr">
                                        <?php } else {
                                            $ttl_sisa = $total + $dt['sisa_pembayaran']; ?>
                                            <?= number_format($ttl_sisa, 0, ',', '.'); ?>
                                            <input type="hidden" value="<?= $ttl_sisa ?>" name="sisa_byr">
                                        <?php } ?>
                                    </td>
                                    <input type="hidden" value="<?= $dt['jumlah_sewa'] ?>" name="hari">
                                    <input type="hidden" value="<?= date('Y-m-d') ?>" name="tgl_pengembalian">
                                    
                                    <td>
                                        <div class="form-group input-group">
                                            <input type="hidden" value="<?= $dt['id_rental'] ?>" name="id">
                                            <input type="hidden" value="<?= $dt['id_mobil'] ?>" name="mobil">
                                            <input type="number" name="bayar" class="form-control">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary" type="button"><i class="fa fa-check"></i>
                                                </button>
                                            </span>
                                        </div>
                                </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>