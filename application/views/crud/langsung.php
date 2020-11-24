<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">


				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="50%" cellspacing="0">
								<thead>
									<tr>
										<td>ID</td>
										<td>Tanggal</td>
										<td>ID Customer</td>
										<td>No Manual</td>
										<td>Keterangan</td>
										<td>Nilai</td>
										<td>Staff</td>
										<td>Tipe Kendaraan</td>
										<td>No Rangka</td>
										<td>No Mesin</td>
										<td>Nopol</td>
										<td>BPKB</td>
										<td>STNK</td>
										<td>Keluhan</td>
										<td>Jenis</td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($content ->result_array() as $key):?>
									<tr>
										<td><?php echo $key['id'] ?></td>
										<td><?php echo $key['tanggal'] ?></td>
										<td><?php echo $key['idcust'] ?></td>
										<td><?php echo $key['nomanual'] ?></td>
										<td><?php echo $key['keterangan'] ?></td>
										<td><?php echo $key['nilai'] ?></td>
										<td><?php echo $key['staff'] ?></td>
										<td><?php echo $key['tipekendaraan'] ?></td>
										<td><?php echo $key['norangka'] ?></td>
										<td><?php echo $key['nomesin'] ?></td>
										<td><?php echo $key['nopol'] ?></td>
										<td><?php echo $key['bpkb'] ?></td>
										<td><?php echo $key['stnk'] ?></td>
										<td><?php echo $key['keluhan'] ?></td>
										<td><?php echo $key['jenis'] ?></td>
									</tr>
									<?php endforeach ?>
									<a class="btn btn-primary" href="<?php echo base_url() ?>admin/crud/read/"><i class="fas fa fa-print"></i>  Cetak</a>
								</tbody>
							</table>

							<table>
								<?php 
								$total=0;
								foreach ($content ->result_array() as $key):?>
									<tr>
										<td><?php $total+= $key['nilai'] ?></td>
									</tr>
									<?php endforeach ?>
							</table>
							<?php echo "Total:" . $total; ?>
						</div>
					</div>
				</div>

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
    
	<script>
	function deleteConfirm(url)
	{
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
</script>

</body>

</html>