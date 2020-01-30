<div class="pcoded-main-container">
    <div class="pcoded-content">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 5px;">
                        <h4>Tambah Aspirasi</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                        	<div class="form-group">
							    <label for="tanggal">Tanggal</label>
							    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>">
							</div>
                        	<div class="form-group">
							    <label for="jenis">Jenis</label>
							    <select class="form-control selectpicker" data-live-search="true" id="jenis" name="jenis" required>
                                    <option></option>
                                    <?php foreach ($jenis as $j): ?>
                                    <option value="<?= $j['id'] ?>"><?= $j['jenis'] ?></option>
                                    <?php endforeach; ?>
                                </select>
							</div>
							<div class="form-group">
							    <label for="ormawa">Ormawa</label>
							    <select class="form-control selectpicker" data-live-search="true" id="ormawa" name="ormawa" required>
                                    <option></option>
                                    <?php foreach ($ormawa as $o): ?>
                                    <option value="<?= $o['id'] ?>"><?= $o['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
							</div>
							<div class="form-group">
							    <label for="isi">Isi</label>
							    <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
							</div>
							<button type="submit" name="submit" class="btn btn-primary">Submit</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>