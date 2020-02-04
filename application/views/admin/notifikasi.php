<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-header" style="padding-bottom: 5px;">
                        <h4>Notifikasi<a href="<?= base_url('admin/hapus_notif') ?>" class="btn btn-danger rounded hapus float-right">Hapus Semua</a></h4>

                        <hr>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($notif as $row): ?>
                            <a href="<?= base_url($row['link']) ?>" class="my-1 text-dark notif" data-id="<?= $row['id'] ?>">
                            <li class="list-group-item <?= ($row['status'] == '0')?'bg-light':'' ?>">
                                
                                <p><strong><?= $row['judul'] ?></strong></p>
                                <p><?= $row['isi'] ?><span class="n-time text-muted float-right"><i class="icon feather icon-clock m-r-10"></i><?= waktu_lalu($row['time']) ?></span></p>
                            </li>
                            </a>
                            <?php endforeach; ?>
                        </ul>
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>