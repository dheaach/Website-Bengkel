<?php
$this->load->view('templates/header'); 
?>
<body>
    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-body">
<div class="row">
	<div class="col-md-12">
	<form action="<?php echo base_url('penjualan1/nyimpen') ?>" method="POST">

<?php //-------------------------------------------------------------------------------------------------  ?> 

<div class="wbody-content">
    <div class="wbody-title">
        <div class="rows rows-rols">
            <div class="wcol-12 rows-rols wbodytitle-top walign-large">
                <table border="0" class="wform-group">
                    <tr>
                        <td><h6>Transaksi / <span>Penjualan Servis</span></h6></td>
                    </tr>
                </table>
            </div>
        </div>      
    </div>
    <div class="wbody-cont">
        <div class="rows rows-rols">
            <div class="wcol-8">
                <div id="wform-tambah-trans">    
                            <div class="rows" style="color:black">
                                <div class="wcol-1">
                                    <div class="wform-group">
                                        <label class="wform-label">No.Nota</label>
                                        <input class="winput winput-sm" type="text" name="kode_penjualan" id="kode_penjualan" placeholder="No. Nota" autocomplete="off" required/>
                                    </div>  
                                    <div class="wform-group">
                                        
                                        <table border="0" class="wform-group">
                                        <tr>
                                            <td width="30%">
                                                <label class="wform-label">Customer</label>
                                            <select class="winput winput-lg" name="id_customer" id="id_customer" required>
                                                <option value="0" hidden="hidden">Pilih Customer</option>
                                                <?php
                                                    $cus = $this->db->query('SELECT * FROM customer'); 
                                                    foreach ($cus->result() as $cus) { 
                                                ?>
                                                <option value="<?php echo $cus->id ?>"><?php echo $cus->id ?></option required>
                                                <?php } ?>
                                            </select>
                                            </td>
                                            <td>&nbsp;</td>
                                            <td>                                    
                                                <label class="wform-label">Nama Customer</label>
                                                <input class="winput winput-ll" type="text" name="name"id="name" placeholder="Nama Customer" readonly required>
                                            </td>
                                            <td>&nbsp;</td>
                                            <td>
                                            <label class="wform-label">No.Manual</label>
                                            <input class="winput winput-ll" type="text" name="manual" placeholder="No.Manual" required="required" autocomplete="off">
                                            </td>
                                        </tr>
                                        </table>
                                    </div>   
                                
                                
                                     <div class="wform-group">
                                        <label class="wform-label">Keterangan</label>
                                        <textarea class="winput winput-sm" type="text" name="ket" placeholder="Keterangan" required="required"></textarea>
                                    </div>  
                                        <table border="0" class="wform-group">
                                        <tr>
                                            <td>
                                            <label>No.Rangka</label>
                                            <input class="winput winput-ll" type="text" name="rangka" placeholder="No.Rangka" required="required" autocomplete="off">
                                            </td>
                                            <td>&nbsp;</td>
                                            <td>
                                            <label>No.Mesin</label>
                                             <input class="winput winput-ll" type="text" name="mesin" placeholder="No.Mesin" required="required" autocomplete="off">   
                                            </td>
                                            <td>&nbsp;</td>
                                            <td>
                                            <label>No.Pol</label>
                                             <input class="winput winput-ll" type="text" name="pol" placeholder="No.polisi" required="required" autocomplete="off">   
                                            </td>
                                        </tr>
                                        </table>
                                        <table border="0" class="wform-group">
                                        <tr>
                                            <td>
                                            <label>No.BPKB</label>
                                            <input class="winput winput-ll" type="text" name="bpkb" placeholder="No.BPKB" required="required" autocomplete="off">
                                            </td>
                                            <td>&nbsp;</td>
                                            <td>
                                            <label>No.STNK</label>
                                             <input class="winput winput-ll" type="text" name="stnk" placeholder="No.STNK" required="required" autocomplete="off">   
                                            </td>
                                            <td>&nbsp;</td>
                                            <td>
                                            <label>Tipe Kendaraan</label>
                                             <input class="winput winput-ll" type="text" name="tipe" placeholder="Tipe Kendaraan" required="required" autocomplete="off">   
                                            </td>
                                        </tr>
                                        </table>

                                        <div class="wform-group">
                                        <table border="0" width="100%">
                                        <tr>
                                            <td width="90%">
                                                <label class="wform-label">Keluhan</label>
                                                <textarea class="winput winput-sm" type="text" name="keluhan" placeholder="Keluhan" required="required"></textarea>
                                            </td>

                                                <input type="hidden" name="tgl_penjualan"  value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d H:i:s') ?>">

                                            <td align="right">
                                                <button type="submit" class="btn btn-primary" style="font-size: 13px;margin-bottom: 30px">Simpan</button>
                                            </td>
                                        </tr>
                                        </table>
                                    </div>
                                    </div>  
                                   </div>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div> 
</div>
</form>

<br><br>

<?php //-----------------------------------------------------------------------------------------------  ?>

<div class="wbody-cont">
    <div class="rows rows-rols">
        <div class="wcol-12 ">      
        <div class="table-resposive">
        <table class="table table-bordered" style="color:black;font-size: 12px">
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="" style="font-size: 13px;">Tambah Pesanan</button>
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
                    <a href="<?php echo base_url('penjualan1/hapus_cart/').$items['rowid']; ?>" class="btn btn-warning btn-sm">X</a>
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
</div>
</div>
</div>
	</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="<?php echo base_url('penjualan1/simpan_cart') ?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
         <table border="0" width="100%">
        <tr>
        <td width="40%"><h4>Tambah Barang</h4></td>
        <td width="60%"><button type="button" class="close" data-dismiss="modal">&times;</button></td>
        </tr>    
        </table>
      </div>
      <div class="modal-body">
      	
        <div class="form-group">
        	<label>Nama Barang</label><br>
	      <select id="nama_barang" name="nama_barang"  class="form-control" >
	        <?php 
	        $sql = $this->db->query('SELECT * FROM barang WHERE stok > 0');
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
            <input type="text" class="form-control" name="jumlah" id="jumlah" autocomplete="off" />
            <input type="hidden" class="form-control" name="nabar" id="nabar"/>
        </div>
      </div>
      <div class="modal-footer">
      	<button class="btn btn-info" type="submit" style="font-size: 13px;">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 13px;border:1px solid grey">Close</button>
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
        url : '<?php echo base_url('penjualan1/cek_barang') ?>',
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
    $('#id_customer').change(function() {
      var id = $(this).val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url('penjualan1/cek_sup') ?>',
        Cache : false,
        dataType: "json",
        data : 'id_customer='+id,
        success : function(resp) {
            $('#name').val(resp.nama); 
        }
      });
      // alert(id);
    });


    
  });
</script>
</div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>


</body>
</html>