<div class="pcoded-main-container">
    <div class="pcoded-content">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 5px;">
                        <h4>Data Jenis Aspirasi</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#jenis_aspirasiModal" id="jenisAspirasiAdd"><i class="fas fa-plus"></i> Tambah jenis Aspirasi</button>
                        <table id="dataTable" class="table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Aspirasi</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($record as $j): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $j['jenis']?></td>
                                        <td class="text-center">
                                            <button id="editJenisAspirasi" data-id="<?= $j['id'] ?>" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Edit Data" data-toggle="modal" data-target="#jenis_aspirasiModal">
                                                <i class="fas fa-pen"></i></button>
                                            <?php if ($this->session->userdata('hak_akses') == 'admin'): ?>
                                            <a href="<?= base_url('jenis_aspirasi/hapus/').$j['id'] ?>" class="btn btn-danger btn-sm hapus" data-tooltip="tooltip" data-placement="top" title="Hapus Data">
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
<div class="modal fade" id="jenis_aspirasiModal" tabindex="-1" role="dialog" aria-labelledby="jenis_aspirasiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="jenis_aspirasiModalLabel">Tambah Jenis Aspirasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('jenis_aspirasi/tambah') ?>" method="post">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="jenis">Jenis Aspirasi</label>
                <input type="text" class="form-control" id="jenis" name="jenis">
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