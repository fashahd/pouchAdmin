<?=$this->layout->headerlogin()?>
<body class="hold-transition login-page">
  <div class="login-box">
  <!-- /.login-logo -->
    <div class="login-box-body">
      <div class="login-logo">
        <?=$this->layout->logo_color()?>
      </div>
      <form id="adminlogin" action="" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-12" id="loginbutton">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
  <!-- /.login-box-body -->
  </div>
	<?=$this->layout->loadjslogin()?>
</body>
