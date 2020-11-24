<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
	<table border="1" cellpadding="8">
	 <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Faktur</th>
        <th>Nilai</th>
        <th>Suplier</th>
        <th>Staff</th>
    </tr>

    <?php
    if( ! empty($transaksi)){
        $no = 1;
        foreach($transaksi as $data){
            $tgl = date('d-m-Y', strtotime($data->tanggal));
            
            echo "<tr>";
            echo "<td>".$data->id."</td>";
            echo "<td>".$tgl."</td>";
            echo "<td>".$data->idcust."</td>";
            echo "<td>".$data->keterangan."</td>";
            echo "<td>".$data->faktur."</td>";
            echo "<td>".$data->nilai."</td>";
            echo "<td>".$data->suplier."</td>";
            echo "<td>".$data->staff."</td>";
            echo "</tr>";
            $no++;
        }
    }
    ?>
	</table>
     <table>
            <?php 
                $total=0;
                foreach ($transaksi as $key):?>
                <tr>
                    <td><?php $total+= $key->nilai ?></td>
                </tr>
                <?php endforeach ?>
    </table>
     <?php echo "Total:" . $total; ?>
</body>
</html>
