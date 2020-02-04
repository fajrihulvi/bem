<?php 
    $kumpul_bulan = "Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember";
    $arr_bulan = explode(" ", $kumpul_bulan);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Pemeriksaan</title>
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
        <h2>KALENDER PEMINJAMAN<br>
            BULAN <?= strtoupper($arr_bulan[$bulan-1]) ?> TAHUN <?= $tahun ?> 
        </h2>
    </center>
	<table class="customers">
        <thead>
            <tr>
                <th>No.</th>
                <th><center>Tanggal Pinjam</center></th>
                <th><center>Tanggal Kembali</center></th>
                <th>Lama Pinjam</th>
                <th>Nama Brang</th>
                <th>Jumlah</th>
                <th>Peminjam</th>
                <th>Ormawa</th>
                <th><center>Status</center></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($peminjaman as $row): ?>
            <tr>
                <td><strong><?= $i++; ?></strong></td>
                <td><center><?= $row['tgl_pinjam'] ?></center></td>
                <td><center><?= $row['tgl_kembali'] ?></center></td>
                <td><?= $row['lama_pinjam'] ?> Hari</td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['jumlah'].' '.$row['satuan'] ?></td>
                <td><?= $row['peminjam'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><center><?= ($row['status']=='1')?'dikembalikan':'dipinjam' ?></center></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>