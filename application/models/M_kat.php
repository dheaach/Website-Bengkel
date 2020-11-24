<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kat extends CI_Model
{
	private $_table = "barang";
	public $id;
	public $nama;
	public $satuan;
	public $jenis;
	public $harga;
	public $stok;
	public $kategori;

	public function rules()
	{
		return [
			['field' => 'id',
			'label' => 'Id',
			'rules' => 'required'],

			['field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'satuan',
			'label' => 'Satuan',
			'rules' => 'required'],

			['field' => 'jenis',
			'label' => 'Jenis',
			'rules' => 'required'],

			['field' => 'harga',
			'label' => 'Harga',
			'rules' => 'required'],

			['field' => 'stok',
			'label' => 'Stok',
			'rules' => 'required'],

			['field' => 'kategori',
			'label' => 'Kategori',
			'rules' => 'required']
		];
	}

	public function view()
	{
		return $this->db->get('kategori')->result();
	}
	public function tampil($kategori)
	{
		//return $this->db->get_where($this->_table,array('kategori' => $id));
		$query=$this->db->query("SELECT * FROM barang WHERE kategori = $kategori");
        return $query->result();
	}
	public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}