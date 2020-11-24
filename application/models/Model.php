<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Model extends CI_Model {
	public function delete($tablename,$where)
	{
		$hapus = $this->db->delete($tablename,$where);
		return $hapus;
	}
}

?>