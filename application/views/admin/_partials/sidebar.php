<ul class="sidebar navbar-nav">
      <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('master') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-user"></i>
          <span>Master</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!--<a class="dropdown-item" href="<?php //echo base_url('barang') ?>">Barang Dagang</a>-->
          <a class="dropdown-item" href="<?php echo base_url('suplier') ?>">Suplier</a>
          <a class="dropdown-item" href="<?php echo base_url('customer') ?>">Customer</a>
          <a class="dropdown-item" href="<?php echo base_url('mekanik') ?>">Mekanik</a>
          <a class="dropdown-item" href="<?php echo base_url('kategori') ?>">Kategori</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Barang Dagang</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url('barang') ?>">All</a>
          <?php foreach ($kategori as $kats): ?>
          <a class="dropdown-item" href="<?php echo site_url('kat_brg/barang/'.$kats->id) ?>"><?php echo $kats->nama ?></a>
          <?php endforeach; ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-credit-card"></i>
          <span>Transaksi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url('penjualan_awal') ?>">Pembelian</a>
          <a class="dropdown-item" href="<?php echo base_url('penjualan/penjualan_langsung') ?>">Penjualan Langsung</a>
          <a class="dropdown-item" href="<?php echo base_url('penjualan/penjualan_servis') ?>">Penjualan Servis</a>
        </div>
      </li>
       <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'crud' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-file-pdf"></i>
            <span>Laporan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('pembelian') ?>">Pembelian</a>
            <a class="dropdown-item" href="<?php echo site_url('langsung') ?>">Penjualan Langsung</a>
            <a class="dropdown-item" href="<?php echo site_url('servis') ?>">Penjuan Servis</a>
            <a class="dropdown-item" href="<?php echo site_url('semua') ?>">Penjualan Global</a>
        </div>
    </li>
    </ul>

      <script src="<?php echo base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/') ?>js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url('assets/') ?>js/demo/datatables-demo.js"></script>
  <script src="<?php echo base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
