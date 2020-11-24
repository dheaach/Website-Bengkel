
<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('customer/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>ID customer</th>
										<th>Nama customer</th>
										<th>Alamat</th>
										<th>Kota</th>
										<th>Kode Pos</th>
										<th>Hp</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($customer as $sup): ?>
									<tr>
										<td >
											<?php echo $sup->id ?>
										</td>
										<td>
											<?php echo $sup->nama ?>
										</td>
										<td>
											<?php echo $sup->alamat ?>
										</td>
										<td>
											<?php echo $sup->kota ?>
										</td>
										<td>
											<?php echo $sup->kodepos ?>
										</td>
										<td>
											<?php echo $sup->hp ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('customer/edit/'.$sup->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('customer/delete/'.$sup->id) ?>')" class="btn btn-small text-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $sup->id;?>"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
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
	<?php foreach ($customer as $sup): ?>
        <div class="modal fade" id="modal_hapus<?php echo $sup->id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'customer/delete/'.$sup->id ?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $sup->nama;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $sup->id;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>


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