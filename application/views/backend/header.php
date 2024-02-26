<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/logo3.png" type="image/x-icon">

  <title>SISTEM INFORMASI ABSENSI DAN KEPEGAWAIAN BERBASIS WEB PADA PERUSAHAAN PT. GAWI MAKMUR KALIMANTAN</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url(); ?>assets/gentelella-master/build/css/custom.min.css" rel="stylesheet">

  <!-- Datatables -->
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <?php
  function rupiah($angka)
  {

    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
  }
  ?>
  <?php
  function tgl_indo($tanggal)
  {
    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
  } ?>
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- bootstrap-datetimepicker -->
  <link href="<?php echo base_url(); ?>assets/gentelella-master/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>assets/alert/sweetalert2.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/alert/sweetalert2.min.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/alert/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/alert/sweetalert2.js"></script>
  <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
</head>

<body class="nav-md" style="background-color: #1cc88a;">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view" style="background-color: #1cc88a;">
          <div class="navbar nav_title" style="border: 0; background-color: #1cc88a;">
            <a href="#" class="site_title" style="font-size: 20px"> <span>
                <center><img height="60px" width="120px" src="<?php echo base_url(); ?>assets/logo2.png"> </center>
              </span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->

          <div class="profile clearfix">
            <div class="profile_pic">
              <?php if ($this->session->userdata("gambar") == "") : ?>
                <img src="<?php echo base_url(); ?>assets/image/profil2.png" alt="..." class="img-circle profile_img">
              <?php else : ?>
                <img src="<?php echo base_url() . 'assets/image/' . $this->session->userdata("gambar"); ?>" alt="..." class="img-circle profile_img">
              <?php endif; ?>

            </div>
            <div class="profile_info">
              <span>Selamat Datang,</span>
              <h2> <?php
                    echo $this->session->userdata("username");
                    ?></h2>
            </div>
          </div>






          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <center>
                <h3>DAFTAR MENU</h3>
              </center>
              <ul class="nav side-menu menu_fixed">
                <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-home"></i> Dashboard </a>
                </li>


                <?php if ($this->session->userdata('level') == "pegawai") : ?>
                  <li><a href="<?php echo base_url(); ?>cuti"><i class="fa fa-envelope"></i> Pengajuan Cuti </a>
                  </li>
                  <li><a href="<?php echo base_url(); ?>absen_masuk"><i class="fa fa-calendar-check-o"></i> Absen Masuk </a>
                  </li>
                  <li><a href="<?php echo base_url(); ?>absen_keluar"><i class="fa fa-calendar-check-o"></i> Absen Keluar </a>
                  </li>
                <?php else : ?>
                  <li><a><i class="fa fa-server"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if ($this->session->userdata('jenis_pengguna') != 2) : ?>
                        <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>pengguna"> User </a></li>
                      <?php endif; ?>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>pegawai"> Pegawai </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>jabatan"> Jabatan </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>datacuti"> Data Cuti </a></li>
                    </ul>
                  </li>



                  <li><a><i class="fa fa-server"></i> Transaksi Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>absen"> Absen </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>absen_masuk"> Absen Masuk </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>absen_keluar"> Absen Keluar </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>cuti"> Cuti </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>mutasi"> Mutasi </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>pensiun"> Pensiun </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>surat_tugas"> Penugasan </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>penggajian"> Penggajian </a></li>

                    </ul>
                  </li>

                  <li><a><i class="fa fa-print"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>pegawai/lihat"> Pegawai </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>absen_masuk/lihat"> Absen Masuk </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>absen_keluar/lihat"> Absen Keluar </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>cuti/lihat"> Cuti </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>mutasi/lihat"> Mutasi </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>pensiun/lihat"> Pensiun </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>surat_tugas/lihat"> Penugasan </a></li>
                      <li class="sub-menu always-open"><a href="<?php echo base_url(); ?>penggajian/lihat"> Penggajian </a></li>
                    </ul>
                  </li>





                <?php endif; ?>









              </ul>



              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->

          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                  <?php if ($this->session->userdata("gambar") == "") : ?>
                    <img src="<?php echo base_url(); ?>assets/image/profil2.png" alt="">
                  <?php else : ?>
                    <img src="<?php echo base_url() . 'assets/image/' . $this->session->userdata("gambar"); ?>" alt="">
                  <?php endif; ?>
                  <?php
                  echo $this->session->userdata("username");
                  ?>


                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <!--  <li><a href="<?php echo base_url(); ?>profil"> Profile</a></li> -->
                  <li><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>


            </ul>
          </nav>
        </div>
      </div>