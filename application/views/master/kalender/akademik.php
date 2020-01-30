<div class="pcoded-main-container">
    <div class="pcoded-content">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 5px;">
                        <h4>Kalender Akademik</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <button id="akademikAdd" class="btn btn-primary mb-2 mr-2"  data-toggle="modal" data-target="#akademikModal"><i class="fas fa-plus"></i> Tambah Data</button>
                        <a href="<?= base_url('jenis_akademik/index') ?>" class="btn btn-warning mb-2"></i>Data Jenis</a>
                        <table id="dataTable" class="table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Jenis</th>
                                    <th>Keterangan</th>
                                    <th>Tahun Ajar</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($record as $kalender): ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= date('d F Y', strtotime($kalender['tgl_mulai']))?></td>
                                        <td><?= date('d F Y', strtotime($kalender['tgl_selesai']))?></td>
                                        <td><?= $kalender['jenis']?></td>
                                        <td><?= $kalender['keterangan']?></td>
                                        <td><?= $kalender['tahun_ajar']?></td>
                                        <td class="text-center">
                                            <button id="editKalenderAkademik" data-id="<?= $kalender['kalender_id'] ?>" data-toggle="modal" data-target="#akademikModal" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-pen"></i></button>
                                            <?php if ($this->session->userdata('hak_akses') == 'admin'): ?>
                                            <a href="<?= base_url('kalender_akademik/hapus/').$kalender['kalender_id'] ?>" class="btn btn-danger btn-sm hapus" data-tooltip="tooltip" data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="akademikModal" tabindex="-1" role="dialog" aria-labelledby="akademikModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="akademikModalLabel">Tambah Data Kalender Akademik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('kalender_akademik/tambah') ?>" method="post">
            <label for="tgl_mulai">Tanggal Mulai</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control datepicker" id="tgl_mulai" name="tgl_mulai">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
            </div>
            <label for="tgl_selesai">Tanggal Selesai</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control datepicker" id="tgl_selesai" name="tgl_selesai">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select class="form-control" id="jenis" name="jenis" required>
                    <option></option>
                    <?php foreach ($jenis as $j): ?>
                    <option value="<?= $j['id'] ?>"><?= $j['jenis'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>
            <div class="form-group">
                <label for="tahun_ajar">Tahun Ajaran</label>
                <input type="text" class="form-control" id="tahun_ajar" name="tahun_ajar">
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