<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">TABLE DATA customer MOBIL</h1> -->
    <?php echo $this->session->flashdata('message'); ?>
    <a href="" data-toggle="modal" data-target="#modal-customer" class="btn btn-success mt-1">Tambah Data</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data customer</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5px;">No</th>

                            <th>Nama customer</th>
                            <th>Alamat</th>
                            <th>Gender</th>
                            <th>No telepon</th>
                            <th>No KTP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($data_customer as $dt) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt['nama']; ?></td>
                                <td><?= $dt['alamat']; ?></td>
                                <td><?= $dt['gender'] == 1 ? "Laki-laki" : "Perempuan" ?></td>
                                <td><?= $dt['no_telpn']; ?></td>
                                <td><?= $dt['no_ktp']; ?></td>
                                <td>
                                    <a href="<?= base_url() ?>data_customer/ubah/<?= $dt['id_customer']; ?>"><button class="btn btn-info " customer="button"><i class="fa fa-paste"></i> Edit</button></a>
                                    <a href="<?= base_url() ?>data_customer/hapus/<?= $dt['id_customer']; ?>" onclick="return confirm('Yakin Data Akan dihapus..?');" customer="button" class="btn btn-danger" style="width: 90px;"><i class="fa fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
                    <?= form_open_multipart('data_customer/tambah'); ?>
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