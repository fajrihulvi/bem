<div class="pcoded-main-container">
    <div class="pcoded-content">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 5px;">
                        <h4>Data Ormawa</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#ormawaModal" id="ormawaAdd"><i class="fas fa-plus"></i> Tambah Ormawa</button>
                        <table id="dataTable" class="table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ormawa</th>
                                    <th class="text-center">Logo</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($record as $ormawa): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $ormawa['nama']?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('assets/images/ormawa/logo/'.$ormawa['logo']) ?>" target="_blank"><?= $ormawa['logo']?></a>
                                        </td>
                                        <td class="text-center">
                                            <button id="editOrmawa" data-id="<?= $ormawa['id'] ?>" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Edit Data" data-toggle="modal" data-target="#ormawaModal">
                                                <i class="fas fa-pen"></i></button>
                                            <?php if ($this->session->userdata('hak_akses') == 'admin'): ?>
                                            <a href="<?= base_url('ormawa/hapus/').$ormawa['id'] ?>" class="btn btn-danger btn-sm hapus" data-tooltip="tooltip" data-placement="top" title="Hapus Data">
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

<!-- Modal -->
<div class="modal fade" id="ormawaModal" tabindex="-1" role="dialog" aria-labelledby="ormawaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ormawaModalLabel">Tambah Data Ormawa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('ormawa/tambah') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_ormawa">Nama Ormawa</label>
                <input type="text" class="form-control" id="nama_ormawa" name="nama_ormawa">
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto" required>
            </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>