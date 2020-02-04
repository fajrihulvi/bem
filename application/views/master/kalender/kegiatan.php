<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Kalender Kegiatan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="">Kalender</a></li>
                            <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <div class="row">
            <div class="col-md-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-body">
                        <button id="kegiatanAdd" class="btn btn-primary mb-2 mr-2"  data-toggle="modal" data-target="#kegiatanModal"><i class="fas fa-plus"></i> Tambah Data</button>
                        <a href="<?= base_url('jenis_kegiatan/index') ?>" class="btn btn-warning mb-2"></i>Data Jenis</a>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-stripped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Ormawa</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>Foto</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($record as $kalender): ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= date('d F Y', strtotime($kalender['tgl_mulai']))?></td>
                                            <td><?= date('d F Y', strtotime($kalender['tgl_selesai']))?></td>
                                            <td><?= $kalender['nama_kegiatan']?></td>
                                            <td><?= $kalender['nama_ormawa']?></td>
                                            <td><?= $kalender['jenis']?></td>
                                            <td>
                                                <a href="<?= base_url('assets/images/kegiatan/'.$kalender['foto']) ?>" target="_blank"><?= $kalender['foto'] ?></a>
                                            </td>
                                            <td class="text-center">
                                                <button id="editKalenderKegiatan" data-id="<?= $kalender['kalender_id'] ?>" data-toggle="modal" data-target="#kegiatanModal" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-pen"></i></button>
                                                <?php if ($this->session->userdata('hak_akses') == 'admin'): ?>
                                                <a href="<?= base_url('kalender_kegiatan/hapus/').$kalender['kalender_id'] ?>" class="btn btn-danger btn-sm hapus" data-tooltip="tooltip" data-placement="top" title="Hapus Data">
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

<!-- Modal -->
<div class="modal fade" id="kegiatanModal" tabindex="-1" role="dialog" aria-labelledby="kegiatanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kegiatanModalLabel">Tambah Data Kalender Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('kalender_kegiatan/tambah') ?>" method="post" enctype="multipart/form-data">
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
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
            </div>
            <div class="form-group">
                <label for="ormawa">Ormawa</label>
                <select class="form-control" id="ormawa" name="ormawa" required>
                    <option></option>
                    <?php foreach ($ormawa as $o): ?>
                    <option value="<?= $o['id'] ?>"><?= $o['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
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
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
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