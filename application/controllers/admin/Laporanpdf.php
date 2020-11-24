<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN BELI',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'ID',1,0);
        $pdf->Cell(27,6,'NAMA',1,0);
        $pdf->Cell(27,6,'ALAMAT',1,0);
        $pdf->Cell(25,6,'KOTA',1,0);
        $pdf->Cell(25,6,'KODE POS',1,0);
        $pdf->Cell(25,6,'TELEPON',1,0);
        $pdf->Cell(25,6,'FAX',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->get('suplier')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(20,6,$row->id,1,0);
            $pdf->Cell(27,6,$row->nama,1,0);
            $pdf->Cell(27,6,$row->alamat,1,0);
            $pdf->Cell(25,6,$row->kota,1,0); 
            $pdf->Cell(25,6,$row->kodepos,1,0); 
            $pdf->Cell(25,6,$row->tlp,1,0); 
            $pdf->Cell(25,6,$row->fax,1,1);

        }
        $pdf->Output();
    }

        function langsung(){
        $pdf = new FPDF('l','mm','A3');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(400,8,'LAPORAN JUAL LANGSUNG',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'ID',1,0);
        $pdf->Cell(27,6,'TANGGAL',1,0);
        $pdf->Cell(27,6,'ID CUSTOMER',1,0);
        $pdf->Cell(25,6,'NO MANUAL',1,0);
        $pdf->Cell(27,6,'KETERANGAN',1,0);
        $pdf->Cell(25,6,'NILAI',1,0);
        $pdf->Cell(25,6,'STAFF',1,0);
        $pdf->Cell(33,6,'TIPE KENDARAAN',1,0);
        $pdf->Cell(25,6,'NO RANGKA',1,0);
        $pdf->Cell(25,6,'NO MESIN',1,0);
        $pdf->Cell(25,6,'NOPOL',1,0);
        $pdf->Cell(25,6,'BPKB',1,0);
        $pdf->Cell(25,6,'STNK',1,0);
        $pdf->Cell(25,6,'KELUHAN',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->query("SELECT * from penjualan where jenis='langsung' ")->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(20,6,$row->id,1,0);
            $pdf->Cell(27,6,$row->tanggal,1,0);
            $pdf->Cell(27,6,$row->idcust,1,0);
            $pdf->Cell(25,6,$row->nomanual,1,0); 
            $pdf->Cell(27,6,$row->keterangan,1,0); 
            $pdf->Cell(25,6,$row->nilai,1,0); 
            $pdf->Cell(25,6,$row->staff,1,0);
            $pdf->Cell(33,6,$row->tipekendaraan,1,0);
            $pdf->Cell(25,6,$row->norangka,1,0); 
            $pdf->Cell(25,6,$row->nomesin,1,0); 
            $pdf->Cell(25,6,$row->nopol,1,0); 
            $pdf->Cell(25,6,$row->bpkb,1,0); 
            $pdf->Cell(25,6,$row->stnk,1,0); 
            $pdf->Cell(25,6,$row->keluhan,1,1); 
        }
        $pdf->Output();
    }
}