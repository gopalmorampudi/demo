<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin log in</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="./dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="./plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
   
  </head>
  <center>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="./index2.html"><b>Admin</b>Login</a>
      </div>
      <div class="login-box-body">
	   <p class="login-box-msg" >
	   <?php
	   if(isset($_SESSION['forgot'])){
		   if($_SESSION['forgot']=='success'){
		echo '<font color=green>Password is sent to your mail</font>';   
	   }else{
		   echo '<font color=red>Password is sending failed</font>';
	   }
	   }
	   ?>
	   </p>
        <p class="login-box-msg">Sign in</p>
        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username"class="form-control" placeholder="username" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password"class="form-control" placeholder="Password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <a href="adminForgotPassword.php">forgot password</a>
              </div>
            </div>
			
            <div class="col-xs-4">
			
              <button type="submit" name="action" value="admin_login" class="btn btn-primary btn-block btn-flat">Sign In</button>
			 
            </div>
          </div>
        </form>
   
  </body>
   </center>
</html>
