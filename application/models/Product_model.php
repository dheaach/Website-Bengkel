<?php defined('BASEPATH') OR exit('No direct access allowed');
class Product_model extends CI_Model
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
        $this->satuan = $post["satuan"];
        $this->jenis = $post["jenis"];
        $this->harga = $post["harga"];
        $this->stok = $post["stok"];
        $this->kategori = $post["kategori"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->satuan = $post["satuan"];
        $this->jenis = $post["jenis"];
        $this->harga = $post["harga"];
        $this->stok = $post["stok"];
        $this->kategori = $post["kategori"];

        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function get_layanan()
	{
		$query = $this->db->query('SELECT * FROM kategori');
        return $query->result();
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
    
}
?>