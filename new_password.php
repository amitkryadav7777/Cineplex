<?php
include 'dbconfig.php';
session_start();
$msg = '';
if(isset($_POST['submit'])){
  $pass = $_POST['password'];
  $password = password_hash($pass, PASSWORD_DEFAULT);
  $cpassword = $_POST['cpassword'];
  if($pass == $cpassword){
    $updatea = "UPDATE user SET password ='$password'";
    $resulta = mysqli_query($dbcon, $updatea);

    $updateb = "UPDATE cinema SET password ='$password'";
    $resultb = mysqli_query($dbcon, $updateb);

    $updatec = "UPDATE user SET password ='$password'";
    $resultc = mysqli_query($dbcon, $updatec);
    if($resulta or $resultb or $resultc){
      header('location:login.php');
    }
    else{
      $msg = "Password not updated.";
    }
  }
  else{
    $msg = "Password and Confirm Password did'nt match.";
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
<div class="newpass" style="background:linear-gradient(45deg, #ce1212, #e77c24); height:100%;width:100%">
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="border-radius:50px;">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Enter New Password</h2>
                  <p style="color :red;"><?php echo $msg; ?></p>
                  <div class="panel-body">
    
                    <form id="register-form" action="" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                          <input id="password" name="password" placeholder="Enter new password" class="form-control"  type="text" required>
                        </div>
                      </div>                     
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                          <input id="cpassword" name="cpassword" placeholder="Confirm password" class="form-control"  type="text" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-primary btn-block" value="Set Password" type="submit">
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