
<!DOCTYPE html>
<html lang="en">

<head>

    
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" type="text/css">
</head>

    <body>
        
    
            
        <div align="center">
            <form method="POST" action="<?php base_url('admin/tambah'); ?>" enctype="multipart/form-data">
            
                <fieldset>
               
                    <legend>Tambah Data Mobil</legend>
                    
                    <p class="mx-3">
                        <label for="nama_admin" style="margin-right: -23px;">
                            Nama Admin
                        </label>
                        <input
                            
                            placeholder="Nama Admin"
                           
                            name="nama_admin"
                            type="text"
                        >
                        <small class="form-text text-danger"><?= form_error('nama_admin'); ?> </small>
                    </p>

                    <p class="mx-3">
                        <label for="username" style="margin-right: -28px;">
                           Username 
                        </label>
                        <input
                            
                            placeholder="username"
                           
                            name="username"
                            type="text"
                        >
                        <small class="form-text text-danger"><?= form_error('username'); ?> </small>
                    </p>

                    <p class="mx-3">
                        <label for="password" style="margin-right: -28px;">
                           Password 
                        </label>
                        <input
                            
                            placeholder="password"
                           
                            name="pass1"
                            type="password"
                        >
                        <small class="form-text text-danger"><?= form_error('password'); ?> </small>
                    </p>

                    <p class="mx-3">
                        <label for="password" style="margin-right: -28px;">
                           Konfirmasi Password 
                        </label>
                        <input
                            
                            placeholder="Konfirmasi Password"
                           
                            name="pass2"
                            type="password"
                        >
                        <small class="form-text text-danger"><?= form_error('password'); ?> </small>
                    </p>
                   
                    <p>
                        <button type="submit" name="tambah">Submit</button>
                    </p>
                
                </fieldset>
               
            </form>
        </div>
    
       
    </body>
       </html>
