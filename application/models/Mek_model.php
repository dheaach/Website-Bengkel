<?php defined('BASEPATH') OR exit('No direct access allowed');
class Mek_model extends CI_Model
{
	private $_table = "karyawan";
	
	public $id;
	public $nama;
	public $alamat;
	public $kota;
	public $kodepos;
	public $tlp;
	
	public function rules()
	{
		return [
			['field' => 'id',
			'label' => 'Id',
			'rules' => 'required'],

			['field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'alamat',
			'label' => 'Alamat',
			'rules' => 'required'],

			['field' => 'kota',
			'label' => 'Kota',
			'rules' => 'required'],

			['field' => 'kodepos',
			'label' => 'KodePos',
			'rules' => 'required'],

			['field' => 'tlp',
			'label' => 'Tlp',
			'rules' => 'required']
		];
	}
	
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}
	
	public function getById($id)
	{
		return $this->db->get_where($this->_table,["id" => $id])->row();
	}
	
	public function save()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->kota = $post["kota"];
        $this->kodepos = $post["kodepos"];
        $this->tlp = $post["tlp"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->kota = $post["kota"];
        $this->kodepos = $post["kodepos"];
        $this->tlp = $post["tlp"];

        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
    
}
?>