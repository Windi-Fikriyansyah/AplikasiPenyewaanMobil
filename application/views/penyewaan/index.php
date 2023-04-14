<div class="card card-primary">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Penyewaan</h6>
    </div>
    <div class="card card-widget">
        <div class="card-body">
            <form action="<?= base_url('penyewaan/simpan'); ?>" method="post">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Sewa</label>
                            <input type="text" name="id_rental" value="<?= $no_otomatis; ?>" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pelanggan</label>
                            <div class="form-group input-group">
                                <select name="customer" id="id_customer" class="form-control chosen-select" tabindex="2">
                                    <option value="">Pilih Pelanggan...</option>
                                    <?php foreach ($customer as $spl) : ?>
                                        <option value="<?= $spl['id_customer']; ?>"><?= $spl['nama']; ?> - <?= $spl['no_telpn']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" data-toggle="modal" data-target="#modal-customer" class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tgl Sewa</label>
                            <input type="date" name="tgl_sewa" id="date1" value="<?= date('Y-m-d') ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tgl Kembali</label>
                            <input type="date" name="tgl_kembali" id="date2" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobil</label>
                            <select name="mobil" onchange="mbl()" id="hrg_mobil" class="form-control chosen-select" tabindex="2" required>
                                <option value="">Pilih Mobil...</option>
                                <?php foreach ($mobil as $mbl) : ?>
                                    <option value="<?= $mbl['id_mobil']; ?>" data-harga="<?= $mbl['harga']; ?>"><?= $mbl['nama']; ?> - <?= $mbl['no_plat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga perHari</label>
                            <input type="text" name="harga" id="hrg" class="form-control" value="0" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Hari</label>
                            <input type="text" name="hari" id="jumlah" class="form-control" value="0" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Grand Total</label>
                            <input type="text" name="total" id="ttl" class="form-control" value="0" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bayar/DP</label>
                            <input type="text" name="bayar" class="form-control" value="0" min="0" required>
                        </div>
                    </div>
                </div>

        </div>
        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Simpan</button>
            &nbsp;&nbsp;<a href="" data-toggle="modal" data-target="#modal-penyewaan" class="btn btn-info"><i class="fa fa-list"></i>&nbsp;Data Penyewaan</a>
        </div>
        </form>
    </div>
</div>

<!-- ========================================================================================= -->

<div class="modal fade" id="modal-customer" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Customer</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="ibox-content">
                    <?= form_open_multipart('penyewaan/simpan_customer'); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Ktp Customer</label>
                        <input type="number" name="no_ktp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <select class="form-control" name="gender" required>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Telephone</label>
                        <input type="number" name="no_telpn" class="form-control" required>
                    </div>

                    <button class="btn btn-primary " type="submit" name="tambah"><i class="fa fa-check"></i>&nbsp;Simpan</button>
                </div>
                <!-- /.card-body -->
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================================= -->
<div class="modal fade" id="modal-penyewaan" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Customer</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
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
                                        <a href="<?= base_url() ?>penyewaan/hapus/<?= $dt['id_rental']; ?>" onclick="return confirm('Yakin Data Akan dihapus..?');" type="button" class="btn btn-danger" style="width: 90px;"><i class="fa fa-trash"></i>Hapus</a>
                                    </td>
                                </tr>
                                </form>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>