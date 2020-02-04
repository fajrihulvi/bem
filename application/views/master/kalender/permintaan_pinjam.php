<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Permintaan Peminjaman</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('kalender_peminjaman') ?>">Kalender</a></li>
                            <li class="breadcrumb-item"><a href="#">Permintaan Peminjaman</a></li>
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
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-stripped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pinjam</th>
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
                                    <?php $i=1; foreach ($record as $row): ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= date('d F Y', strtotime($row['tgl_pinjam']))?></td>
                                            <td><?= $row['lama_pinjam']?> Hari</td>
                                            <td><?= $row['nama_barang']?></td>
                                            <td><?= $row['jumlah'].' '.$row['satuan']?></td>
                                            <td><?= $row['peminjam']?></td>
                                            <td><?= $row['nama']?></td>
                                            <td><?= $row['isAccept'] ?></td>
                                            <td class="text-center">
                                                <button <?= ($row['isAccept'] != 'pending')?'disabled':'' ?> id="terima" data-id="<?= $row['kalender_id'] ?>" class="btn btn-success btn-sm rounded" data-tooltip="tooltip" data-placement="top" title="Terima"><i class="fas fa-check"></i></button>
                                                <button <?= ($row['isAccept'] != 'pending')?'disabled':'' ?> id="tolak" data-id="<?= $row['kalender_id'] ?>" class="btn btn-danger rounded btn-sm" data-tooltip="tooltip" data-placement="top" title="Tolak"><i class="fas fa-times x5"></i></button>
                                                
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