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
						<a href="<?php echo site_url('mekanik') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('mekanik/edit') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="id">Id mekanik</label>
								<input class="form-control <?php echo form_error('id') ? 'is-invalid':'' ?>"
								 type="text" name="id" placeholder="ID mekanik" value="<?php echo $mekanik->id ?>" readonly/>
								<div class="invalid-feedback">
									<?php echo form_error('id') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="nama">Nama</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="mekanik Name" value="<?php echo $mekanik->nama ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" placeholder="Alamat" value="<?php echo $mekanik->alamat ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="kota">Kota</label>
								<input class="form-control <?php echo form_error('kota') ? 'is-invalid':'' ?>"
								 type="text" name="kota" placeholder="Kota" value="<?php echo $mekanik->kota ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('kota') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="kodepos">Kode Pos</label>
								<input class="form-control <?php echo form_error('kodepos') ? 'is-invalid':'' ?>"
								 type="text" name="kodepos" placeholder="Kode Pos" value="<?php echo $mekanik->kodepos ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('kodepos') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="tlp">Telephon</label>
								<input class="form-control <?php echo form_error('tlp') ? 'is-invalid':'' ?>"
								 type="text" name="tlp" placeholder="Telephon" value="<?php echo $mekanik->tlp ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tlp') ?>
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