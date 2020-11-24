<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model2 extends CI_Model
{
    private $_table = "penjualan";

    public $id;
    public $tanggal;
    public $idcust;
    public $nomanual;
    public $keterangan;
    public $nilai;
    public $staff;
    public $tipekendaraan;
    public $norangka;
    public $nomesin;
    public $nopol;
    public $bpkb;
    public $stnk;
    public $keluhan;
    public $jenis;
    public function rules()
    {
        return [
            ['field' => 'id',
            'label' => 'ID'],

            ['field' => 'tanggal',
            'label' => 'Tanggal'],
          
            ['field' => 'idcust',
            'label' => 'ID Customer'],

            ['field' => 'nomanual',
            'label' => 'No Manual'],

            ['field' => 'keterangan',
            'label' => 'Keterangan'],

            ['field' => 'nilai',
            'label' => 'Nilai'],

            ['field' => 'staff',
            'label' => 'Staff'],

            ['field' => 'tipekendaraan',
            'label' => 'Tipe Kendaraan'],

            ['field' => 'norangka',
            'label' => 'No Rangka'],

            ['field' => 'nomesin',
            'label' => 'No Mesin'],

            ['field' => 'nopol',
            'label' => 'Nopol'],

            ['field' => 'bpkb',
            'label' => 'BPKB'],

            ['field' => 'stnk',
            'label' => 'STNK'],

            ['field' => 'keluhan',
            'label' => 'Keluhan'],

            ['field' => 'jenis',
            'label' => 'Jenis']
          
        ];
    }
    public function getAll()
    {
        return $this->db->query("SELECT * from penjualan where jenis='langsung' ")->result();
    }
}