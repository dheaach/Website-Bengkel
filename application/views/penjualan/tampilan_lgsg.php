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
		<!-- <a href="app/export_penjualan" target="_blank" class="btn btn-primary">Export</a> -->
		<center><h3 style="font-family: Rockwell Condensed;">Penjualan Langsung</h3></center>
		<a href="<?php echo base_url('penjualan/tambah_penjualan') ?>" class="btn btn-primary" style="font-size: 13px;">Tambah Penjualan</a>
		<a href="<?php echo base_url('penjualan') ?>" class="btn btn-default" style="font-size: 13px;border: 1px solid grey"><?php $this->session->sess_destroy(); ?>Close</a>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4"></div>
	<div class="col-md-12">
		<table border="1" cellpadding="5" style="margin-bottom: 10px;margin-top: 10px;color:black" id="example" class="table table-bordered table-hover">
			<thead>
				<tr bgcolor="#CCC" align="center">
					<td width="5%"><b>No.</b></td>
					<td width="10%"><b>Kode Penjualan</b></td>
					<td><b>Tanggal Penjualan</b></td>
					<td><b>Customer</b></td>
					<td><b>No. Manual</b></td>
					<td><b>Staff</b></td>
					<td><b>Total Nilai</b></td>
					<td><b>Pilihan</b></td>
				</tr>
			</thead>
			<tbody>
				<?php 
					if( ! empty($model['penjualan'])){
					$no = $this->uri->segment('3') + 1;
					foreach ($model['penjualan'] as $row) {
				?>
				<tr>
					<td align="center"><?php echo $no++; ?>.</td>
					<td align="center"><?php echo $row->id; ?></td>
					<td align="center"><?php echo $row->tanggal; ?></td>
					<td align="center"><?php echo $row->nama; ?></td>
					<td align="center"><?php echo $row->nomanual; ?></td>
					<td align="center"><?php echo $row->staff; ?></td>
					<td>Rp. <?php echo number_format($row->nilai,2,",","."); ?></td>
					<td align="center" width="8%">
						<a href="<?php echo base_url('penjualan/hapus_lgsg/')."$row->id" ?>" class="btn btn-danger btn-sm tombol-hapus">hapus</a>
					</td>
				</tr>
				<?php }}else{ // Jika data tidak ada
					echo "<tr><td colspan='8' align='center'>Data tidak ada</td></tr>";
				} ?>
			</tbody>
		</table>
		<?php
			echo $model['pagination'];
		?>
	</div>
</div>
</div></div></div>
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