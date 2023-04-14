<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penyewaan</title>
</head>

<body style='font-family:tahoma; font-size:8pt;' onload="window.print()">
    <div style="text-align:justify; margin-top: 20px">
        <!-- <img src="<?php echo base_url(); ?>assets/img/BTS.jpg" style="width: 78px; height: 80px; float:left; margin:0 8px 4px 0;" /> -->
        <p style="text-align: center; line-height: 17px">
            <span style="font-size: 26px; color: black;"><strong>LAPORAN PENYEWAAN RENTAL MOBIL</strong></span><br />
            <span style="font-size: 20px; color: black;"><strong>CV. NAGA HITAM</strong></span><br />
            <!-- <span style="font-size: 17px; color: navy;"><strong>DAN ALAT PERAGA</strong></span><br /> -->
            <span style="font-size: 10px"><strong>JL. Raden Kusno, Terusan, Mempawah. NO.08</strong></span> <br>
            <span style="font-size: 10px"><strong>(0561) 583062, Mempawah 78124, Kalimantan Barat</strong></span>
            <hr>
        </p>
    </div>

    <center>

        <table style='width:100%; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='100%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:10pt'><b>Periode <?= date('d F Y', strtotime($tgl_awal)); ?> s.d <?= date('d F Y', strtotime($tgl_akhir)); ?></b></span></br>
            </td>
        </table>
        <table cellspacing='0' style='width:100%; font-size:10pt; font-family:calibri;  border-collapse: collapse;' border='1'>
            </br>
            <tr align='center'>
                <th style="width: 5px;">No</th>
                <th>Tgl Sewa</th>
                <th>No Penyewaan</th>
                <th>Tgl Kembali</th>
                <th>Jumlah</th>
                <th>Mobil</th>
                <th>Harga</th>
                <th>Customer</th>
                <th>No Telpn</th>
                <th>Alamat</th>
                <th>Total Harga</th>
                <th>Total Bayar</th>
                <th>Status</th>
            </tr>
            <?php
            $no = 1;
            foreach ($lap_penyewaan as $dt) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dt['tgl_sewa']; ?></td>
                    <td><?= $dt['id_rental']; ?></td>
                    <td><?= $dt['tgl_kembali']; ?></td>
                    <td><?= $dt['jumlah_sewa']; ?></td>
                    <td><?= $dt['nama']; ?> - <?= $dt['no_plat']; ?></td>
                    <td><?= $dt['harga']; ?></td>
                    <td><?= $dt['nama_customer']; ?></td>
                    <td><?= $dt['no_telpn']; ?></td>
                    <td><?= $dt['alamat']; ?></td>
                    <td><?= $dt['total_harga']; ?></td>
                    <td><?= $dt['total_bayar']; ?></td>
                    <td><?= $dt['status'] == 1 ? "Disewa" : "Selesai" ?></td>
                </tr>
            <?php endforeach; ?>
            <td colspan='10'>
                <div style='text-align:left; font-size:12pt'><b>Total Pendapatan Rental Mobil</b></div>
            </td>
            <td style='text-align:left; font-size:12pt'><b>Rp. <?= number_format($grandtotal, 0, ',', '.'); ?>,-</b></td>
            <td style='text-align:left; font-size:12pt'><b>Rp. <?= number_format($tobar, 0, ',', '.'); ?>,-</b></td>
            </tr>
        </table>

        <table style='width:100%; font-size:7pt;' cellspacing='2'>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <tr>
                <td style='border:0px solid black; padding:5px; text-align:left; width:80%'></td>
                <td align='center'>Mempawah, <?= date('d F Y'); ?></br>Pimpinan,</br></br></br></br></br></br><u>..................</u></td>
            </tr>
        </table>
    </center>
</body>

</html>