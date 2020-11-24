<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("cust_model");
        $this->load->model('m_kat');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $data["customer"] = $this->cust_model->getAll();
        $data['kategori'] = $this->m_kat->view();
        $this->load->view("admin/master/customer/tampil", $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $customer = $this->cust_model;
        $validation = $this->form_validation;
        $validation->set_rules($customer->rules());

        if ($validation->run()) {
            $customer->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header');
        $this->load->view("admin/master/customer/tambah");
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/master/customer/tampil');
       
        $customer = $this->cust_model;
        $validation = $this->form_validation;
        $validation->set_rules($customer->rules());

        if ($validation->run()) {
            $customer->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["customer"] = $customer->getById($id);
        if (!$data["customer"]) show_404();
        $this->load->view('templates/header');
        $this->load->view("admin/master/customer/edit", $data);
        $this->load->view('templates/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->cust_model->delete($id)) {
            redirect(site_url('customer'));
        }
    }
}