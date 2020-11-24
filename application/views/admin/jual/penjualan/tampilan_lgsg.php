<?php 
    $this->load->view('config/header.php');
 ?>
<body style="background: #F2EDF3;">
<div class="row">
	<div class="col-md-12">
		<!-- <a href="app/export_penjualan" target="_blank" class="btn btn-primary">Export</a> -->
		<center><h1 style="font-family: Rockwell Condensed;font-size: 56px;">Penjualan Langsung</h1></center>
		<a href="<?php echo base_url('penjualan/tambah_penjualan') ?>" class="btn btn-primary">Tambah Penjualan</a>
		<button onclick="window.history.go(-1);" class="btn btn-default">Kembali</button>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4"></div>
	<div class="col-md-12">
		<table border="1" cellpadding="5" style="margin-bottom: 10px;margin-top: 10px;" id="example" class="table table-bordered">
			<thead>
				<tr bgcolor="#CCC" align="center">
					<td width="5%"><b>No.</b></td>
					<td><b>Kode Penjualan</b></td>
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
					$sql = $this->db->query("SELECT * FROM customer INNER JOIN karyawan INNER JOIN penjualan ON penjualan.idcust = customer.id AND karyawan.id = penjualan.staff WHERE jenis='langsung'")->result();
					$no = 1;
					foreach ($sql as $row) {
				?>
				<tr>
					<td align="center"><?php echo $no++; ?>.</td>
					<td align="center"><?php echo $row->id; ?></td>
					<td align="center"><?php echo $row->tanggal; ?></td>
					<td align="center"><?php echo $row->nama; ?></td>
					<td align="center"><?php echo $row->no_manual; ?></td>
					<td align="center"><?php echo $row->nama_staff; ?></td>
					<td>Rp. <?php echo number_format($row->nilai,2,",","."); ?></td>
					<td align="center">
						<a href="<?php echo base_url('penjualan/hapus/')."$row->id" ?>" onclick="javasciprt: return confirm('Anda yakin ingin menghapus data ?')"><img src="<?php echo base_url('images/sampah.png') ?>" width="32%"></a>
						<a href="#" target="_blank" class="tx-success"><img src="<?php echo base_url('images/printer.png') ?>" width="37%"></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>