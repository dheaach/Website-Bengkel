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
						<a href="<?php echo site_url('customer') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('customer/edit') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="id">Id customer</label>
								<input class="form-control <?php echo form_error('id') ? 'is-invalid':'' ?>"
								 type="text" name="id" placeholder="ID customer" value="<?php echo $customer->id ?>" readonly/>
								<div class="invalid-feedback">
									<?php echo form_error('id') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="nama">Nama</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="customer Name" value="<?php echo $customer->nama ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" placeholder="Alamat" value="<?php echo $customer->alamat ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="kota">Kota</label>
								<input class="form-control <?php echo form_error('kota') ? 'is-invalid':'' ?>"
								 type="text" name="kota" placeholder="Kota" value="<?php echo $customer->kota ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('kota') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="kodepos">Kode Pos</label>
								<input class="form-control <?php echo form_error('kodepos') ? 'is-invalid':'' ?>"
								 type="text" name="kodepos" placeholder="Kode Pos" value="<?php echo $customer->kodepos ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('kodepos') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="hp">Handphone</label>
								<input class="form-control <?php echo form_error('hp') ? 'is-invalid':'' ?>"
								 type="text" name="hp" placeholder="Handphone" value="<?php echo $customer->hp ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('hp') ?>
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