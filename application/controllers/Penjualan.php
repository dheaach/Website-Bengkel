<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("model");
        $this->load->model('m_kat');
        $this->load->model('SiswaModel');
        $this->load->model("penjualan_model");
        $this->load->library('session');
        $this->load->helper('url');
    }
    public function index(){
        redirect("penjualan/lists"); // Untuk redirect ke function lists
    }
    
    public function lists(){
        $data['model'] = $this->SiswaModel->view();
        $data['kategori'] = $this->m_kat->view();
         // Panggil fungsi view() yang ada di model siswa
        $this->load->view('templates/header');
        $this->load->view('penjualan/penjualan',$data);
        $this->load->view('templates/footer');
    }

    public function penjualan_langsung()
    {
        $this->load->view('templates/header'); 
        $data['kategori'] = $this->m_kat->view();
        $data['model'] = $this->SiswaModel->view1();
        $this->load->view('penjualan/tampilan_lgsg',$data);
        $this->load->view('templates/footer');
    }

    public function penjualan_servis()
    {
        $data['model'] = $this->SiswaModel->view3();
        $data['kategori'] = $this->m_kat->view();
        $this->load->view('templates/header');
        $this->load->view('penjualan/tampilan_servis',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_penjualan()
    {
        $this->load->view('templates/header');
        $this->load->view('config/header'); 
        $data['kategori'] = $this->m_kat->view();
        $this->load->view('penjualan/penjualan_lgsg',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_penjualan1()
    {
        $this->load->view('templates/header');
        $this->load->view('config/header'); 
        $data['kategori'] = $this->m_kat->view();
        $this->load->view('penjualan/penjualan_lgsg1',$data);
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
        $kode_customer = $this->input->post('id_customer');
        $cek = $this->db->query("SELECT * FROM customer WHERE id ='$kode_customer'")->row();
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
        }

        
        $this->cart->destroy();
        redirect('penjualan/penjualan_langsung');
    }

    public function nyimpen()
    {
            $kode_penjualan = $this->input->post('kode_penjualan');
            $total_harga = $this->input->post('total_harga');
            $tgl_penjualan = $this->input->post('tgl_penjualan');
            $keterangan = $this->input->post('ket');
            $manual = $this->input->post('manual');
            $customer = $this->input->post('id_customer');
            $name = $this->input->post('name');

            $data = array(
            //'nama_pelanggan' => $pelanggan,
            'id'=> $kode_penjualan,
            'tanggal'=> $tgl_penjualan,
            'idcust' => $customer,
            'nomanual' => $manual,
            'keterangan' => $keterangan,
            'nilai' => '0',
            'staff' => 'kas01',
            'tipekendaraan' => '',
            'norangka' => '',
            'nomesin' => '',
            'nopol' => '',
            'bpkb' => '',
            'stnk' => '',
            'keluhan' => '',
            'jenis' => 'langsung'

            );
            
            $this->db->insert('penjualan', $data);
            $this->session->set_userdata($data);
            $this->session->set_userdata('name', $name); 

            $this->load->view('templates/header'); 
            $this->load->view('config/header'); 
            $data['kategori'] = $this->m_kat->view();
            $this->load->view('penjualan/penjualan_lgsg1');
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
        redirect('penjualan/tambah_penjualan1');
        }
        else{ ?>
                <script type='text/javascript'>
                    alert('Stok barang tidak cukup!');
            <?php
                    $this->load->view('templates/header');
                    $this->load->view('penjualan/penjualan_lgsg1');
                    $this->load->view('templates/footer');
            ?> 
                </script>
            <?php
        }
    }
    
    public function penjualan()
    {
        $this->load->view('templates/header');
        $this->load->view('penjualan/tampilan_lgsg');
        $this->load->view('templates/footer');
    } 

    public function hapus_cart($id)
    {
        
        $data = array(
            'rowid'    => $id,
            'qty'   => 0,
        );
        $this->cart->update($data);
        $this->load->view('templates/header');
        redirect('penjualan/tambah_penjualan');
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $hapus = $this->model->delete('penjualan',$where);
        if ($hapus >= 1) {
                redirect('penjualan/index');   
        }
    }

    public function hapus_lgsg($id)
    {
        $where = array('id' => $id);
        $hapus = $this->model->delete('penjualan',$where);
        if ($hapus >= 1) {
                redirect('penjualan/penjualan_langsung');
        }
    }

    public function hapus_servis($id)
    {
        $where = array('id' => $id);
        $hapus = $this->model->delete('penjualan',$where);
        if ($hapus >= 1) {
                redirect('penjualan/penjualan_servis'); 
        }
    }

/*  public function tambah()
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
