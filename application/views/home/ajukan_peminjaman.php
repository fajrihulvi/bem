	<!--Page Title-->
    <section class="page-title" style="background-image:url(<?= base_url('assets/images/background/7.png') ?>)">
    	<div class="auto-container">
			<div class="content">
				<h1>Ajukan <span>Peminjaman</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?= base_url('home') ?>">Home</a></li>
					<li><a href="<?= base_url('home/kalender_peminjaman') ?>">Kalender</a></li>
					<li>Ajukan Peminjaman</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
    
	<!-- Contact Form Box -->
	<section class="contact-form-section">
		<div class="auto-container">
			<?= $this->session->flashdata('message'); ?>
			<div class="inner-container">
				<div class="icons-one"></div>
				<div class="icons-two"></div>
				<h3>Ingin mengajukan peminjaman?<br>Silahkan isi form dibawah.</h3>
				
				<!-- Default Form -->
				<div class="default-form">
					<form method="post" action="">
						<div class="row clearfix">

							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<input type="date" name="tgl_pinjam" class="form-control" required>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<input type="text" name="lama_pinjam" placeholder="Lama Pinjam" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<select name="barang">
									<option>--Pilih Barang--</option>
									<?php foreach ($barang as $row): ?>
									<option value="<?= $row['id'] ?>"><?= $row['nama_barang'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<input type="text" name="jumlah" placeholder="Jumlah" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
								<button class="theme-btn btn-style-one" type="submit" name="submit-form">Ajukan Peminjaman</button>
							</div>
							
						</div>
					</form>=
				</div>
				<!--End Default Form -->
				<div class="side-image wow rubberBand" data-wow-delay="0ms" data-wow-duration="1500ms">
					<img src="images/resource/form-icon.png" alt="" />
				</div>
			</div>
		</div>
	</section>
	<!-- End Contact Form Box -->
	<br>