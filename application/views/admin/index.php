<div class="pcoded-main-container">
    <div class="pcoded-content">
    	<div class="row" >
            <div class="col-md-4">
                <a href="<?= base_url('barang') ?>">
                    <div class="card bg-c-blue order-card">
                        <div class="card-body">
                            <h6 class="text-white">Jumlah Barang</h6>
                            <h2 class="text-right text-white"><i class="fas fa-archive float-left"></i></i><span><?= $jmlBarang; ?></span></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('barang') ?>">
                    <div class="card bg-c-green order-card">
                        <div class="card-body">
                            <h6 class="text-white">Barang dipinjam</h6>
                            <h2 class="text-right text-white"><i class="fas fa-arrow-alt-circle-up float-left"></i><span><?= $jmlPinjam; ?></span></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('barang') ?>">
                    <div class="card bg-c-blue order-card">
                        <div class="card-body">
                            <h6 class="text-white">Barang dikembalikan</h6>
                            <h2 class="text-right text-white"><i class="fas fa-arrow-alt-circle-down float-left"></i><span><?= $jmlKembali; ?></span></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('kalender_kegiatan') ?>">
                    <div class="card bg-c-red order-card">
                        <div class="card-body">
                            <h6 class="text-white">Jumlah Kegiatan</h6>
                            <h2 class="text-right text-white"><i class="fas fa-arrow-alt-circle-up float-left"></i><span><?= $jmlKegiatan; ?></span></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('kalender_kegiatan') ?>">
                    <div class="card bg-c-purple order-card">
                        <div class="card-body">
                            <h6 class="text-white">Kegiatan Selesai</h6>
                            <h2 class="text-right text-white"><i class="fas fa-arrow-alt-circle-down float-left"></i><span><?= $kegiatanSelesai; ?></span></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('kalender_kegiatan') ?>">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-body">
                            <h6 class="text-white">Kegiatan Mendatang</h6>
                            <h2 class="text-right text-white"><i class="fas fa-archive float-left"></i></i><span><?= $kegiatanMendatang; ?></span></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('aspirasi') ?>">
                    <div class="card bg-c-blue order-card">
                        <div class="card-body">
                            <h6 class="text-white">Jumlah Aspirasi</h6>
                            <h2 class="text-right text-white"><i class="fas fa-info float-left"></i></i><span><?= $jmlAspirasi; ?></span></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('ormawa') ?>">
                    <div class="card bg-c-green order-card">
                        <div class="card-body">
                            <h6 class="text-white">Jumlah Ormawa</h6>
                            <h2 class="text-right text-white"><i class="fas fa-user-tie float-left"></i><span><?= $jmlOrmawa; ?></span></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?= base_url('user') ?>">
                    <div class="card bg-c-red order-card">
                        <div class="card-body">
                            <h6 class="text-white">Jumlah User</h6>
                            <h2 class="text-right text-white"><i class="fas fa-users float-left"></i><span><?= $jmluser; ?></span></h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>