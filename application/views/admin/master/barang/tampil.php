
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
						<a href="<?php echo site_url('barang/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
						
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>ID Barang</th>
										<th>Nama Barang</th>
										<th>Satuan</th>
										<th>Jenis</th>
										<th>Harga</th>
										<th>Stok</th>
										<th>Kategori</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($products as $product): ?>
									<tr>
										<td >
											<?php echo $product->id ?>
										</td>
										<td>
											<?php echo $product->nama ?>
										</td>
										<td>
											<?php echo $product->satuan ?>
										</td>
										<td>
											<?php echo $product->jenis ?>
										</td>
										<td>
											<?php echo $product->harga ?>
										</td>
										<td>
											<?php echo $product->stok ?>
										</td>
										<td>
											<?php echo $product->kategori ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('barang/edit/'.$product->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											 <a onclick="deleteConfirm('<?php echo site_url('barang/delete/'.$product->id) ?>')" class="btn btn-small text-danger" data-toggle="modal" data-target="#modal_hapus1<?php echo $product->id;?>"><i class="fas fa-trash"></i> Hapus</a>
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
<?php foreach ($products as $product): ?>
        <div class="modal fade" id="modal_hapus1<?php echo $product->id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'barang/delete/'.$product->id ?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $product->nama;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $product->id;?>">
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