    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
</head>
<?php
$this->load->view('templates/header'); 
?>
<body id="page-top">
    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
            <div class="card mb-3">
                <div class="card-body">
                     <div class="table-responsive">
    <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
        </select>
        <br /><br />

        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" autocomplete="off" name="tanggal" class="input-tanggal" placeholder="Tahun-Bulan-Tanggal" />
            <br /><br />
        </div>

        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>

        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>

        <button class="btn btn-primary" type="submit">Tampilkan</button>
        <a class="btn btn-primary" href="<?php echo base_url("transaksi"); ?>">Reset Filter</a>
    </form>
    <br/>
    <form action="<?php echo site_url('view/search');?>" method = "post">
        <input type="text" name = "search" />
        <input type="submit" value = "Search" />
    </form>
    <b><?php echo $ket; ?></b><br /><br />
     <a class="btn btn-info" href="<?php echo $url_cetak; ?>"><i class="fas fa-print"></i> CETAK PDF</a><br />
    <table class="table table-hover" id="dataTable" width="50%" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>ID Customer</th>
        <th>No Manual</th>
        <th>Keterangan</th>
        <th>Nilai</th>
        <th>Staff</th>
        <th>Tipe Kendaraan</th>
        <th>No Rangka</th>
        <th>No Mesin</th>
        <th>Nopol</th>
        <th>BPKB</th>
        <th>STNK</th>
        <th>Keluhan</th>
        <th>Jenis</th>
    </tr>
     <?php
    if( ! empty($transaksi)){
        $no = 1;
        foreach($transaksi as $data){
            $tgl = date('d-m-Y', strtotime($data->tanggal));
            
            echo "<tr>";
            echo "<td>".$data->id."</td>";
            echo "<td>".$tgl."</td>";
            echo "<td>".$data->idcust."</td>";
            echo "<td>".$data->nomanual."</td>";
            echo "<td>".$data->keterangan."</td>";
            ?>
            <td>Rp. <?php echo number_format($data->nilai,2,",",".");?></td>
            <?php
            echo "<td>".$data->staff."</td>";
            echo "<td>".$data->tipekendaraan."</td>";
            echo "<td>".$data->norangka."</td>";
            echo "<td>".$data->nomesin."</td>";
            echo "<td>".$data->nopol."</td>";
            echo "<td>".$data->bpkb."</td>";
            echo "<td>".$data->stnk."</td>";
            echo "<td>".$data->keluhan."</td>";
            echo "<td>".$data->jenis."</td>";
            echo "</tr>";
            $no++;
        }
    }?>
    </table>
    <table>

    <?php
             $total=0;
                foreach ($transaksi as $key):?>
                <tr>
                    <td><?php $total+= $key->nilai ?></td>
                </tr>
                <?php endforeach ?>
    </table>
        <br><br>
        Total : Rp. <?php echo number_format($total,2,",","."); ?>
    
     </div>
                    </div>
                </div>

            </div>
            <?php $this->load->view("admin/_partials/footer.php") ?>
            </div>
        <!-- /.content-wrapper -->

    </div>
    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>
    <!-- /#wrapper -->
    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>

</body>