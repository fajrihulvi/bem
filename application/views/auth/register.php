<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
  <div class="auth-content">
    <div class="card">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="card-body">
            <h4 class="mb-3 f-w-400 text-center">Sign up</h4>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('auth/registration') ?>" method="post">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="feather icon-user"></i></span>
              </div>
              <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
            </div>
            <div class="input-group mt-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="feather icon-user"></i></span>
              </div>
              <input type="text" name="nim" class="form-control" placeholder="NIM" value="<?= set_value('nim'); ?>">
            </div>
            <?= form_error('nim', '<small class="text-danger mt-0">', '</small>'); ?>
            <div class="input-group mt-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="feather icon-mail"></i></span>
              </div>
              <input type="email" name="email" class="form-control" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
            </div>
            <?= form_error('email', '<small class="text-danger mt-0">', '</small>'); ?>
            <div class="input-group mt-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="feather icon-phone"></i></span>
              </div>
              <input type="number" name="no_telp" class="form-control" placeholder="Nomor Telepon" value="<?= set_value('no_telp'); ?>">
            </div>
            <?= form_error('no_telp', '<small class="text-danger mt-0">', '</small>'); ?>
            <div class="input-group mt-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="feather icon-lock"></i></span>
              </div>
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <?= form_error('password', '<small class="text-danger mt-0">', '</small>'); ?>
            <div class="input-group mt-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="feather icon-lock"></i></span>
              </div>
              <input type="password" name="konfir-password" class="form-control" placeholder="Konfirmasi Password">
            </div>
            <?= form_error('konfir-password', '<small class="text-danger mt-0">', '</small>'); ?>
            <button class="btn btn-primary btn-block mb-4 mt-3" type="submit">Sign up</button>
            </form>
            <p class="mb-2 text-center">Already have an account? <a href="<?= base_url('auth') ?>" class="f-w-400">Signin</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- [ auth-signup ] end -->