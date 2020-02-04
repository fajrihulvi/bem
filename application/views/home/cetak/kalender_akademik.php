<!DOCTYPE html>
<html>
<head>
	<title>Cetak Kalender Akademik</title>
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
        <h2>KALENDER AKADEMIK STT-PLN <br> SEMESTER <?= strtoupper($kalender->semester) ?> <br> TAHUN AJARAN <?= $kalender->tahun_ajar ?> </h2>
    </center>
	<table class="customers">
        <thead>
            <tr>
                <th>NO.</th>
                <th><center>KEGIATAN</center></th>
                <th><center>TANGGAL</center></th>
            </tr>
        </thead>
        <tbody>
            <?php $angka=1; foreach ($jenis as $row): ?>
            <?php $data = $this->m_akademik->getDataJenis($row['id_jenis']); ?>
            <tr>
                <td><strong><?= KonDecRomawi($angka++) ?></strong></td>
                <td><strong><?= $row['jenis'] ?></strong></td>
                <td><center>
                    <?= ($data[0]['keterangan'] == '')? cekTanggal($row['tgl_mulai'], $row['tgl_selesai']):'' ?>
                    </center>
                </td>
            </tr>
            <?php if($data[0]['keterangan'] !== ''): ?>
            <?php $i=1; foreach ($data as $val): ?>
            <tr>
                <td><strong><center><?= $i++ ?></center></strong></td>
                <td><?= $val['keterangan'] ?></td>
                <td><center><?= cekTanggal($val['tgl_mulai'], $val['tgl_selesai']) ?></center></td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>