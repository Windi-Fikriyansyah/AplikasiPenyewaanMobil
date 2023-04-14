<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">TABLE DATA ADMIN</h1> -->
    <?php echo $this->session->flashdata('message'); ?>
    <a href="" data-toggle="modal" data-target="#modal-admin" class="btn btn-success mt-1">Tambah Data</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Admin Mobil</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5px;">No</th>
                            <th>Nama Admin</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($admin as $dt) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt['nama_admin']; ?></td>

                                <td><?= $dt['username']; ?></td>
                                <td>
                                    <a href="<?= base_url() ?>admin/ubah/<?= $dt['id_admin']; ?>"><button class="btn btn-info " admin="button"><i class="fa fa-paste"></i> Edit</button></a>
                                    <?php if ($this->fungsi->user_login()->id_admin == $dt['id_admin']) {
                                    } else { ?>
                                        <a href="<?= base_url() ?>admin/hapus/<?= $dt['id_admin']; ?>" onclick="return confirm('Yakin Data Akan dihapus..?');" admin="button" class="btn btn-danger" style="width: 90px;"><i class="fa fa-trash"></i>Hapus</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-admin" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Admin</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="ibox-content">
                    <form action="<?= base_url('admin/tambah'); ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama_admin" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="pass1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Konfirmasi Password</label>
                            <input type="password" name="pass2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hak Akses</label>
                            <select name="hak_akses" class="form-control">
                                <option value="1">Pimpinan</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>

                        <button class="btn btn-primary " type="submit" name="tambah"><i class="fa fa-check"></i>&nbsp;Simpan</button>
                </div>
                <!-- /.card-body -->
                </form>
            </div>
        </div>
    </div>
</div>