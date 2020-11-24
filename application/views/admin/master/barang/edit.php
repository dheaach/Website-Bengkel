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

						<form action="<?php base_url('barang/edit') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="id">Id Barang</label>
								<input class="form-control <?php echo form_error('id') ? 'is-invalid':'' ?>"
								 type="text" name="id" placeholder="ID Product" value="<?php echo $product->id ?>" readonly/>
								<div class="invalid-feedback">
									<?php echo form_error('id') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="nama">Nama</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Product name" value="<?php echo $product->nama ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="satuan">Satuan</label>
								<input class="form-control <?php echo form_error('satuan') ? 'is-invalid':'' ?>"
								 type="text" name="satuan" placeholder="Satuan Product" value="<?php echo $product->satuan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('satuan') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="jenis">Jenis</label>
								<input class="form-control <?php echo form_error('jenis') ? 'is-invalid':'' ?>"
								 type="text" name="jenis" placeholder="Jenis Product" value="<?php echo $product->jenis ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jenis') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="harga">Harga</label>
								<input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
								 type="text" name="harga" placeholder="Harga Product" value="<?php echo $product->harga ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="stok">Stok</label>
								<input class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>"
								 type="text" name="stok" placeholder="Stok Product" value="<?php echo $product->stok ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('stok') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="kategori">Kategori</label>
								<select class="form-control <?php echo form_error('kategori') ? 'is-invalid':'' ?>" name="kategori">
									<option>-Pilih Kategori-</option>
									<?php
										foreach($kategori as $data){
											echo "<option value='".$data->id."'>".$data->nama."</option>";
										}
									?>
                  				</select>
								<div class="invalid-feedback">
									<?php echo form_error('kategori') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
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

</html>