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

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a onclick="window.history.go(-1);" href="#"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('barang/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="id">Id Barang</label>
								<input class="form-control <?php echo form_error('id') ? 'is-invalid':'' ?>"
								 type="text" name="id" placeholder="ID Product"  autocomplete="off"/>
								<div class="invalid-feedback">
									<?php echo form_error('id') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="nama">Nama</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Product name" autocomplete="off"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="satuan">Satuan</label>
								<input class="form-control <?php echo form_error('satuan') ? 'is-invalid':'' ?>"
								 type="text" name="satuan" placeholder="Satuan Product"  autocomplete="off"/>
								<div class="invalid-feedback">
									<?php echo form_error('satuan') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="jenis">Jenis</label>
								<input class="form-control <?php echo form_error('jenis') ? 'is-invalid':'' ?>"
								 type="text" name="jenis" placeholder="Jenis Product"  autocomplete="off"/>
								<div class="invalid-feedback">
									<?php echo form_error('jenis') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="harga">Harga</label>
								<input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
								 type="text" name="harga" placeholder="Harga Product"  autocomplete="off"/>
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="stok">Stok</label>
								<input class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>"
								 type="text" name="stok" placeholder="Stok Product"  autocomplete="off"/>
								<div class="invalid-feedback">
									<?php echo form_error('stok') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="kategori">Kategori</label>
								<select class="form-control" name="kategori">
									<option>-Pilih Kategori-</option>
									<?php
										foreach($kategori as $data){
											echo "<option value='".$data->id."'>".$data->nama."</option>";
										}
									?>
                  				</select>
							</div>
							<div class="form-group">
								<input class="btn btn-success" type="submit" name="btn" value="Save" />
							</div>
						</form>

					</div>

					
					<div class="card-footer small text-muted">
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#kategori').on('change', function(){
			var id = $('#kategori').val();
			$.ajax({
			    type: 'POST',
			    url: '<?php echo base_url('admin/master/barang/tambah') ?>',
			    data: { 'id' : id },
				success: function(data){
				    $("#barangs").html(data);
				}
			})
		})
	})
</script>
</html>