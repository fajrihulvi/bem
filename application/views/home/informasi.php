	<!--Page Title-->
    <section class="page-title" style="background-image:url(<?= base_url('assets/images/background/7.png') ?>)">
    	<div class="auto-container">
			<div class="content">
				<h1><span>Informasi</span></h1>
				<ul class="page-breadcrumb">
					<li><a href="<?= base_url('home') ?>">Home</a></li>
					<li>informasi</li>
				</ul>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- News Section -->
	<section class="news-section" style="padding-top:50px; ">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>Informasi <span>Terbaru</span></h2>
			</div>
			
			<div class="row clearfix">
				<?php foreach ($data as $row): ?>
				<!-- News Block -->
				<div class="news-block col-lg-4 col-md-6 col-sm-12 align-items-stretch">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms" style="height: 100%;">
						<div class="image">
							<a href="blog-single.html"><img src="<?= base_url('assets/images/informasi/'.$row['foto']) ?>" alt="" /></a>
						</div>
						<div class="lower-content">
							<h6><a href=""><?= $row['judul'] ?></a></h6>
							<p><?= substr($row['isi'], 0, 100).'...' ?></p>
							<div class="clearfix">
								<div class="pull-left">
									<div class="author">
										<div class="image"><img src="<?= base_url('assets/images/user/default.png') ?>" alt="" /></div>
										Admin
									</div>
								</div>
								<div class="pull-right">
									<div class="post-time"><?= date('d F Y', strtotime($row['tanggal'])) ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php echo $pagination; ?>
	</section>
	<!-- End News Section -->
	<br><br>
