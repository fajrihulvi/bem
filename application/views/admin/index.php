<div class="pcoded-main-container">
    <div class="pcoded-content">
    	<div class="row" >
            <div class="col-md-4">
                <div class="card bg-c-blue order-card">
                    <div class="card-body">
                        <h6 class="text-white">Jumlah Barang</h6>
                        <h2 class="text-right text-white"><i class="fas fa-archive float-left"></i></i><span><?= $jmlBarang; ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-c-green order-card">
                    <div class="card-body">
                        <h6 class="text-white">Barang dipinjam</h6>
                        <h2 class="text-right text-white"><i class="fas fa-arrow-alt-circle-up float-left"></i><span><?= $jmlPinjam; ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-c-yellow order-card">
                    <div class="card-body">
                        <h6 class="text-white">Barang dikembalikan</h6>
                        <h2 class="text-right text-white"><i class="fas fa-arrow-alt-circle-down float-left"></i><span><?= $jmlKembali; ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-c-green order-card">
                    <div class="card-body">
                        <h6 class="text-white">Jumlah Kegiatan</h6>
                        <h2 class="text-right text-white"><i class="fas fa-arrow-alt-circle-up float-left"></i><span><?= $jmlKegiatan; ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-c-yellow order-card">
                    <div class="card-body">
                        <h6 class="text-white">Kegiatan Selesai</h6>
                        <h2 class="text-right text-white"><i class="fas fa-arrow-alt-circle-down float-left"></i><span><?= $kegiatanSelesai; ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-c-blue order-card">
                    <div class="card-body">
                        <h6 class="text-white">Kegiatan Mendatang</h6>
                        <h2 class="text-right text-white"><i class="fas fa-archive float-left"></i></i><span><?= $kegiatanMendatang; ?></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>