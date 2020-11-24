<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Penjualan_model extends CI_Model {
	public function delete($tablename,$where)
	{
		$hapus = $this->db->delete($tablename,$where);
		return $hapus;
	}

	public function update($tablename,$data,$where)
	{
		$update = $this->db->update($tablename,$data,$where);
		return $update;
	}
}

?>