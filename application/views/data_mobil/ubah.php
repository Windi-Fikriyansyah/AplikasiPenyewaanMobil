 <div class="card card-primary">
     <div class="card-header">
         <h6 class="m-0 font-weight-bold text-primary">Edit Data Mobil</h6>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <?= form_open_multipart('data_mobil/ubah'); ?>
     <div class="card-body">
         <input type="hidden" name="id" value="<?= $ubah_datamobil['id_mobil'] ?>">
         <div class="form-group">
             <label for="exampleInputEmail1">Nama Merek</label>
             <select name="nama_merek" class="form-control" required>
                 <option value="<?= $ubah_datamobil['id_merek'] ?>"><?= $ubah_datamobil['nama_merek'] ?></option>
                 <?php foreach ($nama_merek as $dm) : ?>
                     <option value="<?= $dm['id_merek']; ?>"><?= $dm['nama_merek']; ?></option>
                 <?php endforeach; ?>
             </select>
         </div>
         <div class="form-group">
             <label for="exampleInputEmail1">Nama Type</label>
             <select name="nama_type" class="form-control" required>
                 <option value="<?= $ubah_datamobil['id_type'] ?>"><?= $ubah_datamobil['nama_type'] ?></option>
                 <?php foreach ($nama_type as $dm) : ?>
                     <option value="<?= $dm['id_type']; ?>"><?= $dm['nama_type']; ?></option>
                 <?php endforeach; ?>
             </select>
         </div>
         <div class="form-group">
             <label for="exampleInputEmail1">Nama Mobil</label>
             <input type="text" name="nama" value="<?= $ubah_datamobil['nama'] ?>" class="form-control" required>
         </div>
         <div class="form-group">
             <label for="exampleInputEmail1">No Plat</label>
             <input type="text" name="no_plat" value="<?= $ubah_datamobil['no_plat'] ?>" class="form-control" required>
         </div>
         <div class="form-group">
             <label for="exampleInputEmail1">Warna</label>
             <input type="text" name="warna" value="<?= $ubah_datamobil['warna'] ?>" class="form-control" required>
         </div>
         <div class="form-group">
             <label for="exampleInputEmail1">Tahun</label>
             <input type="text" name="tahun" value="<?= $ubah_datamobil['tahun'] ?>" class="form-control" required>
         </div>
         <div class="form-group">
             <label for="exampleInputEmail1">Harga</label>
             <input type="text" name="harga" value="<?= $ubah_datamobil['harga'] ?>" class="form-control" required>
         </div>
         <div class="form-group">
             <label for="exampleInputEmail1">Jumlah Kursi</label>
             <input type="text" name="jumlah_kursi" value="<?= $ubah_datamobil['jumlah_kursi'] ?>" class="form-control" required>
         </div>
         <div class="form-group">
             <label for="exampleInputEmail1">Foto</label>
             <input type="hidden" name="image" value="<?= $ubah_datamobil['foto'] ?>">
             <input id="foto" name="foto" type="file" class="form-control">
         </div>
     </div>
     <!-- /.card-body -->
     <div class="card-footer">
         <button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Update</button>
     </div>
     <?= form_close(); ?>
 </div>
 <!-- /.card -->