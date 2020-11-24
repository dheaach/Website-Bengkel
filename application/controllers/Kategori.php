<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kat_model");
        $this->load->model('m_kat');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $data["kategori"] = $this->kat_model->getAll();
        $data['kategori'] = $this->m_kat->view();
        $this->load->view("admin/master/kategori/tampil", $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $kategori = $this->kat_model;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header');
        $this->load->view("admin/master/kategori/tambah");
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/master/kategori/tampil');
       
        $kategori = $this->kat_model;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kat"] = $kategori->getById($id);
        if (!$data["kat"]) show_404();
        $data['kategori'] = $this->m_kat->view();
        $this->load->view('templates/header');
        $this->load->view("admin/master/kategori/edit", $data);
        $this->load->view('templates/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->kat_model->delete($id)) {
            redirect(site_url('kategori'));
        }
    }
}