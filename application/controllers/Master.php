<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kat');
    }
	public function index()
	{
			
			$this->load->view('templates/header');
			$data['kategori'] = $this->m_kat->view();
			$this->load->view('admin/awal',$data);
			$this->load->view('templates/footer');	
	}
}

?>