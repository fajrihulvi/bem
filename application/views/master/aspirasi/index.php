<div class="pcoded-main-container">
    <div class="pcoded-content">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 5px;">
                        <h4>Aspirasi</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('aspirasi/tambah') ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Aspirasi</a>
                        <a href="<?= base_url('jenis_aspirasi/index') ?>" class="btn btn-warning mb-2"></i>Jenis Aspirasi</a>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-stripped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Jenis</th>
                                        <th>Ormawa</th>
                                        <th>Isi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($record as $aspirasi): ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= date('d F Y', strtotime($aspirasi['tanggal']))?></td>
                                            <td><?= $aspirasi['jenis']?></td>
                                            <td><?= $aspirasi['nama_ormawa']?></td>
                                            <td><?= substr($aspirasi['isi'], 0, 10)?>...</td>
                                            <td class="text-center">
                                                <a href="<?= base_url('aspirasi/edit/').$aspirasi['aspirasi_id'] ?>" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Edit Data">
                                                    <i class="fas fa-pen"></i></a>
                                                <?php if ($this->session->userdata('hak_akses') == 'admin'): ?>
                                                <a href="<?= base_url('aspirasi/hapus/').$aspirasi['aspirasi_id'] ?>" class="btn btn-danger btn-sm hapus" data-tooltip="tooltip" data-placement="top" title="Hapus Data">
                                                    <i class="fas fa-trash"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>