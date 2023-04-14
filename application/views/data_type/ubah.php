 <div class="card card-primary">
     <div class="card-header">
         <h6 class="m-0 font-weight-bold text-primary">Edit Data Type Mobil</h6>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="" method="post">
         <div class="card-body">
             <input type="hidden" name="id" value="<?= $ubah_datatype['id_type'] ?>">
             <div class="form-group">
                 <label for="exampleInputEmail1">Nama Type</label>
                 <input type="text" name="nama_type" value="<?= $ubah_datatype['nama_type'] ?>" class="form-control">
                 <small class="form-text text-danger"><?= form_error('nama_type'); ?></small>
             </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="submit" name="tambah" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp;Update</button>
         </div>
     </form>
 </div>
 <!-- /.card -->