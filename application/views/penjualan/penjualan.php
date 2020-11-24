<html>
<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/cess.css') ?>">  
<?php
$this->load->view('templates/header'); 
?>
</head>
<body id="page-top">
    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <div class="card mb-3">
                <div class="card-body">
                <div class="table-responsive">

<div class="row">
	<div class="col-md-12">
		
		<center><h1 style="font-family: Rockwell Condensed;">Penjualan</h1></center>
		<a href="<?php echo base_url('penjualan/penjualan_langsung') ?>" class="btn btn-primary tombol">Penjualan Langsung</a>	
		<a href="<?php echo base_url('penjualan1/penjualan_servis') ?>" class="btn btn-primary tombol">Penjualan Servis</a>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4"></div>
	<div class="col-md-12">
		<table border="1" cellpadding="5" style="margin-bottom: 10px;margin-top: 10px;color:black" id="example" class="table table-bordered table-hover">
			<thead>
				<tr bgcolor="#CCC" align="center">
					<td><b>No.</b></td>
					<td width="15%"><b>Kode</b></td>
					<td width="15%"><b>Tanggal</b></td>
					<td><b>Customer</b></td>
					<td><b>No. Manual</b></td>
					<td><b>Total Nilai</b></td>
					<td><b>Staff</b></td>
					<td><b>Tipe Kendaraan</b></td>
					<td><b>No Rangka</b></td>
					<td><b>No Mesin</b></td>
					<td><b>No Polisi</b></td>
					<td><b>BPKB</b></td>
					<td><b>STNK</b></td>
					<td><b>Keluhan</b></td>
					<td><b>Jenis Penjualan</b></td>
					<td width="8%"><b>Pilihan</b></td>
				</tr>
			</thead>
			<tbody>
				<?php 
					if( ! empty($model['penjualan'])){
					$no = $this->uri->segment('3') + 1;
					foreach ($model['penjualan'] as $row) {
						 $tgl = date('d-m-Y', strtotime($row->tanggal));
				?>
				<tr>
					<td align="center"><?php echo $no++; ?>.</td>
					<td align="center"><?php echo $row->id; ?></td>
					 <?php echo "<td>".$tgl."</td>";?>
					<td align="center"><?php echo $row->nama; ?></td>
					<td align="center"><?php echo $row->nomanual; ?></td>
					<td>Rp. <?php echo number_format($row->nilai,2,",","."); ?></td>
					<td align="center"><?php echo $row->staff; ?></td>
					<td align="center"><?php echo $row->tipekendaraan; ?></td>
					<td align="center"><?php echo $row->norangka; ?></td>
					<td align="center"><?php echo $row->nomesin; ?></td>
					<td align="center"><?php echo $row->nopol; ?></td>
					<td align="center"><?php echo $row->bpkb; ?></td>
					<td align="center"><?php echo $row->stnk; ?></td>
					<td align="center"><?php echo $row->keluhan; ?></td>
					<td align="center"><?php echo $row->jenis; ?></td>
					<td align="center">
						<a href="<?php echo base_url('penjualan/hapus/')."$row->id" ?>" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm('Anda yakin ingin menghapus data ?')" style="font-size: 13px">hapus</a>
					</td>
				</tr>
				<?php }}else{ // Jika data tidak ada
					echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
				} ?>
			</tbody>
		</table>
				<?php
					echo $model['pagination'];
				?>
	</div>
</div></div></div></div>
</div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>
</body>
</html>