 <div class="card card-primary">
     <div class="card-header">
         <h6 class="m-0 font-weight-bold text-primary">Edit Data Customer</h6>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="" method="post">
         <div class="card-body">
             <input type="hidden" name="id" value="<?= $ubah_datacustomer['id_customer'] ?>">
             <div class="form-group">
                 <label for="exampleInputEmail1">No Ktp Customer</label>
                 <input type="number" name="no_ktp" value="<?= $ubah_datacustomer['no_ktp'] ?>" class="form-control" required>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Nama</label>
                 <input type="text" name="nama" value="<?= $ubah_datacustomer['nama'] ?>" class="form-control" required>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Alamat</label>
                 <input type="text" name="alamat" value="<?= $ubah_datacustomer['alamat'] ?>" class="form-control" required>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Gender</label>
                 <select class="form-control" name="gender" required>
                     <option value="<?= $ubah_datacustomer['gender'] ?>"><?= $ubah_datacustomer['gender'] ?></option>
                     <option value="Laki-Laki">Laki-Laki</option>
                     <option value="Perempuan">Perempuan</option>
                 </select>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">No Telephone</label>
                 <input type="number" name="no_telpn" value="<?= $ubah_datacustomer['no_telpn'] ?>" class="form-control" required>
             </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Update</button>
         </div>
     </form>
 </div>
 <!-- /.card -->