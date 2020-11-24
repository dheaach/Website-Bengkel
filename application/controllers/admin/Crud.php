<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

    public function _construct()
    {
        
    }

    public function index()
    {
        $data['content'] = $this->db->query("SELECT * FROM penjualan WHERE jenis='langsung' ");

        $this->load->view('crud/langsung', $data);
    }

    public function read()
    {
        $data['content']=$this->db->query("SELECT * FROM pembelian ");

        $this->load->view('crud/cetak',$data);
    }

    public function baca()
    {
        $data['content']=$this->db->query("SELECT * FROM penjualan WHERE jenis='langsung' ");

        $this->load->view('crud/penjualan',$data);
    }
}
?>