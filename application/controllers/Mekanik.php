<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mekanik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mek_model");
        $this->load->model('m_kat');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $data["mekanik"] = $this->mek_model->getAll();
        $data['kategori'] = $this->m_kat->view();
        $this->load->view("admin/master/mekanik/tampil", $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $mekanik = $this->mek_model;
        $validation = $this->form_validation;
        $validation->set_rules($mekanik->rules());

        if ($validation->run()) {
            $mekanik->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header');
        $this->load->view("admin/master/mekanik/tambah");
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/master/mekanik/tampil');
       
        $mekanik = $this->mek_model;
        $validation = $this->form_validation;
        $validation->set_rules($mekanik->rules());

        if ($validation->run()) {
            $mekanik->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["mekanik"] = $mekanik->getById($id);
        if (!$data["mekanik"]) show_404();
        $this->load->view('templates/header');
        $this->load->view("admin/master/mekanik/edit", $data);
        $this->load->view('templates/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->mek_model->delete($id)) {
            redirect(site_url('mekanik'));
        }
    }
}