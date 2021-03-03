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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url()?>bower_components/select2/dist/css/select2.min.css">
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
    <script src="<?=base_url()?>bower_components/select2/dist/js/select2.full.min.js"></script>
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
    <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url()?>assets/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url()?>assets/dist/js/demo.js"></script>
    <!-- page script -->

</head>
<body>
<?php $this->load->view($view) ?>
</body>
