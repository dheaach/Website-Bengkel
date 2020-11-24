<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan1 extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("model");
        $this->load->model("m_kat");
        $this->load->model("SiswaModel");
        $this->load->model("penjualan_model");
        $this->load->library('session');
        $this->load->helper('url');
    }
    public function index(){
        redirect("penjualan1/penjualan_servis"); // Untuk redirect ke function lists
    }

    public function penjualan_servis()
    {
        $data['model'] = $this->SiswaModel->view3();
        $data['kategori'] = $this->m_kat->view();
        $this->load->view('templates/header');
        $this->load->view('penjualan/tampilan_servis',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_servis()
    {
        $this->load->view('templates/header');
        $this->load->view('config/header'); 
        $data['kategori'] = $this->m_kat->view();
        $this->load->view('penjualan/penjualan_servis',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_servis1()
    {
        $this->load->view('templates/header');
        $this->load->view('config/header'); 
        $data['kategori'] = $this->m_kat->view();
        $this->load->view('penjualan/penjualan_servis1',$data);
        $this->load->view('templates/footer');
    }

    public function cek_barang()
    {
        $kode_barang = $this->input->post('kode_barang');
        $cek = $this->db->query("SELECT * FROM barang WHERE id ='$kode_barang'")->row();
        if ($cek->stok == 0) {
            $data = array(
                'stok' => 'Stok habis!'
            );
            echo json_encode($data);
        }
        else{
            $data = array(
                'stok' => $cek->stok,
                'harga' => $cek->harga,
                'id' => $cek->id,
                'nama' => $cek->nama,
            );
            echo json_encode($data);
        }
    }

    public function cek_sup()
    {
        $kode_customer = $this->input->post('id_customer');
        $cek = $this->db->query("SELECT * FROM customer WHERE id ='$kode_customer'")->row();
        $data = array(
            'nama' => $cek->nama,
        );
        echo json_encode($data);
    }

     public function simpan_penjualann()
    {
        $kode_penjualan = $this->input->post('kode_penjualan');
        $total_harga = $this->input->post('total_harga');

        $data = array(
            'nilai'=> $total_harga,
        );

        $where = array('id' => $kode_penjualan);
        $update = $this->penjualan_model->update('penjualan',$data,$where); 
        
        foreach ($this->cart->contents() as $items) {
            $kode_barang = $items['id'];
            $qty = $items['qty'];
            $harga = $items['price'];
            $subtotal = $items['subtotal'];
            $d = array(
                'dj' => '',
                'idjual' => $kode_penjualan,
                'idbarang' => $kode_barang,
                'hargaj' => $harga,
                'jumlah' => $qty,
                'subtotal' => $subtotal,
                'diskon' => '0',
                'total' => $subtotal
            );
            $this->db->insert('detiljual', $d);
            //$this->db->query("UPDATE menu SET satuan=satuan-'$qty' WHERE kode_menu='$kode_barang'");
        }

        
        $this->cart->destroy();
        redirect('penjualan1/penjualan_servis');
    }

    public function nyimpen()
    {
            $kode_penjualan = $this->input->post('kode_penjualan');
            $total_harga = $this->input->post('total_harga');
            $tgl_penjualan = $this->input->post('tgl_penjualan');
            $keterangan = $this->input->post('ket');
            $manual = $this->input->post('manual');
            $customer= $this->input->post('id_customer');
            $tipe= $this->input->post('tipe');
            $rangka= $this->input->post('rangka');
            $mesin= $this->input->post('mesin');
            $nopol = $this->input->post('pol');
            $bpkb = $this->input->post('bpkb');
            $stnk = $this->input->post('stnk');
            $keluhan = $this->input->post('keluhan');
            $name= $this->input->post('name');


            $data = array(
            //'nama_pelanggan' => $pelanggan,
            'id'=> $kode_penjualan,
            'tanggal'=> $tgl_penjualan,
            'idcust' => $customer,
            'nomanual' => $manual,
            'keterangan' => $keterangan,
            'nilai' => '0',
            'staff' => 'kas01',
            'tipekendaraan' => $tipe,
            'norangka' => $rangka,
            'nomesin' => $mesin,
            'nopol' => $nopol,
            'bpkb' => $bpkb,
            'stnk' => $stnk,
            'keluhan' => $keluhan,
            'jenis' => 'servis'

            ); 
            
            $this->db->insert('penjualan', $data);
            $this->session->set_userdata($data);
            $this->session->set_userdata('name', $name); 

            $this->load->view('templates/header'); 
            $this->load->view('config/header'); 
            $data['kategori'] = $this->m_kat->view();
            $this->load->view('penjualan/penjualan_servis1');
            $this->load->view('templates/footer');
    }

    public function simpan_cart()
    {
        $kode = $this->input->post('kode_barang');
        $qty = $this->input->post('jumlah');
        $data = $this->db->query("SELECT * FROM barang WHERE id = '$kode'")->row();
        if($data->stok >= $qty){
        $data = array(
            'id'    => $this->input->post('kode_barang'),
            'qty'   => $this->input->post('jumlah'),
            'price' => $this->input->post('harga'),
            'name'  => $this->input->post('nabar'),
        );
        $this->cart->insert($data);
        redirect('penjualan1/tambah_servis1');
        }
        else{ ?>
                <script type='text/javascript'>
                    alert('Stok barang tidak cukup!');
            <?php
                    $this->load->view('templates/header');
                    $this->load->view('penjualan1/penjualan_servis');
                    $this->load->view('templates/footer');
            ?> 
                </script>
            <?php
        }
    }
    
    public function penjualan()
    {
        $this->load->view('templates/header');
        $data['kategori'] = $this->m_kat->view();
        $this->load->view('penjualan/tampilan_servis',$data);
        $this->load->view('templates/footer');
    } 

    public function hapus_cart($id)
    {
        
        $data = array(
            'rowid'    => $id,
            'qty'   => 0,
        );
        $this->cart->update($data);
        redirect('penjualan1/tambah_servis');
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
