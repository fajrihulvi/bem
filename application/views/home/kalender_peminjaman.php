<?php 
	$kumpul_bulan = "Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember";
    $arr_bulan = explode(" ", $kumpul_bulan);
?>
	<!--Page Title-->
    <section class="page-title" style="background-image:url(<?= base_url('assets/images/background/7.png') ?>)">
    	<div class="auto-container">
			<div class="content">
				<h1>Kalender <span>Peminjaman</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?= base_url('home') ?>">Home</a></li>
					<li>Kalender</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->

    <section style="padding-top: 50px; padding-bottom: 150px;">
    	<div class="auto-container">
	    	<h4 class="text-center">KALENDER PEMINJAMAN<br>BULAN <?= strtoupper($arr_bulan[$bulan-1]) ?> TAHUN <?= $tahun ?> </h4>
	    	<br>
	    	<div class="row mb-2">
	    		<div class="col-md-3">
	    			<a href="<?= base_url('home/ajukan_pinjam') ?>" class="btn btn-warning btn-block text-white">Ajukan Peminjaman?</a>
	    		</div>
	    		<div class="col-md-3">
	    			
	    		</div>
	    		<div class="col-md-6">
	    			<form action="" method="post">
	    			<div class="input-group mt-1">
						<select class="form-control" name="bulan">
							<option <?= ($bulan == '1') ? 'selected':'' ?> value="1">Januari</option>
                            <option <?= ($bulan == '2') ? 'selected':'' ?> value="2">Februari</option>
                            <option <?= ($bulan == '3') ? 'selected':'' ?> value="3">Maret</option>
                            <option <?= ($bulan == '4') ? 'selected':'' ?> value="4">April</option>
                            <option <?= ($bulan == '5') ? 'selected':'' ?> value="5">Mei</option>
                            <option <?= ($bulan == '6') ? 'selected':'' ?> value="6">Juni</option>
                            <option <?= ($bulan == '7') ? 'selected':'' ?> value="7">Juli</option>
                            <option <?= ($bulan == '8') ? 'selected':'' ?> value="8">Agustus</option>
                            <option <?= ($bulan == '9') ? 'selected':'' ?> value="9">September</option>
                            <option <?= ($bulan == '10') ? 'selected':'' ?> value="10">Oktober</option>
                            <option <?= ($bulan == '11') ? 'selected':'' ?> value="11">November</option>
                            <option <?= ($bulan == '12') ? 'selected':'' ?> value="12">Desember</option>
						</select>
						<select class="form-control" name="tahun">
		                    <?php for($i=date('Y'); $i>=date('Y')-5; $i--): ?>
		                    <option value="<?= $i ?>" ><?= $i ?></option>
		                    <?php endfor; ?>
						</select>
						<div class="input-group-prepend">
							<button type="submit" name="submit" class="btn btn-primary">Filter</button>
			    			<button type="submit" name="download" class="btn btn-success"><i class="fa fa-print"></i> Download to Pdf</a>
						</div>
					</div>
					</form>
	    		</div>
	    	</div>
	    	<div class="table-responsive">
	    		<table class="table table-bordered">
		    		<thead class="bg-primary text-white">
		    			<tr>
		    				<th>No.</th>
		    				<th class="text-center">Tanggal Pinjam</th>
		    				<th class="text-center">Tanggal Kembali</th>
		    				<th>Lama Pinjam</th>
		    				<th>Nama Brang</th>
		    				<th>Jumlah</th>
		    				<th>Peminjam</th>
		    				<th>Ormawa</th>
		    				<th class="text-center">Status</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			<?php $i=1; foreach ($peminjaman as $row): ?>
		    			<tr>
		    				<th><?= $i++; ?></th>
		    				<td class="text-center"><?= $row['tgl_pinjam'] ?></td>
		    				<td class="text-center"><?= $row['tgl_kembali'] ?></td>
		    				<td><?= $row['lama_pinjam'] ?> Hari</td>
		    				<td><?= $row['nama_barang'] ?></td>
		    				<td><?= $row['jumlah'].' '.$row['satuan'] ?></td>
		    				<td><?= $row['peminjam'] ?></td>
		    				<td><?= $row['nama'] ?></td>
		    				<td class="text-center"><?= ($row['status']=='1')?'dikembalikan':'dipinjam' ?></td>
		    			</tr>
		    			<?php endforeach; ?>
		    			<?php if(count($peminjaman) == 0): ?>
		    			<tr>
		    				<td colspan="9" class="text-center">data tidak ditemukan</td>
		    			</tr>
		    			<?php endif; ?>
		    		</tbody>
		    	</table>
	    	</div>
	    </div>
    </section>
	