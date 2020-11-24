<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("sup_model");
        $this->load->model('m_kat');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $data["suplier"] = $this->sup_model->getAll();
        $data['kategori'] = $this->m_kat->view();
        $this->load->view("admin/master/suplier/tampil", $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $suplier = $this->sup_model;
        $validation = $this->form_validation;
        $validation->set_rules($suplier->rules());

        if ($validation->run()) {
            $suplier->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header');
        $this->load->view("admin/master/suplier/tambah");
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/master/suplier/tampil');
       
        $suplier = $this->sup_model;
        $validation = $this->form_validation;
        $validation->set_rules($suplier->rules());

        if ($validation->run()) {
            $suplier->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["suplier"] = $suplier->getById($id);
        if (!$data["suplier"]) show_404();
        $this->load->view('templates/header');
        $this->load->view("admin/master/suplier/edit", $data);
        $this->load->view('templates/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->sup_model->delete($id)) {
            redirect(site_url('suplier'));
        }
    }
}