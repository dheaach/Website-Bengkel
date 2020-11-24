<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SiswaModel extends CI_Model {
	public function view(){
		$this->load->library('pagination'); // Load librari paginationnya
		
		$query = "SELECT * FROM customer INNER JOIN karyawan INNER JOIN penjualan ON penjualan.idcust = customer.id AND karyawan.id = penjualan.staff ORDER BY jenis DESC";
		
		$config['base_url'] = base_url('penjualan/lists');
		$config['total_rows'] = $this->db->query($query)->num_rows();
		$config['per_page'] = 4;
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		
		// Style Pagination
		// Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
		$config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
		
		$this->pagination->initialize($config); // Set konfigurasi paginationnya
		
		$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
		$query .= " LIMIT ".$page.", ".$config['per_page'];
		
		$data['limit'] = $config['per_page'];
		$data['total_rows'] = $config['total_rows'];
		$data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
		$data['penjualan'] = $this->db->query($query)->result();
		
		return $data;
	}

	public function view1(){
		$this->load->library('pagination'); // Load librari paginationnya
		
		$query = "SELECT * FROM customer INNER JOIN karyawan INNER JOIN penjualan ON penjualan.idcust = customer.id AND karyawan.id = penjualan.staff WHERE jenis='langsung'";
		
		$config['base_url'] = base_url('penjualan/penjualan_langsung');
		$config['total_rows'] = $this->db->query($query)->num_rows();
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		
		// Style Pagination
		// Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
		$config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
		
		$this->pagination->initialize($config); // Set konfigurasi paginationnya
		
		$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
		$query .= " LIMIT ".$page.", ".$config['per_page'];
		
		$data['limit'] = $config['per_page'];
		$data['total_rows'] = $config['total_rows'];
		$data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
		$data['penjualan'] = $this->db->query($query)->result();
		
		return $data;
	}

	public function view2(){
		$this->load->library('pagination'); // Load librari paginationnya
		
		$query = "SELECT * FROM pembelian order by id DESC";
		
		$config['base_url'] = base_url('penjualan_awal/pembelian');
		$config['total_rows'] = $this->db->query($query)->num_rows();
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		
		// Style Pagination
		// Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
		$config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
		
		$this->pagination->initialize($config); // Set konfigurasi paginationnya
		
		$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
		$query .= " LIMIT ".$page.", ".$config['per_page'];
		
		$data['limit'] = $config['per_page'];
		$data['total_rows'] = $config['total_rows'];
		$data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
		$data['pembelian'] = $this->db->query($query)->result();
		
		return $data;
	}

	public function view3(){
		$this->load->library('pagination'); // Load librari paginationnya
		
		$query = "SELECT * FROM customer INNER JOIN karyawan INNER JOIN penjualan ON penjualan.idcust = customer.id AND karyawan.id = penjualan.staff WHERE jenis = 'servis'";
		
		$config['base_url'] = base_url('penjualan1/penjualan_servis');
		$config['total_rows'] = $this->db->query($query)->num_rows();
		$config['per_page'] = 4;
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		
		// Style Pagination
		// Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
		$config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
		
		$this->pagination->initialize($config); // Set konfigurasi paginationnya
		
		$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
		$query .= " LIMIT ".$page.", ".$config['per_page'];
		
		$data['limit'] = $config['per_page'];
		$data['total_rows'] = $config['total_rows'];
		$data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
		$data['penjualan'] = $this->db->query($query)->result();
		
		return $data;
	}
}
