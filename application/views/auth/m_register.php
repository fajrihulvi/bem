<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>Keluarga Besar Mahasiswa STT-PLN</title>
<!-- Stylesheets -->
<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/responsive.css') ?>" rel="stylesheet">

<link rel="shortcut icon" href="<?= base_url('assets/images/bem.png') ?>" type="image/x-icon">
<link rel="icon" href="<?= base_url('assets/images/bem.png') ?>" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-title" style="background-image:url(<?= base_url('assets/images/background/7.png') ?>)">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
	
	<section>
    	<div class="auto-container">
			<section class="contact-form-section">
				<div class="auto-container">
					<div class="row justify-content-center">
						<div class="inner-container">

							<h3>Sign up</h3>
							<?= $this->session->flashdata('message'); ?>
							
							<!-- Default Form -->
							<div class="default-form">
								<form action="<?= base_url('auth/registration') ?>" method="post">
					            <div class="input-group">
					              <div class="input-group-prepend">
					                <span class="input-group-text"><i class="feather icon-user"></i></span>
					              </div>
					              <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
					            </div>
					            <div class="input-group mt-3">
					              <div class="input-group-prepend">
					                <span class="input-group-text"><i class="feather icon-user"></i></span>
					              </div>
					              <input type="text" name="nim" class="form-control" placeholder="NIM" value="<?= set_value('nim'); ?>">
					            </div>
					            <?= form_error('nim', '<small class="text-danger mt-0">', '</small>'); ?>
					            <div class="input-group mt-3">
					              <div class="input-group-prepend">
					                <span class="input-group-text"><i class="feather icon-mail"></i></span>
					              </div>
					              <input type="email" name="email" class="form-control" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
					            </div>
					            <?= form_error('email', '<small class="text-danger mt-0">', '</small>'); ?>
					            <div class="input-group mt-3">
					              <div class="input-group-prepend">
					                <span class="input-group-text"><i class="feather icon-phone"></i></span>
					              </div>
					              <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon" value="<?= set_value('no_telp'); ?>">
					            </div>
					            <?= form_error('no_telp', '<small class="text-danger mt-0">', '</small>'); ?>
					            <div class="input-group mt-3">
					              <div class="input-group-prepend">
					                <span class="input-group-text"><i class="feather icon-user"></i></span>
					              </div>
					              <select name="ormawa" class="form-control">
					                <option>Pilih Ormawa</option>
					                <?php foreach($ormawa as $row): ?>
					                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
					                <?php endforeach; ?>
					              </select>
					            </div>
					            <?= form_error('ormawa', '<small class="text-danger mt-0">', '</small>'); ?>
					            <div class="input-group mt-3">
					              <div class="input-group-prepend">
					                <span class="input-group-text"><i class="feather icon-lock"></i></span>
					              </div>
					              <input type="password" name="password" class="form-control" placeholder="Password">
					            </div>
					            <?= form_error('password', '<small class="text-danger mt-0">', '</small>'); ?>
					            <div class="input-group mt-3">
					              <div class="input-group-prepend">
					                <span class="input-group-text"><i class="feather icon-lock"></i></span>
					              </div>
					              <input type="password" name="konfir-password" class="form-control" placeholder="Konfirmasi Password">
					            </div>
					            <?= form_error('konfir-password', '<small class="text-danger mt-0">', '</small>'); ?>
					            <button class="btn btn-primary btn-block mb-4 mt-3" type="submit">Sign up</button>
					            </form>							
					        </div>
								<h6 class="text-center text-white">Sudah punya akun? <a href="<?= base_url('auth') ?>" class="text-warning" style="text-decoration: underline;" >Login Disini</a></h6>
								<!--End Default Form -->
								<div class="side-image wow rubberBand" data-wow-delay="0ms" data-wow-duration="1500ms">
									<img src="<?= base_url('assets/images/resource/form-icon.png') ?>" alt=""/>
								</div>
						</div>
					</div>
				</div>
				
			</section>
        </div>
    </section>
</div>
<!--End pagewrapper-->

<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.fancybox.js') ?>"></script>
<script src="<?= base_url('assets/js/appear.js') ?>"></script>
<script src="<?= base_url('assets/js/owl.js') ?>"></script>
<script src="<?= base_url('assets/js/wow.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery-ui.js') ?>"></script>
<script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>