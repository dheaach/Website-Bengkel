<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PembelianModel extends CI_Model {
	public function view_by_date($date){
        $this->db->where('DATE(tanggal)', $date); // Tambahkan where tanggal nya
        
		return $this->db->get('pembelian')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
	}
    
	public function view_by_month($month, $year){
        $this->db->where('MONTH(tanggal)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun
        
		return $this->db->get('pembelian')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
	}
    
	public function view_by_year($year){
        $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun
        
		return $this->db->get('pembelian')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
	}
    
	public function view_all(){
		return $this->db->get("pembelian")->result(); // Tampilkan semua data transaksi
	}
    
    public function option_tahun(){
        $this->db->select('YEAR(tanggal) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('pembelian'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tanggal)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
    public function search($keyword)
    {
    	$this->db->like('staff',$keyword);
    	$this->db->or_like('tanggal',$keyword);
        $query  =   $this->db->get('pembelian');
        return $query->result();
    }
}
