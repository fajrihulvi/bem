	
    <section class="page-title" style="background-image:url(<?= base_url('assets/images/background/7.png') ?>)">
    	<div class="auto-container">
			<div class="content">
				<h1><span>Aspirasi</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?= base_url('home') ?>">Home</a></li>
					<li>Aspirasi</li>
				</ul>
			</div>
        </div>
    </section>
	
	
	<section class="contact-form-section">
		<div class="auto-container">
			<?= $this->session->flashdata('message'); ?>
			<div class="inner-container">
				<div class="icons-one"></div>
				<div class="icons-two"></div>
				<h3>Ada aspirasi? <br> Silahkan tulis dibawah.</h3>
				<!-- Default Form -->
				<div class="default-form">
					<form method="post" action="">
						<div class="row clearfix">

							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<select name="jenis" required>
									<option>-- Jenis --</option>
									<?php foreach ($record as $row):?>
									<option value="<?= $row['id'] ?>"><?= $row['jenis'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
					
							<div class="col-lg-12 col-md-12 col-sm-12 form-group">
								<textarea name="isi" placeholder="Aspirasi Anda"></textarea>
							</div>
						
							<div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
								<button class="theme-btn btn-style-one" type="submit" name="submit-form">Submit</button>
							</div>
							
						</div>
					</form>=
				</div>
				<!--End Default Form -->
				<div class="side-image wow rubberBand" data-wow-delay="0ms" data-wow-duration="1500ms">
					<img src="<?= base_url('assets/images/resource/form-icon.png') ?>" alt="" />
				</div>
			</div>
		</div>
	</section>
	
	<br>