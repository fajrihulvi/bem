<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?> - Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url('assets/images/bem.png') ?>" type="image/x-icon">
    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-select.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-datepicker.min.css') ?>">
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

</head>
<body class="body">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menupos-fixed menu-light ">
        <div class="navbar-wrapper">
            <div class="navbar-content scroll-div " >
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item">
                        <a href="<?= base_url('admin') ?>" class="nav-link "><span class="pcoded-micon"><i class="fas fa-home"></i></span><span class="pcoded-mtext">Home</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link pcoded-hasmenu"><span class="pcoded-micon"><i class="fas fa-calendar-alt"></i></span><span class="pcoded-mtext">Kalender</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url('kalender_akademik') ?>">Akademik</a></li>
                            <li><a href="<?= base_url('kalender_peminjaman') ?>">Peminjaman</a></li>
                            <li><a href="<?= base_url('kalender_kegiatan') ?>">Kegiatan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link pcoded-hasmenu"><span class="pcoded-micon"><i class="fas fa-database"></i></span><span class="pcoded-mtext">Master Data</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url('aspirasi') ?>">Aspirasi</a></li>
                            <li><a href="<?= base_url('informasi') ?>">Informasi</a></li>
                            <li><a href="<?= base_url('ormawa') ?>">Ormawa</a></li>
                            <li><a href="<?= base_url('barang') ?>">Barang</a></li>
                        </ul>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue">
            
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <a href="<?= base_url('admin') ?>" style="color: white; font-size: 19px; font-weight: bold;" >KBM STT-PLN</a>
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <?php $notif = $this->db->order_by('id', 'DESC')->get_where('notifikasi', ['status' => '0'])->result_array(); ?>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i>
                            <?= (count($notif) !== 0)?"<span class='badge bg-danger'>":'' ?><span class="sr-only"></span></span></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifikasi</h6>
                                <div class="float-right">
                                    <a href="<?= base_url('admin/notif_clear') ?>" class="m-r-10">Tandai Semua Dibaca</a>
                                </div>
                            </div>
                            <ul class="list-group">
                                <?php foreach ($notif as $row): ?>
                                <li class="notification">
                                    <a href="<?= base_url($row['link']) ?>" style="padding: 0;" class="notif" data-id="<?= $row['id'] ?>">
                                        <div class="media">
                                            <div class="media-body">
                                                <p><strong><?= $row['judul'] ?></strong><span class="n-time text-muted float-right"><i class="icon feather icon-clock m-r-10"></i><?= waktu_lalu($row['time']) ?></span></p>
                                                <p><?= $row['isi'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="noti-footer">
                                <a href="<?= base_url('admin/show_notif') ?>">Tampilkan Semua</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= base_url('assets/images/user/default.png') ?>" class="img-radius wid-40" alt="User-Profile-Image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="<?= base_url('assets/images/user/default.png') ?>" class="img-radius" alt="User-Profile-Image">
                                <br>
                                <span><?= $this->session->userdata('nama') ?></span>
                                <a href="<?= base_url('auth/logout') ?>" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="<?= base_url('user/profile') ?>" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <li><a href="<?= base_url('user/ubah_pass') ?>" class="dropdown-item"><i class="feather icon-lock"></i> Change Password</a></li>
                                <?php if($this->session->userdata('hak_akses') == 'admin'): ?>
                                <li><a href="<?= base_url('user') ?>" class="dropdown-item"><i class="feather icon-users"></i> Manajemen Users</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

    <?= $contents ?>

    <script>var base_url = '<?= base_url() ?>';</script>
    <!-- Required Js -->
    <script src="<?= base_url('assets/js/vendor-all.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/pcoded.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap-select.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/sweetalert2.js')?>"></script>
    <script src="<?= base_url('assets/js/myscript.js')?>"></script>
    <!-- 
        Hellow World :) 
    -->

</body>

</html>