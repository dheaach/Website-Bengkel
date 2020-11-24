<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Total extends CI_Controller {
    
    public function jumlah_nilai(){

        $this->db->select('SUM(nilai) as total');
        $this->db->from('pembelian');
        return $this->db->get()->row()->total;

        }

}
?>