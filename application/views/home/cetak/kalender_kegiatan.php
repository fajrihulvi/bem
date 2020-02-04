<?php 
    $kumpul_bulan = "Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember";
    $arr_bulan = explode(" ", $kumpul_bulan);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Kalender Kegiatan</title>
    <style>
        body {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }
        .customers {
          border-collapse: collapse;
          width: 100%;
        }

        .customers td, .customers th {
          border: 1px solid black;
          padding: 8px;
        }

        .customers tr:hover {background-color: #ddd;}

        .customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #ddd;
          color: black;
        }
    </style>
</head>
<body>
    <center>
        <h2>KALENDER KEGIATAN<br>
            BULAN <?= strtoupper($arr_bulan[$bulan-1]) ?> TAHUN <?= $tahun ?> 
        </h2>
    </center>
	<table class="customers">
        <thead>
            <tr>
                <th>No.</th>
                <th><center>Tanggal Mulai</center></th>
                <th><center>Tanggal Selesai</center></th>
                <th>Nama Kegiatan</th>
                <th>Ormawa</th>
                <th>Jenis Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($kegiatan as $row): ?>
            <tr>
                <td><strong><?= $i++; ?></strong></td>
                <td><center><?= $row['tgl_mulai'] ?></center></td>
                <td><center><?= $row['tgl_selesai'] ?></center></td>
                <td><?= $row['nama_kegiatan'] ?></td>
                <td><?= $row['nama_ormawa'] ?></td>
                <td><?= $row['jenis'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>