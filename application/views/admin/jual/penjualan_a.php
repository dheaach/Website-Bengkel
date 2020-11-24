<html>
<head>
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

<div class="row">
	<div class="col-md-12">
		<center><h3 style="font-family: Rockwell Condensed;">Pembelian</h3></center>
		<a href="<?php echo base_url('penjualan_awal/tambah_penjualan') ?>" class="btn btn-primary">Tambah Pembelian</a>
		<!-- <a href="app/export_penjualan" target="_blank" class="btn btn-primary">Export</a> -->
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4"></div>
	<div class="col-md-12">
		<table border="1" cellpadding="5" style="margin-bottom: 10px;margin-top: 10px;color:black" id="example" class="table table-bordered table-hover">
			<thead>
				<tr bgcolor="#CCC" align="center">
					<td width="5%"><b>No.</b></td>
					<td width="18%"><b>Kode Transaksi</b></td>
					<td width="18%"><b>Tanggal Transaksi</b></td>
					<td width="18%"><b>Total Bayar</b></td>
					<td width="5%"><b>Pilihan</b></td>
				</tr>
			</thead>
			<tbody>
				<?php 
					if( ! empty($model['pembelian'])){
					$no = $this->uri->segment('3') + 1;
					foreach ($model['pembelian'] as $row) {
				 ?>
				<tr>
					<td align="center"><?php echo $no++; ?>.</td>
					<td align="center"><?php echo $row->id; ?></td>
					
					<td align="center"><?php echo $row->tanggal; ?></td>
					<td>Rp. <?php echo number_format($row->nilai,2,",","."); ?></td>
					<td align="center" width="5%">
						<a href="<?php echo base_url('penjualan_awal/hapus/')."$row->id" ?>" class="btn btn-danger btn-sm tombol-hapus">hapus</a>
					</td>
				</tr>
				<?php } }else{ // Jika data tidak ada
					echo "<tr><td colspan='5' align='center'>Data tidak ada</td></tr>";
				} ?>

			</tbody>
		</table>
		<?php
					echo $model['pagination'];
		?>
	</div>
</div>
			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			

		</div>
		<!-- /.content-wrapper -->

	</div></div></div>
	<!-- /#wrapper -->
	<?php $this->load->view("admin/_partials/footer.php") ?>
	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>
<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
</body>

</html>