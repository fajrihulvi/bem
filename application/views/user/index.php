<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ form-element ] start -->
            <div class="col-sm-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-header" style="padding-bottom: 5px;">
                      <h4>Manajemen Users</h4>
                      <hr>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nim</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th>Hak Akses</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($users as $s): ?>
                                    <tr>
                                        <td class="text-center"><?= $i ?></td>
                                        <td><?= $s['nim'] ?></td>
                                        <td><?= $s['nama'] ?></td>
                                        <td><?= $s['email'] ?></td>
                                        <td><?= $s['no_telp'] ?></td>
                                        <td><?= $s['hak_akses'] ?></td>
                                        <td class="text-center">
                                            <a href="#" id="edituser" class="btn btn-sm btn-warning"  data-tooltip="tooltip" data-placement="top" title="Edit Data" data-toggle="modal" data-target="#ubahUser" data-id="<?= $s['nim'] ?>"><i class="fas fa-pen"></i></a>
                                            <a href="<?= base_url('user/hapus/').$s['nim'] ?>" class="btn btn-sm btn-danger hapus" data-tooltip="tooltip" data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>
<!-- [ Main Content ] end -->

<!-- Modal -->
<div class="modal fade" id="ubahUser" tabindex="-1" role="dialog" aria-labelledby="ubahUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahUserLabel">Ubah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user/edit') ?>" method="post">
          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" readonly>
          </div>
          <div class="form-group">
            <label for="nama">Nama Legkap</label>
            <input type="text" name="nama" class="form-control" id="nama" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="no_telp">No Telepon</label>
            <input type="number" class="form-control" id="no_telp" name="no_telp" required>
          </div>
          <div class="form-group">
            <label for="hak_akses">Hak Akses</label>
            <select class="form-control" id="hak_akses" name="hak_akses" required>
              <option></option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
              <option value="mahasiswa">Mahasiswa</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-primary btnSubmit" type="Submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>