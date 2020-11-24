<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("model2");
    }

    public function index()
	{
		$data["content"] = $this->model2->getAll();
        $this->load->view('crud/langsung', $data);
    }
}