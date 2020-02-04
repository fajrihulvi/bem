<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Kalender Peminjaman</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="">Kalender</a></li>
                            <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
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
                        <button id="peminjamanAdd" class="btn rounded btn-primary mb-2 mr-2"  data-toggle="modal" data-target="#peminjamanModal"><i class="fas fa-plus"></i> Tambah Data</button>
                        <a href="<?= base_url('permintaan_pinjam') ?>" class="btn rounded btn-success mb-2">Permintaan Pinjam <span class="badge badge-danger"><?= ($pinjam != 0 )?$pinjam:'' ?></span></a>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-stripped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Lama Pinjam</th>
                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                        <th>Peminjam</th>
                                        <th>Ormawa</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($record as $kalender): ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= date('d F Y', strtotime($kalender['tgl_pinjam']))?></td>
                                            <td><?= ($kalender['tgl_kembali'] != '')?date('d F Y', strtotime($kalender['tgl_kembali'])): ''?></td>
                                            <td><?= $kalender['lama_pinjam']?> Hari</td>
                                            <td><?= $kalender['nama_barang']?></td>
                                            <td><?= $kalender['jumlah'].' '.$kalender['satuan']?></td>
                                            <td><?= $kalender['peminjam']?></td>
                                            <td><?= $kalender['nama']?></td>
                                            <td><?= ($kalender['status']=='0')?'belum dikembalikan':'dikembalikan'?></td>
                                            <td class="text-center">
                                                <button id="editKalenderPeminjaman" data-id="<?= $kalender['kalender_id'] ?>" data-toggle="modal" data-target="#peminjamanModal" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Edit Data">
                                                    <i class="fas fa-pen"></i></button>
                                                <?php if ($this->session->userdata('hak_akses') == 'admin'): ?>
                                                <a href="<?= base_url('kalender_peminjaman/hapus/').$kalender['kalender_id'] ?>" class="btn btn-danger btn-sm hapus" data-tooltip="tooltip" data-placement="top" title="Hapus Data">
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
<div class="modal fade" id="peminjamanModal" tabindex="-1" role="dialog" aria-labelledby="peminjamanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="peminjamanModalLabel">Tambah Data Kalender Peminjaman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('kalender_peminjaman/tambah') ?>" method="post">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control datepicker" id="tgl_pinjam" name="tgl_pinjam">
              <div class="input-group-append">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
            </div>
            <label for="lama_pinjam">Lama Pinjam</label>
            <div class="input-group mb-3">
               <input type="text" class="form-control" id="lama_pinjam" name="lama_pinjam">
              <div class="input-group-append">
                <span class="input-group-text">Hari</span>
              </div>
            </div>
            <div class="form-group">
                <div class="form-group">
	                <label for="peminjam">Nama Peminjam</label>
	                <select class="form-control" id="peminjam" name="peminjam" required>
	                    <option></option>
	                    <?php foreach ($users as $u): ?>
	                    <option value="<?= $u['nim'] ?>"><?= $u['nama'] ?></option>
	                    <?php endforeach; ?>
	                </select>
	            </div>
            </div>
            <div class="form-group">
                <label for="barang">Barang</label>
                <select class="form-control" id="barang" name="barang" required>
                    <option></option>
                    <?php foreach ($barang as $b): ?>
                    <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label for="jumlah">Jumlah</label>
            <div class="input-group mb-3">
                <input type="number" class="form-control" id="jumlah" name="jumlah">
                <div class="input-group-append">
                    <span class="input-group-text satuan"></span>
                </div>
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
            <div class="form-group status">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option></option>
                    <option value="0">Belum dikembalikan</option>
                    <option value="1">Sudah dikembalikan</option>
                </select>
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