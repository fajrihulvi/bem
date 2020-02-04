<?php 

function template(){
    $ci = & get_instance();
    $query = $ci->db->query("SELECT folder FROM templates where aktif='Y'");
    $tmp = $query->row_array();
    if ($query->num_rows()>=1){
        return $tmp['folder'];
    }else{
        return 'errors';
    }
}
    
function waktu_lalu($timestamp)
{
    $selisih = time()-strtotime($timestamp) ;
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    return $waktu;
}

function cekTanggal($tgl_mulai, $tgl_selesai)
{
	if($tgl_selesai != ''){
		if( date('F Y', strtotime($tgl_mulai)) == date('F Y', strtotime($tgl_selesai)) ){
			return date('d', strtotime($tgl_mulai)).' s.d '.date('d F Y', strtotime($tgl_selesai));
		}else{
			return date('d F Y', strtotime($tgl_mulai)).' s.d '.date('d F Y', strtotime($tgl_selesai));
		}
	}else{
		return date('d F Y', strtotime($tgl_mulai));
	}
}

function KonDecRomawi($angka)
{
    $hsl = "";
    if ($angka < 1 || $angka > 5000) { 
        // Statement di atas buat nentuin angka ngga boleh dibawah 1 atau di atas 5000
        $hsl = "Batas Angka 1 s/d 5000";
    } else {
        while ($angka >= 1000) {
            // While itu termasuk kedalam statement perulangan
            // Jadi misal variable angka lebih dari sama dengan 1000
            // Kondisi ini akan di jalankan
            $hsl .= "M"; 
            // jadi pas di jalanin , kondisi ini akan menambahkan M ke dalam
            // Varible hsl
            $angka -= 1000;
            // Lalu setelah itu varible angka di kurangi 1000 ,
            // Kenapa di kurangi
            // Karena statment ini mengambil 1000 untuk di konversi menjadi M
        }
    }


    if ($angka >= 500) {
        // statement di atas akan bernilai true / benar
        // Jika var angka lebih dari sama dengan 500
        if ($angka > 500) {
            if ($angka >= 900) {
                $hsl .= "CM";
                $angka -= 900;
            } else {
                $hsl .= "D";
                $angka-=500;
            }
        }
    }
    while ($angka>=100) {
        if ($angka>=400) {
            $hsl .= "CD";
            $angka -= 400;
        } else {
            $angka -= 100;
        }
    }
    if ($angka>=50) {
        if ($angka>=90) {
            $hsl .= "XC";
            $angka -= 90;
        } else {
            $hsl .= "L";
            $angka-=50;
        }
    }
    while ($angka >= 10) {
        if ($angka >= 40) {
            $hsl .= "XL";
            $angka -= 40;
        } else {
            $hsl .= "X";
            $angka -= 10;
        }
    }
    if ($angka >= 5) {
        if ($angka == 9) {
            $hsl .= "IX";
            $angka-=9;
        } else {
            $hsl .= "V";
            $angka -= 5;
        }
    }
    while ($angka >= 1) {
        if ($angka == 4) {
            $hsl .= "IV"; 
            $angka -= 4;
        } else {
            $hsl .= "I";
            $angka -= 1;
        }
    }

    return ($hsl);
}