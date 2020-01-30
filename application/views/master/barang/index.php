<div class="pcoded-main-container">
    <div class="pcoded-content">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 5px;">
                        <h4>Data Barang</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#barangModal" id="barangAdd"><i class="fas fa-plus"></i> Tambah Data Barang</button>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-stripped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Stok</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($record as $barang): ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $barang['kode_barang']?></td>
                                            <td><?= $barang['nama_barang']?></td>
                                            <td><?= $barang['satuan']?></td>
                                            <td><?= $barang['stok']?></td>
                                            <td class="text-center">
                                                <button id="editBarang" data-id="<?= $barang['id'] ?>" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Edit Data" data-toggle="modal" data-target="#barangModal">
                                                    <i class="fas fa-pen"></i></button>
                                                <?php if ($this->session->userdata('hak_akses') == 'admin'): ?>
                                                <a href="<?= base_url('barang/hapus/').$barang['id'] ?>" class="btn btn-danger btn-sm hapus" data-tooltip="tooltip" data-placement="top" title="Hapus Data">
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
<div class="modal fade" id="barangModal" tabindex="-1" role="dialog" aria-labelledby="barangModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="barangModalLabel">Tambah Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('barang/tambah') ?>" method="post">
            <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang">
            </div>
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang">
            </div>
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan">
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok">
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