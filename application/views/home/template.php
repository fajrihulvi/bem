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

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <!-- Main Header-->
    <header class="main-header">
    	
    	<!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="clearfix">
                	
                	<div class="pull-left logo-box">
                    	<div class="logo"><a href="<?= base_url('home') ?>" class="text-white"><h4>KBM STT-PLN</h4></a></div>
                    </div>
                   	
                   	<div class="nav-outer clearfix">
                    
						<!-- Main Menu -->
						<nav class="main-menu navbar-expand-md">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<li class="<?= ($active == 'index')?'current':'' ?>"><a href="<?= base_url('home') ?>">Home</a></li>
									<li class="dropdown <?= ($active == 'kalender')?'current':'' ?>"><a href="#">Kalender</a>
										<ul>
											<li><a href="<?= base_url('home/kalender_akademik') ?>">Akademik</a></li>
											<li><a href="<?= base_url('home/kalender_peminjaman') ?>">Peminjaman</a></li>
											<li><a href="<?= base_url('home/kalender_kegiatan') ?>">Kegiatan</a></li>
										</ul>
									</li>
									<li class="<?= ($active == 'informasi')?'current':'' ?>"><a href="<?= base_url('home/informasi') ?>">Informasi</a></li>
									<li class="<?= ($active == 'aspirasi')?'current':'' ?>"><a href="<?= base_url('home/aspirasi') ?>">Aspirasi</a></li>
									<li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
								</ul>
							</div>
							
						</nav>
						
					</div>
                   
                </div>
            </div>
        </div>
        <!--End Header Upper-->
        
		<!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container clearfix">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<a href="<?= base_url('/') ?>" class="text-white"><h4>KBM STT-PLN</h4></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                	<!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix">
                                <li><a href="<?= base_url('home') ?>">Home</a></li>
								<li class="dropdown"><a href="#">Kalender</a>
									<ul>
										<li><a href="<?= base_url('home/kalender_akademik') ?>">Akademik</a></li>
										<li><a href="<?= base_url('home/kalender_peminjaman') ?>">Peminjaman</a></li>
										<li><a href="<?= base_url('home/kalender_kegiatan') ?>">Kegiatan</a></li>
									</ul>
								</li>
								<li><a href="<?= base_url('home/informasi') ?>">Informasi</a></li>
								<li><a href="<?= base_url('home/aspirasi') ?>">Aspirasi</a></li>
								<li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
		
    </header>
    <!--End Main Header -->
    
    <?= $contents; ?>
    
    <!--Main Footer-->
    <footer class="main-footer style-two">
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">
                    
                    <!--Column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
                        
                            <!--Footer Column-->
                            <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">
                                    <div class="logo">
                                        <a href="index-2.html"><h3 class="text-primary">KBM STT-PLN</h3></a>
                                    </div>
                                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</div>
                                    <ul class="list-style-one">
                                        <li><span class="icon fa fa-phone"></span> +123 (4567) 890</li>
                                        <li><span class="icon fa fa-envelope"></span> info@pixer.com </li>
                                        <li><span class="icon fa fa-home"></span>380 St Kilda Road, Melbourne <br> VIC 3004, Australia</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                            <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h4>Links</h4>
                                    <ul class="list-link">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="<?= base_url('home/kalender_akademik') ?>">Kalender Akademik</a></li>
                                        <li><a href="<?= base_url('home/kalender_kegiatan') ?>">Kalender Kegiatan</a></li>
                                        <li><a href="<?= base_url('home/kalender_peminjaman') ?>">Kalender Peminjaman</a></li>
                                        <li><a href="<?= base_url('home/informasi') ?>">Informasi</a></li>
                                        <li><a href="<?= base_url('home/aspirasi') ?>">Aspirasi</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <!--Column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
                        
                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h4>Support</h4>
                                    <ul class="list-link">
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Submit a Ticket</a></li>
                                        <li><a href="#">Visit Knowledge Base</a></li>
                                        <li><a href="#">Support System</a></li>
                                        <li><a href="#">Refund Policy</a></li>
                                        <li><a href="#">Professional Services</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget gallery-widget">
                                    <h4>Gallery</h4>
                                    <div class="widget-content">
                                        <div class="images-outer clearfix">
                                            <!--Image Box-->
                                            <figure class="image-box"><a href="<?= base_url('assets/images/gallery/1.jpg') ?>" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="<?= base_url('assets/images/gallery/footer-gallery-thumb-1.jpg') ?>" alt=""></a></figure>
                                            <!--Image Box-->
                                            <figure class="image-box"><a href="<?= base_url('assets/images/gallery/2.jpg') ?>" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="<?= base_url('assets/images/gallery/footer-gallery-thumb-2.jpg') ?>" alt=""></a></figure>
                                            <!--Image Box-->
                                            <figure class="image-box"><a href="<?= base_url('assets/images/gallery/3.jpg') ?>" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="<?= base_url('assets/images/gallery/footer-gallery-thumb-3.jpg') ?>" alt=""></a></figure>
                                            <!--Image Box-->
                                            <figure class="image-box"><a href="<?= base_url('assets/images/gallery/4.jpg') ?>" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="<?= base_url('assets/images/gallery/footer-gallery-thumb-4.jpg') ?>" alt=""></a></figure>
                                            <!--Image Box-->
                                            <figure class="image-box"><a href="<?= base_url('assets/images/gallery/5.jpg') ?>" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="<?= base_url('assets/images/gallery/footer-gallery-thumb-5.jpg') ?>" alt=""></a></figure>
                                            <!--Image Box-->
                                            <figure class="image-box"><a href="<?= base_url('assets/images/gallery/6.jpg') ?>" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="<?= base_url('assets/images/gallery/footer-gallery-thumb-6.jpg') ?>" alt=""></a></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        
                        <!-- Copyright Column -->
                        <div class="copyright-column col-lg-6 col-md-6 col-sm-12">
                            <div class="copyright">2020 &copy; All rights reserved by <a href="#">Themexriver</a></div>
                        </div>
                        
                        <!-- Social Column -->
                        <div class="social-column col-lg-6 col-md-6 col-sm-12">
                            <ul>
                                <li class="follow">Follow us: </li>
                                <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                                <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>
                                <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                                <li><a href="#"><span class="fa fa-google-plus-square"></span></a></li>
                                <li><a href="#"><span class="fa fa-rss-square"></span></a></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>

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