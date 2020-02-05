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
						<div class="inner-container col-md-6">

							<h3>Please Login</h3>
							<?= $this->session->flashdata('message'); ?>
							
							<!-- Default Form -->
							<div class="default-form">
								<form method="post" action="">
									<div class="row clearfix">

										<div class="col-md-12 form-group">
											<input type="text" name="nim" placeholder="NIM" required>
										</div>
								
										<div class=" col-md-12 form-group">
											<input type="password" name="password" placeholder="Password" required>
										</div>
									
										<div class=" col-md-12 form-group text-center">
											<button class="theme-btn btn-style-one" type="submit" name="submit-form">Submit</button>
										</div>
										
									</div>
								</form>
							</div>
							<h6 class="text-center text-white">Belum punya akun? <a href="<?= base_url('auth/registration') ?>" class="text-warning" style="text-decoration: underline;" >Daftar Disini</a></h6>
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