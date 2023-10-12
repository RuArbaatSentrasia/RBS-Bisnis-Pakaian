<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("location:../login/login.php");
}
$username = $_SESSION['username'];
include '../../koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM t_datapengguna WHERE username = '$username'");
while ($d = mysqli_fetch_array($data)) {
?>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMonitor | Tambah Pustaka</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <link rel="icon" href="../../dist/img/favicon-16x16.png" type="image/ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition layout-boxed skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SIM</b>PLN</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SIM</b>MONITOR</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../../dist/img/logo-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $d['nama_pengguna']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../../dist/img/logo-160x160.jpg" class="img-circle" alt="User Image">

                    <p>
                      <?php echo $d['nama_pengguna']; ?>
                      <small><?php
                              if ($d['level'] == 1) {
                                echo "Kepala Operator";
                              } else {
                                echo "Admin Operator";
                              }
                              ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="../pengaturanakun/pengaturanakun.php" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="../login/logout-proses.php" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <?php
      include '../layout/sidebar.php';
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Penjualan Listrik
          </h1>
          <ol class="breadcrumb">
            <li><a href="../../index.php"><i class="fa fa-home"></i> Beranda</a></li>
            <li><a href="datapustaka.php"> Data Kwh</a></li>
            <li class="active"> Tambah Data</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <form class="form-horizontal" role="form" method="post" action="tambahdatakwh-proses.php">
              <div class="col-xs-12">
              </div>
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Tambah Data Baru</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Periode</label>
                      <div class="col-xs-3">
                        <input type="month" class="form-control" id="" name="bulan" required>
                      </div>
                    </div>
                    <div class="form-group ml-2">
                      <label for="" class="col-sm-2 control-label">Klasifikasi</label>
                      <div class="col-xs-4">
                        <select class="form-control" id="" name="pelanggan" required>
                          <option hidden selected>Pilih Jenis Klasifikasi</option>
                          <option>Pasca Bayar</option>
                          <option>Pra Bayar</option>
                        </select>
                        <!-- <input type="text" class="form-control" name="pelanggan" required> -->
                      </div>
                      <div class="col-xs-4">
                        <!-- <input type="text" class="form-control" name="pelanggan" required> -->
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Tarif S</label>
                      <div class="col-xs-3">
                        <input type="text" class="form-control" id="" name="kwh_s" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Tarif R</label>
                      <div class="col-xs-3">
                        <input type="text" class="form-control" id="" name="kwh_r" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Tarif B</label>
                      <div class="col-xs-2">
                        <input type="number" class="form-control" id="" name="kwh_b" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label"> Tarif I</label>
                      <div class="col-xs-3">
                        <input type="text" class="form-control" id="" name="kwh_i" onkeypress="isInputNumber(event)" maxlength="90" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label"> Tarif P</label>
                      <div class="col-xs-2">
                        <input type="text" class="form-control" id="" name="kwh_p" required>
                      </div>
                    </div>
                    <!-- <input type="hidden" class="form-control" id="" name="total_plg" disabled> -->

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="kategori" required>
                      <option value="">Pilih Kategori</option>
                      <option>Karya Umum</option>
                      <option>Filsafat dan Psikologi</option>
                      <option>Agama</option>
                      <option>Ilmu-ilmu Sosial</option>
                      <option>Bahasa</option>
                      <option>Ilmu-ilmu Alam dan Matematika</option>
                      <option>Teknologi dan Ilmu-ilmu Terapan</option>
                      <option>Kesenian Hinburan dan Olahraga</option>
                      <option>Kesusastraan</option>
                      <option>Geografi dan Sejarah</option>
                    </select>
                  </div>
                </div> -->

              </div>
              <div class="col-xs-12 text-center">
                <a href="datakwh.php" class="btn btn-default" style="margin-right: 20px;">Kembali ke Daftar Data Kwh</a>
                <button type="submit" class="btn btn-primary">Selesai</button>
              </div>
            </form>
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versi</b> 1.0
        </div>
        <strong>Copyright &copy; 2023 PT. PLN UP3 KOTA GORONTALO</strong>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-user bg-yellow"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>

                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>

                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>

                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>

                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul>
            <!-- /.control-sidebar-menu -->

          </div>
          <!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
          <!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>

                <p>
                  Some information about this general settings option
                </p>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>

                <p>
                  Other sets of options are available
                </p>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>

                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div>
              <!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div>
              <!-- /.form-group -->
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
      </aside>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script>
      function isInputNumber(evt) {

        var ch = String.fromCharCode(evt.which);

        if (!(/[0-9]/.test(ch))) {
          evt.preventDefault();
        }

      }
    </script>
  </body>

  </html>
<?php
}
?>