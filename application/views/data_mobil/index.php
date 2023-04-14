<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->
    <?php echo $this->session->flashdata('message'); ?>
    <a href="" data-toggle="modal" data-target="#modal-mobil" class="btn btn-primary mt-2">Tambah Data</a>

    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Mobil</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 2px;">No</th>
                            <th>Gambar</th>
                            <th>merek</th>
                            <th>Type</th>
                            <th>Nama</th>
                            <th>Tahun</th>
                            <th>warna</th>
                            <th>Nomor plat</th>
                            <th>Harga perhari</th>
                            <th>Jumlah Kursi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_mobil as $dm) :
                        ?>
                            <tr>
                                <td style="width: 2px;"><?= $no++ ?></td>
                                <td><img class="img-thumbnail" alt="image" src="<?php echo base_url('assets/foto/' . $dm['foto']); ?>" width="100px"></td>
                                <td><?= $dm['nama_merek']; ?></td>
                                <td><?= $dm["nama_type"]; ?></td>
                                <td><?= $dm["nama"]; ?></td>
                                <td><?= $dm['tahun']; ?></td>
                                <td><?= $dm['warna']; ?></td>
                                <td><?= $dm['no_plat']; ?></td>
                                <td><?= $dm['harga']; ?></td>
                                <td><?= $dm['jumlah_kursi']; ?></td>
                                <td><?= $dm['status'] == 1 ? "Tersedia" : "Belum Tersedia" ?></td>
                                <td>
                                    <a href="<?= base_url() ?>data_mobil/ubah/<?= $dm['id_mobil']; ?>"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i> Edit</button></a> &nbsp;
                                    <a href="<?= base_url() ?>data_mobil/hapus/<?= $dm['id_mobil']; ?>" onclick="return confirm('Yakin Data Akan dihapus..?');" type="button" class="btn btn-danger" style="width: 90px;"><i class="fa fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-mobil" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Mobil</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="ibox-content">
                    <?= form_open_multipart('data_mobil/tambah'); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Merek</label>
                        <select name="nama_merek" class="form-control" required>
                            <option value="">Pilih</option>
                            <?php foreach ($nama_merek as $dm) : ?>
                                <option value="<?= $dm['id_merek']; ?>"><?= $dm['nama_merek']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Type</label>
                        <select name="nama_type" class="form-control" required>
                            <option value="">Pilih</option>
                            <?php foreach ($nama_type as $dm) : ?>
                                <option value="<?= $dm['id_type']; ?>"><?= $dm['nama_type']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Mobil</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Plat</label>
                        <input type="text" name="no_plat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Warna</label>
                        <input type="text" name="warna" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tahun</label>
                        <input type="text" name="tahun" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="text" name="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Kursi</label>
                        <input type="text" name="jumlah_kursi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto</label>
                        <input id="foto" name="foto" type="file" class="form-control">
                    </div>

                    <button class="btn btn-primary " type="submit" name="tambah"><i class="fa fa-check"></i>&nbsp;Simpan</button>
                </div>
                <!-- /.card-body -->
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>