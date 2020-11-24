<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_awal extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kat');
        $this->load->model("penjualan_model");
        $this->load->model("model");
        $this->load->model("SiswaModel");
        $this->load->library('session');
        $this->load->helper('url');
    }

	public function index()
	{
        redirect('penjualan_awal/pembelian');
	}

	public function tambah_penjualan()
	{
        $this->load->view('templates/header'); 
        $this->load->view('config/header'); 
        $data['kategori'] = $this->m_kat->view();
		$this->load->view('admin/jual/pembelian',$data);
        $this->load->view('templates/footer');
	}

    public function tambah_pembelian()
    {
        $this->load->view('templates/header'); 
        $this->load->view('config/header'); 
        $data['kategori'] = $this->m_kat->view();
        $this->load->view('admin/jual/pembelian1',$data);
        $this->load->view('templates/footer');
    }

    public function cek_barang()
    {
        $kode_barang = $this->input->post('kode_barang');
        $cek = $this->db->query("SELECT * FROM barang WHERE id ='$kode_barang'")->row();
        
            $data = array(
                'stok' => $cek->stok,
                'harga' => $cek->harga,
                'id' => $cek->id,
                'nama' => $cek->nama,
            );
            echo json_encode($data);
    }

    public function cek_sup()
    {
        $kode_barang = $this->input->post('id_supplier');
        $cek = $this->db->query("SELECT * FROM suplier WHERE id ='$kode_barang'")->row();
        $data = array(
            'nama' => $cek->nama,
        );
        echo json_encode($data);
    }
    
    public function simpan_penjualan()
    {
        $kode_penjualan = $this->input->post('kode_penjualan');
        $total_harga = $this->input->post('total_harga');

        $data = array(
            'nilai'=> $total_harga,
        );

        $where = array('id' => $kode_penjualan);
        $update = $this->penjualan_model->update('pembelian',$data,$where); 

        foreach ($this->cart->contents() as $items) {
            $kode_barang = $items['id'];
            $qty = $items['qty'];
            $harga = $items['price'];
            $subtotal = $items['subtotal'];
            $d = array(
                'detil' => '',
                'idbeli' => $kode_penjualan,
                'idbarang' => $kode_barang,
                'hargad' => $harga,
                'qty' => $qty,
                'nilai' => $subtotal
            );
            $this->db->insert('detilbeli', $d);

        }

        
        $this->cart->destroy();
        redirect('penjualan_awal/index');
    }
    public function nyimpen()
    {
        $kode_penjualan = $this->input->post('kode_penjualan');
        $total_harga = $this->input->post('total_harga');
        $tgl_penjualan = $this->input->post('tgl_penjualan');
        $keterangan = $this->input->post('ket');
        $faktur = $this->input->post('faktur');
        $suplier = $this->input->post('id_supplier');
        $name = $this->input->post('name');

        $data = array(
            //'nama_pelanggan' => $pelanggan,
            'id'=> $kode_penjualan,
            'tanggal'=> $tgl_penjualan,
            'keterangan' => $keterangan,
            'faktur' => $faktur,
            'nilai'=> '0',
            'suplier' => $suplier,
            'staff' => 'kas01'
        );

        $this->db->insert('pembelian', $data);
        $this->session->set_userdata($data);
        $this->session->set_userdata('name', $name);

        $this->load->view('templates/header'); 
        $this->load->view('config/header'); 
        $data['kategori'] = $this->m_kat->view();
        $this->load->view('admin/jual/pembelian1');
        $this->load->view('templates/footer');
    }

    public function simpan_cart()
    {
        
        $data = array(
            'id'    => $this->input->post('kode_barang'),
            'qty'   => $this->input->post('jumlah'),
            'price' => $this->input->post('harga'),
            'name'  => $this->input->post('nabar'),
        );
        $this->cart->insert($data);
        $this->load->view('templates/header'); 
        redirect('penjualan_awal/tambah_penjualan');
        $this->load->view('templates/footer');
    }

    public function simpen_cart()
    {
        
        $data = array(
            'id'    => $this->input->post('kode_barang'),
            'qty'   => $this->input->post('jumlah'),
            'price' => $this->input->post('harga'),
            'name'  => $this->input->post('nabar'),
        );
        $this->cart->insert($data);
        $this->load->view('templates/header'); 
        redirect('penjualan_awal/tambah_pembelian');
        $this->load->view('templates/footer');
    }
    
    public function pembelian()
    {
        $this->load->view('templates/header'); 
        $data['kategori'] = $this->m_kat->view();
        $data['model'] = $this->SiswaModel->view2();
        $this->load->view('admin/jual/penjualan_a',$data);
        $this->load->view('templates/footer');
    } 

    public function hapus_cart($id)
    {
        
        $data = array(
            'rowid'    => $id,
            'qty'   => 0,
        );
        $this->cart->update($data); 
        redirect('penjualan_awal/tambah_pembelian');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $hapus = $this->model->delete('pembelian',$where);
        if ($hapus >= 1) {
                redirect('penjualan_awal/pembelian');   
        }
    }

/*	public function tambah()
	{
		if (isset($_POST['tambah'])) {
		
    	$id = $_POST['no'];
    	$tgl = $_POST['tgl'];
    	$sup = $_POST['id_supplier'];
    	$ket = $_POST['ket'];
    	$faktur = $_POST['faktur'];
    	$mlebu = array(
    		'id' => $id,
    		'tanggal' => $tgl,
    		'keterangan' => $ket,
    		'faktur' => $faktur,
    		'suplier' => $sup,
    		'staff' => "kas01"
		);
    	$cik = $this->db->insert('pembelian',$mlebu);
    		if($cik >= 1){
            	$ambil['ambil'] = $this->db->get_where('pembelian join suplier on suplier.id = pembelian.suplier',['id'=>$id])->row();
            	$this->load->view('form_beli2',$ambil);
            }
    		else{
    			redirect('welcome');
    		}
		}
	}
*/
}
