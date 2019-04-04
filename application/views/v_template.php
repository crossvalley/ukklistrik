<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $judul ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.button.min.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url()?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PPOB</b> Listrik</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">

              <?php if($this->session->userdata('id_level')!= NULL): ?>
              <span class="hidden-xs"> <?=$this->session->userdata('nama_admin')?></span>
              <?php else: ?>
              <span class="hidden-xs"> <?=$this->session->userdata('nama_pelanggan')?></span>
              <?php endif ?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php if($this->session->userdata('id_level')!= NULL && $this->session->userdata('id_level') == 1): ?>
                  <?=$this->session->userdata('nama_admin')?> - Administrator
                  <?php elseif($this->session->userdata('id_level')!= NULL && $this->session->userdata('id_level') == 2): ?>

                  <?=$this->session->userdata('nama_admin')?> - Pimpinan
                  <?php else: ?>
                  <?=$this->session->userdata('nama_pelanggan')?> - Pelanggan
                  <?php endif ?>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="pull-right">

                <?php if($this->session->userdata('id_level')!= NULL): ?>
                <a href="<?= base_url("home/profil_admin/".$this->session->userdata('id_admin') )?>" class="btn btn-primary btn-flat">Profil</a>
                <?php else: ?>
                <a href="<?= base_url("home/profil/".$this->session->userdata('id_pelanggan') )?>" class="btn btn-primary btn-flat">Profil</a>
                <?php endif ?>

                <?php if($this->session->userdata('id_level')!= NULL ): ?>
                <a href="<?=base_url('home/logout_admin')?>" class="btn btn-danger btn-flat">Keluar </a>
                <?php else: ?>
                <a href="<?=base_url('home/logout_user')?>" class="btn btn-danger btn-flat">Keluar </a>
                <?php endif ?>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">

          <?php if($this->session->userdata('id_level')!= NULL): ?>
          <p><?= substr($this->session->userdata('nama_admin'),0,18)?>...</p>
          <?php else: ?>
          <p><?= substr($this->session->userdata('nama_pelanggan'),0,18)?>...</p>
          <?php endif ?>

          <a href="#"><i class="fa fa-circle text-success"></i>
            <?php if($this->session->userdata('id_level')== 1): ?>
              Administrator
            <?php elseif ($this->session->userdata('id_level')== 2):  ?>
              Pimpinan

          <?php else: ?>
            Pelanggan

          <?php endif ?>
          </a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php if($this->session->userdata('id_level')== NULL): ?>
        <li>
          <a href="<?=base_url()?>user_home/tagihan">
            <i class="fa fa-line-chart"></i>
            <span>Tagihan Listrik</span>
          </a>
        </i>
          <?php elseif($this->session->userdata('id_level')== 2): ?>

           <li>
              <a href="<?=base_url()?>admin_home/penggunaan_listrik">
                <i class="fa fa-dollar"></i>
                Penggunaan Listrik
              </a>
           </li>

           <li>
             <a href="<?=base_url()?>admin_home/riwayat">
               <i class="fa fa-history"></i>
               Riwayat
             </a>
           </li>

          <?php else: ?>
        <li>
          <a href="<?=base_url()?>admin_home/tarif">
            <i class="fa fa-dashboard"></i> Dashboard
          </a>
        </li>

        <li>
          <a href="<?=base_url()?>admin_home/data_admin">
            <i class="fa fa-address-book"></i>
            Admin
          </a>
        </li>

        <li>
          <a href="<?=base_url()?>admin_home/data_level">
            <i class="fa fa-address-card"></i>
            Level Admin
          </a>
        </li>

        <li>
          <a href="<?=base_url()?>admin_home/pelanggan">
            <i class="fa fa-user"></i>
            <span>Pelanggan</span>
          </a>
        </i>

        <li>
          <a href="<?=base_url()?>admin_home/tarif">
            <i class="fa fa-dollar"></i>
            Tarif Listrik
          </a>
        </li>

        <li>
          <a href="<?=base_url()?>admin_home/penggunaan_listrik">
            <i class="fa fa-line-chart"></i>
            <span>Penggunaan Listrik</span>
          </a>
        </i>

        <li>
          <a href="<?=base_url()?>admin_home/pembayaran">
            <i class="fa fa-money"></i>
              <span>Konfirmasi Pembayaran</span>
          </a>
        </i>

        <li>
          <a href="<?=base_url()?>admin_home/riwayat">
            <i class="fa fa-history"></i>
            Riwayat Pembayaran
          </a>
        </li>

          <?php endif ?>



    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <?php $this->load->view($konten); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">

    <strong>Copyright &copy; 2019 <a href="#">Listrik Onlen</a>.</strong> All rights
    reserved.
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- DataTable -->
<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.buttonflash.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.jszip.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.pdfmake.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.vfs_fonts.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.buttons.html5.min.js"></script>

<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<script>

  $(function () {
    $('#tabletarif').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
    }),

    $('#tabelriwayat').DataTable({
      dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
  })

</script>
</body>
</html>
