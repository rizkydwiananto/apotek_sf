<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIAP | Sahabat Farma</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
   <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/ionicons.min.css">
    
    <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/select2.min.css">
      
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/AdminLTE.min.css">

      <!-- Favicon -->
      <link href="<?=base_url()?>assets/images/foto/logo_apotek_sf.ico" rel="shortcut icon" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>SI</b>-AP</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
          <?php echo $this->session->flashdata('message');?>
          <p class="login-box-msg"><i>Sistem Informasi Apotek Sahabat Farma</i></p>
        <form action="<?=base_url();?>login/auth" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <!--<div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-success btn-block btn-flat">Log In</button>
            </div><!-- /.col -->
          </div>
        </form>

          <br>
          <br>
          <br>
                  <strong>Copyright &copy; 2018 <a href="http://rdnanto.com">rdnanto</a>.</strong> <b class="pull-right">Version 1.0</b>

        <!--<div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <!--<a href="#">I forgot my password</a><br> -->
        <!--<a href="register.html" class="text-center">Register a new membership</a>-->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
   <!-- jQuery 2.1.4 -->
    <script src="<?=base_url();?>assets/dist/js/jQuery-2.1.4.min.js"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
