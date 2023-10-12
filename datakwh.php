<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login/login.php");
}


$username = $_SESSION['username'];
include '../../koneksi.php';
$display = $displaynone;
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        $display = "";
    }
}
$data = mysqli_query($koneksi, "SELECT * FROM t_datapengguna WHERE username = '$username'");
while ($d = mysqli_fetch_array($data)) {
?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SIMonitoring | Data Penjualan</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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

            <?php
            include '../layout/header.php';
            ?>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../../dist/img/logo-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $d['nama_pengguna']; ?></p>
                            <a href="#"><i class="fa fa-user text-success"></i>
                                <?php
                                if ($d['level'] == 1) {
                                    echo "Kepala Operator";
                                } else {
                                    echo "Admin Operator";
                                }
                                ?>
                            </a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MENU</li>
                        <li>
                            <a href="../../index.php">
                                <i class="fa fa-home"></i> <span>Beranda</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="../dataplg/dataplg.php">
                                <i class="fa fa-book"></i> <span>Data Pelanggan</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="../datakwh/datakwh.php">
                                <i class="fa fa-book"></i> <span>Data KWh</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="../datava/datava.php">
                                <i class="fa fa-book"></i> <span>Data VA</span>
                            </a>
                        </li>
                        <li style="<?php if ($d['level'] == 2) {
                                        echo $displaynone;
                                    } ?>">
                            <a href="../dataanggota/dataanggota.php">
                                <i class="fa fa-users"></i> <span>Data Anggota</span>
                            </a>
                        </li>
                        <li style="<?php if ($d['level'] == 2) {
                                        echo $displaynone;
                                    } ?>">
                            <a href="../dataadmin/dataadmin.php">
                                <i class="fa fa-user"></i> <span>Data Admin</span>
                            </a>
                        </li>
                        <li style="<?php if ($d['level'] == 1) {
                                        echo $displaynone;
                                    } ?>">
                            <a href="../dataabsen/dataabsen.php">
                                <i class="fa fa-user-secret"></i> <span>Data Absen</span>
                            </a>
                        </li>
                        <li>
                            <a href="../pengaturanakun/pengaturanakun.php">
                                <i class="fa fa-gear"></i> <span>Pengaturan Akun</span>
                            </a>
                        </li>
                        <li class="header" style="<?php if ($d['level'] == 2) {
                                                        echo $displaynone;
                                                    } ?>">LAPORAN</li>
                        <li style="<?php if ($d['level'] == 2) {
                                        echo $displaynone;
                                    } ?>"><a target="_blank" href="../dataadmin/reportdataadmin.php"><i class="fa fa-circle-o"></i> <span>Data Admin</span></a></li>
                        <li style="<?php if ($d['level'] == 2) {
                                        echo $displaynone;
                                    } ?>"><a target="_blank" href="../datapustaka/reportdatapustaka.php"><i class="fa fa-circle-o"></i> <span>Data Pustaka</span></a></li>
                        <li style="<?php if ($d['level'] == 2) {
                                        echo $displaynone;
                                    } ?>"><a target="_blank" href="../dataanggota/reportdataanggota.php"><i class="fa fa-circle-o"></i> <span>Data Anggota</span></a></li>
                        <li style="<?php if ($d['level'] == 2) {
                                        echo $displaynone;
                                    } ?>"><a target="_blank" href="../datapengunjung/reportdatapengunjung.php"><i class="fa fa-circle-o"></i> <span>Data Pengunjung</span></a></li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Data Penjualan Listrik (KWh)
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="active">Data KWh</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="alert alert-danger alert-dismissible" style="<?php echo $display ?>">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Sistem!</h4>
                        Data ini tidak dapat dihapus, karena sudah pernah dilibatkan dalam transaksi.
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="tmbhkwh.php" class="btn btn-default margin-bottom" style="margin-right: 20px;"><i class="fa fa-plus"></i> Tambah Data</a>
                            <a href="cetak.php" target="_blank" class="btn btn-default margin-bottom pull-right"><i class="glyphicon glyphicon-print"></i> Cetak PDF </a>
                            <a href="reportdata.php" class="btn btn-default margin-bottom pull-right"><i class="glyphicon glyphicon-print"></i> Laporan Data Penjualan</a>
                        </div>
                        <!-- /.col -->

                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Tarif Penjualan Listrik</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body ">
                                    <table id="example3" class="table table-bordered table-striped" align="center">
                                        <thead>

                                            <tr>
                                                <th width="10px">#</th>
                                                <th>Periode</th>
                                                <th>Klasifikasi</th>
                                                <th>S</th>
                                                <th>R</th>
                                                <th>B</th>
                                                <th>I</th>
                                                <th>P</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nomor = 1;
                                            $pustaka = mysqli_query($koneksi, "SELECT * FROM t_kwh ORDER BY id_kwh DESC");
                                            while ($p = mysqli_fetch_array($pustaka)) {
                                            ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $nomor; ?>.</td>
                                                    <td><?php echo $p['bulan'] ?></td>
                                                    <td><?php echo $p['pelanggan'] ?></td>
                                                    <td><?php echo $p['kwh_s'] ?></td>
                                                    <td><?php echo $p['kwh_r'] ?></td>
                                                    <td><?php echo $p['kwh_b'] ?></td>
                                                    <td><?php echo $p['kwh_i'] ?></td>
                                                    <td><?php echo $p['kwh_p'] ?></td>
                                                    <td align="right">
                                                        <?=
                                                        $p['total_kwh'];
                                                        ?>
                                                    </td>
                                                    <td width="100px" style="text-align: center;">
                                                        <a href="editdata.php?id=<?php echo $p['id_kwh']; ?>" class="btn btn-default btn-xs btn-flat" style="margin: 0 5px 0 0;"><i class="fa fa-pencil"></i></a>
                                                        <a onclick="deleteme(<?php echo $p['id_kwh']; ?>)" class="btn btn-danger btn-xs btn-flat" style="margin: 0 5px 0 0;"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $nomor++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->

                        <?php

                        // Mengambil data untuk id_kwh 1 dan 2
                        $query12 = "SELECT * FROM t_kwh WHERE id_kwh IN (1, 2)";
                        $result = mysqli_query($koneksi, $query12);

                        // Menginisialisasi total untuk masing-masing tarif
                        $total_s = 0;
                        $total_r = 0;
                        $total_b = 0;
                        $total_i = 0;
                        $total_p = 0;

                        // Mengambil data dan menjumlahkan total untuk masing-masing tarif
                        while ($row = mysqli_fetch_array($result)) {
                            $total_s += $row['kwh_s'];
                            $total_r += $row['kwh_r'];
                            $total_b += $row['kwh_b'];
                            $total_i += $row['kwh_i'];
                            $total_p += $row['kwh_p'];
                        }

                        // Mengupdate data untuk id_plg 3 dengan total yang telah dihitung
                        // $update_query = "UPDATE t_plg SET total_plg = $total WHERE id_plg = 3"; 
                        // $update_query = "UPDATE t_kwh SET kwh_s = $total_s, kwh_r = $total_r, kwh_b = $total_b, kwh_i = $total_i, kwh_p = $total_p WHERE id_kwh = 3";
                        // mysqli_query($koneksi, $update_query);

                        ?>

                        <div class="col-xs-2">
                            <div class="small-box" style="background-color: rgb(255, 230, 0);">
                                <div class="inner">
                                    <h4 class="info-box-text h3">Tarif S</h4>
                                    <span class="info-box-number">
                                        <?= $total_s; ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                                <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-xs-2">
                            <!-- <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>Tarif R</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div> -->
                            <div class="small-box" style="background-color: rgb(255, 19, 19);">
                                <div class="inner">
                                    <h4 class="info-box-text h3">Tarif R</h4>
                                    <span class="info-box-number">
                                        <?php
                                        // $dpengunjung['totalpengunjung'];
                                        echo $total_r;
                                        ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                                <div class="icon"><i class="fa fa-bell"></i></div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-xs-2">
                            <div class="small-box" style="background-color: rgb(11, 122, 16);">
                                <div class="inner">
                                    <h4 class="info-box-text h3">Tarif B</h4>
                                    <span class="info-box-number"><?= $total_b; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                                <div class="icon"><i class="fa fa-flag"></i></div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-xs-2">
                            <div class="small-box" style="background-color: rgb(255, 68, 0);">
                                <div class="inner">
                                    <h4 class="info-box-text h3">Tarif I</h4>
                                    <span class="info-box-number"><?= $total_i; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                                <div class="icon"><i class="fa fa-snowflake-o"></i></div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-xs-2">
                            <div class="small-box" style="background-color: rgb(8, 139, 139);">
                                <div class="inner">
                                    <h4 class="info-box-text h3">Tarif P</h4>
                                    <span class="info-box-number"><?= $total_p; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                                <div class="icon"><i class="fa fa-cloud"></i></div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div> <!-- /.row -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Versi</b> 1.0
                </div>
                <strong>Copyright &copy; 2023 PT. PLN UP3 KOTA GORONTALO <small> | Alright reversed </small> </strong>
            </footer>


        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../dist/js/demo.js"></script>
        <!-- page script -->
        <script>
            $(function() {
                $('#example1').DataTable()
                $('#example2').DataTable()
                $('#example3').DataTable({
                    'paging': true,
                    'lengthChange': true,
                    'searching': true,
                    'ordering': true,
                    'info': true,
                    'autoWidth': true
                })
            })
        </script>
        <script type="text/javascript">
            function deleteme(delid) {
                if (confirm("Yakin ingin menghapus?")) {
                    window.location.href = 'hapus-proses.php?del_id=' + delid + '';
                    return true;
                }
            }
        </script>
    </body>

    </html>
<?php
}
?>