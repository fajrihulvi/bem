<?php 
class Model_app extends CI_model{
    public function view($table){
        return $this->db->get($table);
    }

    public function search_nama($nama){
        $this->db->like('nama', $nama , 'both');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('siswa')->result();
    }

    public function view_group($table, $field){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->group_by($field);
        return $this->db->get()->result_array();
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }
 
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
    
    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_join_one($table1,$table2,$field,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_two($table1,$table2,$table3,$field,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->join($table3, $table1.'.'.$field.'='.$table3.'.'.$field);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function join_between_date($awal, $akhir)
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('tagihan_siswa', 'pembayaran.id_tagihan_siswa = tagihan_siswa.id_tagihan_siswa');
        $this->db->join('tagihan', 'tagihan_siswa.id_tagihan=tagihan.id_tagihan');
        $this->db->join('siswa', 'tagihan_siswa.nis=tagihan_siswa.nis');
        $this->db->where('pembayaran.tgl_bayar >=', $awal);
        $this->db->where('pembayaran.tgl_bayar <=', $akhir);
        return $this->db->get()->result_array();
    }

    public function join_three($table1,$table2,$table3,$table4,$field,$field2,$field3,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->join($table3, $table2.'.'.$field2.'='.$table3.'.'.$field2);
        $this->db->join($table4, $table2.'.'.$field3.'='.$table4.'.'.$field3);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function join_three_where($table1,$table2,$table3,$field,$field2,$field3,$where){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->join($table3, $table1.'.'.$field3.'='.$table3.'.'.$field3);
        $this->db->where($where);
        return $this->db->get()->row();
    }

    function umenu_akses($link,$id){
        return $this->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    }

    public function cek_login($username,$password,$table){
        return $this->db->query("SELECT * FROM $table where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");
    }

    function tampil_data($vtanggal){
        $vbulan = date("m",strtotime($vtanggal)); 
        $this->db->select('*');
        $this->db->from('keuangan');
        $this->db->where('month(tgl)',$vbulan);
        $this->db->where('year(tgl)',$vtanggal);
        $this->db->where('status', 'masuk');
        $query = $this->db->get();
        return $query;
    }

    function tampil_data1($vtanggal){
        $vbulan = date("m",strtotime($vtanggal)); 
        $this->db->select('*');
        $this->db->from('keuangan');
        $this->db->where('month(tgl)',$vbulan);
        $this->db->where('year(tgl)',$vtanggal);
        $this->db->where('status', 'keluar');
        $query = $this->db->get();
        return $query;
    }
}