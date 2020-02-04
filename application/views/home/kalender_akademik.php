	<!--Page Title-->
    <section class="page-title" style="background-image:url(<?= base_url('assets/images/background/7.png') ?>)">
    	<div class="auto-container">
			<div class="content">
				<h1>Kalender <span>Akademik</span></h1>
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
	    	<h4 class="text-center">Kalender Akademik STT-PLN <br> Semester <?= $kalender->semester ?> <br> Tahun Ajaran <?= $kalender->tahun_ajar ?> </h4>
	    	<br>
	    	<div class="row mb-2">
	    		<div class="col-md-6">
	    			
	    		</div>
	    		<div class="col-md-6">
	    			<form action="" method="post">
	    			<div class="input-group">
						<select class="form-control" name="semester">
							<option <?= ($kalender->semester == 'Ganjil')?'selected':'' ?> value="Ganjil">Ganjil</option>
							<option <?= ($kalender->semester == 'Genap')?'selected':'' ?> value="Genap">Genap</option>
						</select>
						<select class="form-control" name="tahun_ajar">
		                    <?php for($i=date('Y'); $i>=date('Y')-5; $i--): ?>
		                    <option <?= ($kalender->tahun_ajar == ($i-1).'/'.$i )?'selected':'' ?> value="<?= ($i-1).'/'.$i ?>" ><?= ($i-1).'/'.$i ?></option>
		                    <?php endfor; ?>
						</select>
						<div class="input-group-prepend">
							<button type="submit" name="submit" class="btn btn-primary">Filter</button>
			    			<button type="submit" name="download" class="btn btn-success"><i class="fa fa-print"></i> Download to Pdf</button>
						</div>
					</div>
					</form>
	    		</div>
	    	</div>
	    	<table class="table table-bordered">
	    		<thead class="bg-primary text-white">
	    			<tr>
	    				<th>NO.</th>
	    				<th class="text-center">KEGIATAN</th>
	    				<th class="text-center">TANGGAL</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php $angka=1; foreach ($jenis as $row): ?>
	    			<?php $data = $this->m_akademik->getDataJenis($row['id_jenis']); ?>
	    			<tr>
	    				<th><?= KonDecRomawi($angka++) ?></th>
	    				<th><?= $row['jenis'] ?></th>
	    				<td class="text-center">
	    					<?= ($data[0]['keterangan'] == '')? cekTanggal($row['tgl_mulai'], $row['tgl_selesai']):'' ?>
	    				</td>
	    			</tr>
	    			<?php if($data[0]['keterangan'] !== ''): ?>
	    			<?php $i=1; foreach ($data as $val): ?>
	    			<tr>
	    				<td class="text-center"><?= $i++ ?></td>
	    				<td><?= $val['keterangan'] ?></td>
	    				<td class="text-center"><?= cekTanggal($val['tgl_mulai'], $val['tgl_selesai']) ?></td>
	    			</tr>
	    			<?php endforeach; ?>
	    			<?php endif; ?>
	    			<?php endforeach; ?>
	    		</tbody>
	    	</table>
	    </div>
    </section>
	