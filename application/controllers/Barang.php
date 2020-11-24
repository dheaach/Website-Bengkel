<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("product_model");
        $this->load->model('m_kat');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $data["products"] = $this->product_model->getAll(); 
        $data['kategori'] = $this->m_kat->view();
        
        if (!$data["products"]) redirect('barang/empty');
        $this->load->view("admin/master/barang/tampil", $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['kategori'] = $this->m_kat->view();
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header'); 
        $this->load->view("admin/master/barang/tambah",$data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/master/barang/tampil');

        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        $data['kategori'] = $this->m_kat->view();
        $this->load->view('templates/header'); 
        $this->load->view("admin/master/barang/edit", $data);
        $this->load->view('templates/footer');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        
        if ($this->product_model->delete($id)) {
            redirect(site_url('barang'));
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