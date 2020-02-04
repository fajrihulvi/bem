<?php 
class Informasi_model extends CI_model{

	public function getData($limit, $start)
	{
		$query = $this->db->order_by('id', 'DESC')->get('informasi', $limit, $start)->result_array();
        return $query;
	}

}