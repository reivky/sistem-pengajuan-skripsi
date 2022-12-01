<?php  
    $tahun = date('Y');
    $hasil1 = $tahun + 1;
    $hasil2 = $tahun - 1;
    $bulan_ini = date('n');
    if ($bulan_ini < 8) {
        $hasil = $hasil2.'_'.$tahun;
    }else{
        $hasil = $tahun.'_'.$hasil1;
    }
function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
          font-size: 11px; 
          font-family: Arial;
        }
        </style>
    </head>
    <body>
        <?php
        header("Content-Type: application/vnd.ms-word");
        header("Expires: 0");
        header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
        header("Content-disposition: attachment; filename=\"Pembimbing Skripsi $hasil.doc\"");
        ?>


        <div id="container">
            <div style="font-size: 11px; font-family: Arial; font-weight: bold; text-align: center; line-height: 1.2;">
            <p>DAFTAR PEMBIMBING SKRIPSI TAHUN AKADEMIK <?php  
            if ($bulan_ini < 8) {
                echo "$hasil2/$tahun";
            }else{
                echo "$tahun/$hasil1";
            }
            ?>
            <br>
            PROGRAM STUDI INFORMATIKA - FAKULTAS TEKNIK & INFORMATIKA
            <br>
            UNIVERSITAS PGRI SEMARANG</P>
            </div>
            <table cellpadding="3px" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama Lengkap</th>
                    <th>Pembimbing 1</th>
                    <th>Pembimbing 2</th>
                </tr>
            <?php
            $no=1;
            foreach ($skripsi as $v) : ?>
                    <tr>
                        <td align="center"><?= $no++; ?></td>
                        <td align="center"><?php cetak($v->nim) ?></td>
                        <td><?php cetak($v->nama) ?></td>
                        <td><?php cetak($v->dosbing1) ?></td>
                        <td><?php cetak($v->dosbing2) ?></td>
                    </tr>
            <?php endforeach; ?>
            </table>
            <center>
            <div style="margin-left: 7cm; font-size: 11px; font-family: Arial; text-align: left; line-height: 1.3;">
            <p>
                Semarang, <?= tgl_indo(date('Y-m-j')); ?>
                <br>
                Ka.Prodi Informatika FTI - UPGRIS
                <br>
                <br>
                <br>
                <br>
                <br>
                <?= $this->session->userdata('ses_nama') ?>
                <br>
                NIDN. <?= $this->session->userdata('ses_id') ?>
                <br>
            </p>
            </div>
            </center>
            <br> <br>

        </div>
    </body>
</html>