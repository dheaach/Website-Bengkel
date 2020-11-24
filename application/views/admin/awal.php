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

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
    <?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

    <!-- Icon Cards-->
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-warning h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-user"></i>
        </div>
        <div class="mr-5">Master</div>
        </div>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
          <span style="color:white;">Master</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!--<a class="dropdown-item" href="<?php //echo base_url('barang') ?>">Barang Dagang</a>-->
          <a class="dropdown-item" href="<?php echo base_url('suplier') ?>">Suplier</a>
          <a class="dropdown-item" href="<?php echo base_url('customer') ?>">Customer</a>
          <a class="dropdown-item" href="<?php echo base_url('mekanik') ?>">Mekanik</a>
          <a class="dropdown-item" href="<?php echo base_url('kategori') ?>">Kategori</a>
        </div>
      </li>    
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-shopping-cart"></i>
        </div>
        <div class="mr-5">Barang Dagang</div>
        </div>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
          <span style="color:white;">Barang Dagang</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url('barang') ?>">All</a>
          <?php foreach ($kategori as $kats): ?>
          <a class="dropdown-item" href="<?php echo site_url('kat_brg/barang/'.$kats->id) ?>"><?php echo $kats->nama ?></a>
          <?php endforeach; ?>
        </div>
      </li>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-info h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-credit-card"></i>
        </div>
        <div class="mr-5">Transaksi</div>
        </div>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
          <span style="color:white;">Transaksi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url('penjualan_awal') ?>">Pembelian</a>
          <a class="dropdown-item" href="<?php echo base_url('penjualan/penjualan_langsung') ?>">Penjualan Langsung</a>
          <a class="dropdown-item" href="<?php echo base_url('penjualan/penjualan_servis') ?>">Penjualan Servis</a>
        </div>
      </li>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-danger h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-file-pdf"></i>
        </div>
        <div class="mr-5">Laporan</div>
        </div>
      <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'crud' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            
            <span style="color:white;">Laporan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('pembelian') ?>">Pembelian</a>
            <a class="dropdown-item" href="<?php echo site_url('langsung') ?>">Penjualan Langsung</a>
            <a class="dropdown-item" href="<?php echo site_url('servis') ?>">Penjuan Servis</a>
            <a class="dropdown-item" href="<?php echo site_url('semua') ?>">Penjualan Global</a>
        </div>
    </li>
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


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>
