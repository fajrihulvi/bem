$(document).ready(function() {

   $('.dataTable').DataTable();
   $('#dataTable').DataTable();

   $('.datepicker').datepicker({
        todayHighlight: true
    });

   $(function () {
      $('[data-tooltip="tooltip"]').tooltip()
   })

   $('.selectpicker').selectpicker();

   $('.hapus').on('click', function (e) {
      e.preventDefault(); //cancel default action

      //Recuperate href value
      var href = $(this).attr('href');
      var message = $(this).data('confirm');

      //pop up
      swal({
         title: "Apakah Anda Yakin ??",
         text: message,
         icon: "warning",
         buttons: true,
         dangerMode: true,
      })
      .then((willDelete) => {
         if (willDelete) {
            window.location.href = href;
         } else {
            swal("Data Batal dihapus!");
         }
      });
   });

   //ormawa
   $('#ormawaAdd').on('click', function () {
        console.log(id);
        $('.modal-body form').attr('action', base_url+'ormawa/tambah');
        $('.modal-header h5').html('Tambah Ormawa');
        $('#nama_ormawa').val('');
    });

    $('#dataTable').on('click', '#editOrmawa',function () {
        var id = $(this).data('id');
        $('.modal-body form').attr('action', base_url+'ormawa/edit/'+id);
        $('.modal-header h5').html('Ubah Data Ormawa');
        $.ajax({
            url: base_url+'ormawa/tampilubah',
            data: { id: id },
            dataType: 'json',
            method: 'post',
            success: function (data) {
                $('#id').val(data.id);
                $('#nama_ormawa').val(data.nama);
            }
        });
    });

    //barang
    $('#barangAdd').on('click', function () {
        $('.modal-body form').attr('action', base_url+'barang/tambah');
        $('.modal-header h5').html('Tambah Data Barang');
        $('#kode_barang').val('');
        $('#kode_barang').attr('readonly', false);
        $('#nama_barang').val('');
        $('#satuan').val('');
        $('#stok').val('');
    });

    $('#dataTable').on('click', '#editBarang',function () {
        var id = $(this).data('id');
        $('.modal-body form').attr('action', base_url+'barang/edit/'+id);
        $('.modal-header h5').html('Ubah Data Barang');
        $.ajax({
            url: base_url+'barang/tampilubah',
            data: { id: id },
            dataType: 'json',
            method: 'post',
            success: function (data) {
                $('#kode_barang').val(data.kode_barang);
                $('#kode_barang').attr('readonly', true);
                $('#nama_barang').val(data.nama_barang);
                $('#satuan').val(data.satuan);
                $('#stok').val(data.stok);
            }
        });
    });

    //jenis_akademik
    $('#jenisAkademikAdd').on('click', function () {
        $('.modal-body form').attr('action', base_url+'jenis_akademik/tambah');
        $('.modal-header h5').html('Tambah Data Jenis Akademik');
        $('#jenis').val('');
    });

    $('#dataTable').on('click', '#editJenisAkademik',function () {
        var id = $(this).data('id');
        $('.modal-body form').attr('action', base_url+'jenis_akademik/edit/'+id);
        $('.modal-header h5').html('Ubah Jenis Akademik');
        $.ajax({
            url: base_url+'jenis_akademik/tampilubah',
            data: { id: id },
            dataType: 'json',
            method: 'post',
            success: function (data) {

                $('#id').val(data.id);
                $('#jenis').val(data.jenis);
            }
        });
    });

    //kalender_akademik
    $('#akademikAdd').on('click', function () {
        $('.modal-body form').attr('action', base_url+'kalender_akademik/tambah');
        $('.modal-header h5').html('Tambah Data Kalender Akademik');
        $('#tgl_mulai').val('');
        $('#tgl_selesai').val('');
        $('#jenis').val('');
        $('#keterangan').val('');
        $('#tahun_ajar').val('');
    });

    $('#dataTable').on('click', '#editKalenderAkademik',function () {
        var id = $(this).data('id');
        $('.modal-body form').attr('action', base_url+'kalender_akademik/edit/'+id);
        $('.modal-header h5').html('Ubah Data Kalender Akademik');
        $.ajax({
            url: base_url+'kalender_akademik/tampilubah',
            data: { id: id },
            dataType: 'json',
            method: 'post',
            success: function (data) {
                $('#id').val(data.id);
                $('#tgl_mulai').val(data.tgl_mulai);
                $('#tgl_selesai').val(data.tgl_selesai);
                $('#jenis').val(data.jenis_id);
                $('#keterangan').val(data.keterangan);
                $('#tahun_ajar').val(data.tahun_ajar);
            }
        });
    });

    //jenis_kegiatan
    $('#jenisKegiatanAdd').on('click', function () {
        $('.modal-body form').attr('action', base_url+'jenis_kegiatan/tambah');
        $('.modal-header h5').html('Tambah Data Jenis Kegiatan');
        $('#jenis').val('');
    });

    $('#dataTable').on('click', '#editJenisKegiatan',function () {
        var id = $(this).data('id');
        $('.modal-body form').attr('action', base_url+'jenis_kegiatan/edit/'+id);
        $('.modal-header h5').html('Ubah Jenis Kegiatan');
        $.ajax({
            url: base_url+'jenis_kegiatan/tampilubah',
            data: { id: id },
            dataType: 'json',
            method: 'post',
            success: function (data) {

                $('#id').val(data.id);
                $('#jenis').val(data.jenis);
            }
        });
    });
    //kalender_kegiatan
    $('#kegiatanAdd').on('click', function () {
        $('.modal-body form').attr('action', base_url+'kalender_kegiatan/tambah');
        $('.modal-header h5').html('Tambah Data Kalender Kegiatan');
        $('#tgl_mulai').val('');
        $('#tgl_selesai').val('');
        $('#nama_kegiatan').val('');
        $('#ormawa').val('');
        $('#jenis').val('');
        $('#foto').val('');
    });

    $('#dataTable').on('click', '#editKalenderKegiatan',function () {
        var id = $(this).data('id');
        // var tes;
        $('.modal-body form').attr('action', base_url+'kalender_kegiatan/edit/'+id);
        $('.modal-header h5').html('Ubah Data Kalender Kegiatan');
        $.ajax({
            url: base_url+'kalender_kegiatan/tampilubah',
            data: { id: id },
            dataType: 'json',
            method: 'post',
            success: function (data) {
                $('#id').val(data.id);
                // console.log(data.tgl_mulai.toISOString());
                $('#tgl_mulai').val(data.tgl_mulai);
                $('#tgl_selesai').val(data.tgl_selesai);
                $('#nama_kegiatan').val(data.nama_kegiatan);
                $('#ormawa').val(data.id_ormawa);
                $('#jenis').val(data.jenis_id);
            }
        });
    });

    //kalender_kegiatan
    $('#peminjamanAdd').on('click', function () {
        $('.modal-body form').attr('action', base_url+'kalender_peminjaman/tambah');
        $('.modal-header h5').html('Tambah Data Kalender Peminjaman');
        $('#tgl_pinjam').val('');
        $('#tgl_kembali').val('');
        $('#lama_pinjam').val('');
        $('#peminjam').val('');
        $('#ormawa').val('');
        $('#barang').val('');
        $('#jumlah').val('');
        $('.status').hide();

    });

    $('#dataTable').on('click', '#editKalenderPeminjaman',function () {
        var id = $(this).data('id');
        console.log(id);
        $('.modal-body form').attr('action', base_url+'kalender_peminjaman/edit/'+id);
        $('.modal-header h5').html('Ubah Data Kalender Peminjaman');
        $.ajax({
            url: base_url+'kalender_peminjaman/tampilubah',
            data: { id: id },
            dataType: 'json',
            method: 'post',
            success: function (data) {
                console.log(data);
                $('#id').val(data.id);
                $('#tgl_pinjam').val(data.tgl_pinjam);
                $('#tgl_kembali').val(data.tgl_kembali);
                $('#lama_pinjam').val(data.lama_pinjam);
                $('#peminjam').val(data.nim);
                $('#ormawa').val(data.id_ormawa);
                $('#barang').val(data.id_barang);
                $('#jumlah').val(data.jumlah);
                $('#status').val(data.status);
                $('.satuan').html(data.satuan);
                $('.status').show();
            }
        });
    });

    $('#barang').on('click',function () {
        var id = $('#barang').val();
        console.log(id);
        $.ajax({
            url: base_url+'barang/tampilubah',
            data: { id: id },
            dataType: 'json',
            method: 'post',
            success: function (data) {
                console.log(data);
                $('.satuan').html(data.satuan);
            }
        });
    });

});