<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_content">
                <form action="<?= base_url('laporan/laporan_penyewaan'); ?>" method="POST" class="form-label-left input_mask">
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        Pilih Periode :
                        <input class="form-control" type="date" name="tgl_mulai" value="<?php $bulan = mktime(0, 0, 0, date('m') - 1, date('d'), date('Y'));
                                                                                        echo date('Y-m-d', $bulan); ?>" prequired="">
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        s.d
                        <input class="form-control" type="date" name="tgl_sampai" value="<?= date('Y-m-d'); ?>" required="">
                    </div>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <button type="submit" class=" btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>