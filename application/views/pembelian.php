<?php 
    include('config/header.php');
 ?>
<body style="background: #F2EDF3;">
<div class="row">
	<div class="col-md-12">
	<form action="welcome/simpan_penjualan" method="POST">
 <?php //-------------------------------------------------------------------------------------------------------  ?> 

<div class="wbody-content">
    <div class="wbody-title">
        <div class="rows rows-rols">
            <div class="wcol-12 rows-rols wbodytitle-top walign-large">
                <table border="0" class="wform-group">
                    <tr>
                        <td><h6>Halaman / <span>Pembelian</span></h6></td>
                        <td><marquee scrollamount="12" behavior="scroll" onmouseover="this.stop()" onmouseout="this.start()" style="font-family: Rockwell Condensed; font-size:24px; border-left : 1px solid #CCC; width:100%;"><span style="color: #cc0000;">Perhatian!</span> Isilah pesanannya terlebih dahulu , jika sudah baru isi kolom diatas tabel pesanannya.</marquee></td>
                    </tr>
                </table>
            </div>
        </div>      
    </div>
    <div class="wbody-cont">
        <div class="rows rows-rols">
            <div class="wcol-8">
                <div id="wform-tambah-trans">    
                            <div class="rows">
                                <div class="wcol-4">
                                    <div class="wform-group">
                                        <label class="wform-label">No. LPB</label>
                                        <input class="winput winput-md" type="text" name="kode_penjualan" id="kode_penjualan" value="<?php echo $kode; ?>" readonly/>
                                    </div>  
                                    <div class="wform-group">
                                        <label class="wform-label">Suplier</label>
                                        <table border="0" class="wform-group">
                                        <tr>
                                            <td>
                                            <select class="winput winput-lg" name="id_supplier" id="id_supplier">
                                                <option value="0" hidden="hidden">Pilih Suplier</option>
                                                <?php
                                                    $sup = $this->db->query('SELECT * FROM suplier'); 
                                                    foreach ($sup->result() as $su) { 
                                                ?>
                                                <option value="<?php echo $su->id ?>"><?php echo $su->id ?></option>
                                                <?php } ?>
                                            </select>
                                            </td>
                                            <td>
                                                <input class="winput winput-ll" type="text" name="name" id="name" readonly>
                                            </td>
                                        </tr>
                                        </table>
                                    </div>   
                                </div>
                                <div class="wcol-4">
                                    <div class="wform-group">
                                        <label class="wform-label">No. Faktur</label>
                                        <input class="winput winput-md" type="text" name="faktur" placeholder="No Faktur" required="required">
                                    </div>  
                                     <div class="wform-group">
                                        <label class="wform-label">Keterangan</label>
                                        <textarea class="winput winput-md" type="text" name="ket" rows="2" placeholder="Keterangan" required="required"></textarea>
                                    </div>  

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div> 
</div>


 <?php //-------------------------------------------------------------------------------------------------------  ?>
<div class="wbody-cont">
    <div class="rows rows-rols">
        <div class="wcol-12 ">      
        <div class="table-resposive">
        <table class="table table-bordered">
        	<tr>
        		<th>No.</th>
        		<th>Kode Barang</th>
        		<th>Nama Barang</th>
        		<th>Jumlah</th>
        		<th>Harga</th>
        		<th>Subtotal</th>
        		<th>
        			<!-- Trigger the modal with a button -->
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Tambah Pesanan</button>
        		</th>
        	</tr>
        	<tr>
        	<?php $i=1; $no=1;?>
            <?php foreach($this->cart->contents() as $items): ?>
        		<td><?php echo $no; ?></td>
                <td><?php echo $items['id']; ?></td>
                <td><?php echo $items['name']; ?></td>
                <td><?php echo $items['qty']; ?></td>
                <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                <td>
                    <a href="welcome/hapus_cart/<?php echo $items['rowid'] ?>" class="btn btn-warning btn-sm">X</a>
                </td>
        	</tr>
        	<?php $i++; $no++;?>
            <?php endforeach; ?>
            <tr>
        		<th colspan="5">Total Harga</th>
        		<th colspan="2">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></th>
        	</tr>
        </table>
        </div>

        <!-- <div class="form-group">
            <label>Pelanggan</label>
            <input type="text" name="pelanggan" class="form-control" placeholder="Nama Pelanggan">
        </div> -->
        
        <div class="form-group">
        	<input type="hidden" name="total_harga" value="<?php echo $this->cart->total() ?>">
        	<input type="hidden" name="tgl_penjualan" value="<?php echo date('d/m/Y') ?>">
        	
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url('welcome') ?>" class="btn btn-default">Close</a>
        </div>
</div>
</div>
</div>
	</form>
	</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="welcome/simpan_cart" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Barang</h4>
      </div>
      <div class="modal-body">
      	
        <div class="form-group">
        	<label>Nama Barang</label><br>
	      <select id="nama_barang" name="nama_barang"  class="form-control" >
	        <?php 
	        $sql = $this->db->get('barang');
	        foreach ($sql->result() as $row) {
	         ?>
            <option value="0" hidden="hidden">Pilih Barang</option>
	        <option value="<?php echo $row->id ?>"><?php echo $row->nama ?></option>
	        <?php } ?>
	      </select>
	    </div>
	    <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" class="form-control" name="kode_barang" id="kode_barang" readonly/>
        </div>
	    <div class="form-group">
            <label>Stok tersedia</label>
            <input type="text" class="form-control" name="stok" id="stok" readonly/>
        </div>
        <div class="form-group">
            <label>Harga </label>
            <input type="text" class="form-control" name="harga" id="harga" readonly/>
        </div>
        <div class="form-group">
            <label>Jumlah Beli </label>
            <input type="text" class="form-control" name="jumlah" id="jumlah"/>
            <input type="hidden" class="form-control" name="nabar" id="nabar"/>
        </div>
      </div>
      <div class="modal-footer">
      	<button class="btn btn-info" type="submit">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>

  </div>
</div>

<?php //------------------------------------------------------------------------------------------------------ ?>



<script type="text/javascript">
  $(document).ready(function(){
    $('#nama_barang').change(function() {
      var id = $(this).val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url('welcome/cek_barang') ?>',
        Cache : false,
        dataType: "json",
        data : 'kode_barang='+id,
        success : function(resp) {
            $('#kode_barang').val(resp.id);
            $('#stok').val(resp.stok); 
            $('#harga').val(resp.harga);  
            $('#nabar').val(resp.nama); 
        }
      });
      // alert(id);
    });


    
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#id_supplier').change(function() {
      var id = $(this).val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url('welcome/cek_sup') ?>',
        Cache : false,
        dataType: "json",
        data : 'id_supplier='+id,
        success : function(resp) {
            $('#name').val(resp.nama); 
        }
      });
      // alert(id);
    });


    
  });
</script>
</body>
</html>