<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kat_brg extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kat_model");
        $this->load->model("model");
        $this->load->model('m_kat');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->load->view('templates/header');
        $data['kategori'] = $this->m_kat->view();
        $product = $this->m_kat;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        $data["product"] = $product->tampil($id);

        $this->load->view("admin/master/kat/tampil", $data);
        $this->load->view('templates/footer');
    }

    public function barang($id = null)
    {

        if (!isset($id)) redirect($_SERVER['HTTP_REFERER']);
        $data['kategori'] = $this->m_kat->view();
        $product = $this->m_kat;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        
        $data["product"] = $product->tampil($id);
        if (!$data["product"]) redirect('kat_brg/empty');
        $this->load->view('templates/header');
        $this->load->view("admin/master/kat/tampil", $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id,$kategori)
    {
        $where = array('id' => $id);
        $hapus = $this->model->delete('barang',$where);
        if ($hapus >= 1) {
                $product = $this->m_kat;
                $data["product"] = $product->tampil($kategori);
                $data['kategori'] = $this->m_kat->view();
                $this->load->view('templates/header');
                $this->load->view("admin/master/kat/tampil", $data);
                $this->load->view('templates/footer');   
        }
    }
    public function empty()
    {

        $this->load->view('templates/header');
        $data['kategori'] = $this->m_kat->view();
        $product = $this->m_kat;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        $this->load->view("admin/master/kat/empty", $data);
        $this->load->view('templates/footer');
    }   

}