<!DOCTYPE html>
<html>
<head>
</head>
<body onload="window.print()">
	<h1 align='center'>Laporan Penjualan Langsung</h1>
	<br>
	<br>
	<table border="1" width="100%">
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
							
									<?php foreach ($content ->result_array() as $key):
										$tgl = date('d-m-Y', strtotime($key ['tanggal']));?>
									<tr>
										<td><?php echo $key['id'] ?></td>
										<td><?php echo $tgl ?></td>
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
							</table>
							<br>
							<table>
								<?php 
								$total=0;
								foreach ($content ->result_array() as $key):?>
									<tr>
										<td><?php $total+= $key['nilai'] ?></td>
									</tr>
									<?php endforeach ?>
									<?php echo "Total :" . $total;?>
							</table>
</body>
</html>