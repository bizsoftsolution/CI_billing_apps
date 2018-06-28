<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

   <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url();?>css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url();?>css/iCheck/iCheck/square/blue.css" rel="stylesheet" type="text/css" />


</head>

 <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>Admin Login</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"><strong style="color:blue;"></strong></p>
        <form action="<?php echo base_url();?>login/validate" method="post">

          <?php $msg = $this->session->flashdata('msg');
              if((isset($msg)) && (!empty($msg))) { ?>
          <div id="message" class="alert alert-danger">
            <?php print_r($msg); ?>
            </div>
            <?php } ?>
            </br></br>

          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username" />
            <span class="fa fa-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" />
            <span class="fa fa-lock form-control-feedback"></span>
          </div>
          <div class="row">
           
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col -->
          </div>
        </form>

       
      

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    
    <script src="<?php echo base_url();?>asset/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
    <!-- jQuery -->
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

