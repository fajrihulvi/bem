<div class="pcoded-main-container">
    <div class="pcoded-content">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 5px;">
                        <h4>Informasi</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('informasi/tambah') ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Informasi</a>
                        <table id="dataTable" class="table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Foto</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($record as $informasi): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= date('d F Y', strtotime($informasi['tanggal']))?></td>
                                        <td><?= $informasi['judul']?></td>
                                        <td><?= substr($informasi['isi'], 0, 10)?>.....</td>
                                        <td>
                                        	<a href="<?= base_url('assets/images/informasi/').$informasi['foto'] ?>" target="_blank">
                                        	<?= substr($informasi['foto'], 0, 5)?></a>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('informasi/edit/').$informasi['id'] ?>" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Edit Data">
                                                <i class="fas fa-pen"></i></a>
                                            <?php if ($this->session->userdata('hak_akses') == 'admin'): ?>
                                            <a href="<?= base_url('informasi/hapus/').$informasi['id'] ?>" class="btn btn-danger btn-sm hapus" data-tooltip="tooltip" data-placement="top" title="Hapus Data">
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