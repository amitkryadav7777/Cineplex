<?php
include 'dbconfig.php';
session_start();
$msg = '';
$email = '';
if(isset($_COOKIE['usermail'])){
  $email = $_COOKIE['usermail'];
}
setcookie('usermail', $email, time()-120, '/');
if(isset($_POST['submit'])){
  //$otp = $_SESSION['otp'];
  if(isset($_COOKIE['otp'])){
    $otp = $_COOKIE['otp'];
    $submit_otp = $_POST['otp'];
    if($submit_otp == $otp){
      header('location:new_password.php');
    }
    else{
      $msg = 'Enter valid OTP';
    }
  }
  else{
    $msg = 'OTP has been expired.';
  }
}
?>

<style>
  .form-gap {
    padding-top: 70px;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<div class="otpbody" style="background:linear-gradient(45deg, #ce1212, #e77c24); height:100%;width:100%">
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="border-radius:50px;">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Verify OTP</h2>
                  <p style="color :red;"><?php echo $msg; ?></p>
                  <div class="panel-body">
    
                    <form id="register-form" action="" role="form" autocomplete="off" class="form" method="post">

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" class="form-control"  type="email"  value="<?php echo $email; ?>" disabled>
                        </div>
                      </div>  
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                          <input id="otp" name="otp" placeholder="Enter OTP" class="form-control"  type="number">
                        </div>
                      </div>
                      <p style="color :red; float: left;" class="form-input">* Valid for only 2 minutes!</p>
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-primary btn-block" value="Verify OTP" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</div>