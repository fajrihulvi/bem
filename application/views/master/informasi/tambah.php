<div class="pcoded-main-container">
    <div class="pcoded-content">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 5px;">
                        <h4>Tambah Informasi</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                        	<div class="form-group">
							    <label for="tanggal">Tanggal</label>
							    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>">
							</div>
                        	<div class="form-group">
							    <label for="judul">Judul</label>
							    <input type="text" class="form-control" id="judul" name="judul" required>
							</div>
							<div class="form-group">
							    <label for="isi">Isi</label>
							    <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
							</div>
							<div class="form-group">
							    <label for="foto">Foto</label>
							    <input type="file" class="form-control-file" id="foto" name="foto" required>
							</div>
							<button type="submit" name="submit" class="btn btn-primary">Submit</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>