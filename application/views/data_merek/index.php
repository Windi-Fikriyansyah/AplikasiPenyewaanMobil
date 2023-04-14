<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">TABLE DATA TYPE MOBIL</h1> -->
    <?php echo $this->session->flashdata('message'); ?>
    <a href="" data-toggle="modal" data-target="#modal-merek" class="btn btn-success mt-1">Tambah Data</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Merek Mobil</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5px;">No</th>
                            <th>Nama Merek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($data_merek as $dt) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dt['nama_merek']; ?></td>
                                <td>
                                    <a href="<?= base_url() ?>data_merek/ubah/<?= $dt['id_merek']; ?>"><button class="btn btn-info " merek="button"><i class="fa fa-paste"></i> Edit</button></a>
                                    <a href="<?= base_url() ?>data_merek/hapus/<?= $dt['id_merek']; ?>" onclick="return confirm('Yakin Data Akan dihapus..?');" type="button" class="btn btn-danger" style="width: 90px;"><i class="fa fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-merek" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Merek Mobil</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="ibox-content">
                    <?= form_open_multipart('data_merek/tambah'); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Merek</label>
                        <input type="text" name="nama_merek" class="form-control" required>
                    </div>

                    <button class="btn btn-primary " type="submit" name="tambah"><i class="fa fa-check"></i>&nbsp;Simpan</button>
                </div>
                <!-- /.card-body -->


                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>