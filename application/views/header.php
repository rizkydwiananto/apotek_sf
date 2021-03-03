<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sahabat Farma | <?php echo $title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url()?>assets/ionic-2.0.1/ionicons.min.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css" type="text/css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css" type="text/css">
    <!-- Favicon -->
    <link href="<?=base_url()?>assets/images/foto/logo_apotek_sf.ico" rel="shortcut icon" />
    <!-- Pace style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/pace/pace.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- jQuery 2.2.3 -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?=base_url()?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- PACE -->
    <script src="<?=base_url()?>assets/bower_components/PACE/pace.min.js"></script>
    <!-- InputMask -->
    <script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src=".<?=base_url()?>assets/bower_components/moment/min/moment.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- DataTables -->
    <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url()?>assets/dist/js/demo.js"></script>
    <!-- page script -->

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b>IAP</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>SI</b> - <b>AP</b>otek</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a>
                            <i class="fa fa-medkit margin-r-5"></i> APOTEK <b>SAHABAT FARMA</b>
                        </a>
                    </li>

                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <?php
                            $tglaw = date('Y-m-01');
                            $tglak = date('Y-m-31');
                            $this->db->where('expired >=',$tglaw);
                            $this->db->where('expired <=',$tglak);
                            $query = $this->db->get('barang');
                            $num = $query->num_rows();

                            $tglaw = date('Y-m-01', strtotime('+30 days'));
                            $tglak = date('Y-m-31', strtotime('+30 days'));
                            $this->db->where('expired >=',$tglaw);
                            $this->db->where('expired <=',$tglak);
                            $query = $this->db->get('barang');
                            $num_first = $query->num_rows();

                            $tglaw = date('Y-m-01', strtotime('+61 days'));
                            $tglak = date('Y-m-31', strtotime('+61 days'));
                            $this->db->where('expired >=',$tglaw);
                            $this->db->where('expired <=',$tglak);
                            $query = $this->db->get('barang');
                            $num_second = $query->num_rows();

                            $tglaw = date('Y-m-01', strtotime('+92 days'));
                            $tglak = date('Y-m-31', strtotime('+92 days'));
                            $this->db->where('expired >=',$tglaw);
                            $this->db->where('expired <=',$tglak);
                            $query = $this->db->get('barang');
                            $num_third = $query->num_rows();

                            $hsl_ed = $num+$num_first+$num_second+$num_third;
                            ?>

                            <i class="fa fa-history"> ed</i>
                            <span class="label label-danger"><?php  echo $hsl_ed; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Ada <b><?php  echo $hsl_ed; ?></b> obat yang mendekati expired</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-history text-red"></i> Mendekati ED bulan <?php echo date('F Y', strtotime(date('Y-m-d')))?> <b>(<?php echo $num; ?>)</b>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-history text-red"></i> Mendekati ED bulan <?php echo date('F Y', strtotime('+ 1 month', strtotime(date('Y-m-d'))))?> <b>(<?php echo $num_first; ?>)</b>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-history text-red"></i> Mendekati ED bulan <?php echo date('F Y', strtotime('+ 2 month', strtotime(date('Y-m-d'))))?> <b>(<?php echo $num_second; ?>)</b>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="fa fa-history text-red"></i> Mendekati ED bulan <?php echo date('F Y', strtotime('+ 3 month', strtotime(date('Y-m-d'))))?> <b>(<?php echo $num_third; ?>)</b>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?=base_url()?>assets/images/user/300/default.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $this->session->userdata("username"); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?=base_url()?>assets/images/user/300/default.jpg" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $this->session->userdata("nama_user"); ?><br>
                                    - <?php echo $this->session->userdata("akses"); ?> -
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?=base_url();?>login/out" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

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
                    <img src="<?=base_url()?>assets/images/user/300/default.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $this->session->userdata("nama_user"); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">NAVIGASI UTAMA</li>

                <li class="treeview <?php if ($title == 'Main Menu') { echo "active";} ?>">
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url();?>dashboard"><i class="fa fa-circle-o"></i> Main Menu</a></li>
                    </ul>
                </li>

                <li class="treeview <?php if ($title == 'Data User') { echo "active";}
                                        elseif ($title == 'Profil') {echo "active";}
                                        elseif ($title == 'Tambah User') {echo "active";}?>">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>User</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php
                            if ($_SESSION['akses'] == 'Super Admin') {
                                echo '<li><a href="http://localhost/apotek_sf/user"><i class="fa fa-circle-o"></i> Data User</a></li>';
                            } elseif ($_SESSION['akses'] == 'Apoteker') {
                                echo '<li><a href="http://localhost/apotek_sf/user"><i class="fa fa-circle-o"></i> Data User</a></li>'

                        ?>
                        <?php } ?>
                        <li><a href="<?=base_url();?>user/profil"><i class="fa fa-circle-o"></i> Profil</a></li>
                    </ul>
                </li>

                <li class="treeview <?php if ($title == 'Data Barang') { echo "active";}
                                        elseif ($title == 'Tambah Barang') {echo "active";}
                                        elseif ($title == 'Data Jenis Barang') {echo "active";}
                                        elseif ($title == 'Tambah Jenis Barang') {echo "active";}
                                        elseif ($title == 'Data Satuan Barang') {echo "active";}
                                        elseif ($title == 'Tambah Satuan Barang') {echo "active";}?> ">
                    <a href="#">
                        <i class="fa fa-cube"></i>
                        <span>Barang</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url();?>barang"><i class="fa fa-circle-o"></i>Stock</a></li>
                        <?php
                        if ($_SESSION['akses'] !== 'Kasir') {
                        ?>
                        <li><a href="<?=base_url();?>barang/jenis_brg"><i class="fa fa-circle-o"></i>Jenis</a></li>
                        <li><a href="<?=base_url();?>barang/satuan_brg"><i class="fa fa-circle-o"></i>Satuan</a></li>
                        <?php } ?>
                    </ul>
                </li>

                <?php
                if ($_SESSION['akses'] !== 'Kasir') {
                ?>
                <li class="treeview <?php if ($title == 'Data Supplier') { echo "active";}
                                        elseif ($title == 'Tambah Supplier') {echo "active";}
                                        elseif ($title == 'Edit Supplier') {echo "active";}
                                        elseif ($title == 'Data Pembelian') {echo "active";}
                                        elseif ($title == 'Tambah Pembelian') {echo "active";}
                                        elseif ($title == 'Detail Pembelian') {echo "active";}
                                        elseif ($title == 'Data Terima Barang') {echo "active";}
                                        elseif ($title == 'Tambah Terima Barang') {echo "active";}
                                        elseif ($title == 'Edit Terima Barang') {echo "active";} ?> ">
                    <a href="#">
                        <i class="fa fa-shopping-basket"></i>
                        <span>Pembelian</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url();?>pembelian/supplier"><i class="fa fa-circle-o"></i>Supplier</a></li>
                        <li><a href="<?=base_url();?>pembelian"><i class="fa fa-circle-o"></i>Data Pembelian</a></li>
                        <li><a href="<?=base_url();?>pembelian/terima_barang"><i class="fa fa-circle-o"></i>Data Terima Barang</a></li>
                    </ul>
                </li>
                <?php } ?>

                <li class="treeview <?php if ($title == 'Data Penjualan') { echo "active";}
                                    elseif ($title == 'Kasir') {echo "active";}
                                    elseif ($title == 'Detail Penjualan') {echo "active";}?> ">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Penjualan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url();?>penjualan"><i class="fa fa-circle-o"></i>Data Penjualan</a></li>
                        <li><a href="<?=base_url();?>penjualan/kasir"><i class="fa fa-circle-o"></i>Kasir</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder-open"></i>
                        <span>Laporan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url();?>laporan/rekap_pembelian"><i class="fa fa-circle-o"></i>Rekap Pembelian</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Rekap Penjualan</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Rekap Terima Barang</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Data Penerimaan Per Barang</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Data Penjualan Per Barang</a></li>
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1><?php echo $title; ?></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="#"><?php echo $title; ?></a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                        <!-- /.box-header -->
                        <?php $this->load->view($view) ?>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2018 <a href="http://rdnanto.com">rdnanto</a>.</strong>
    </footer>
</div>
<!-- ./wrapper -->



<!-- TABLE -->
<script>
    $(function () {
        $('#example1').DataTable();
        $('#example3').DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

        //Date picker
        $('#datepicker1').datepicker({
            orientation: "bottom",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        })
        $('#datepicker2').datepicker({
            orientation: "bottom",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        })

        //Initialize Select2 Elements
        $('.select2').select2()
    });
</script>

<!-- LOADING PACE (yang loading jalan diatas) -->
<script type="text/javascript">
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function () {
        Pace.restart()
    })
    $('.ajax').click(function () {
        $.ajax({
            url: '#', success: function (result) {
                $('.ajax-content').html('<hr>Ajax Request Completed !')
            }
        })
    })
</script>


</body>
</html>
