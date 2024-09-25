<?php
include 'dbconfig.php';
session_start();

$msg = "";
            // //These must be at the top of your script, not inside a function
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

            require 'src/Exception.php';
            require 'src/PHPMailer.php';
            require 'src/SMTP.php';
if(isset($_POST['submit'])){
  $mail = '';
  if(isset($_POST['email'])){
    $mail = $_POST['email'];
  }
  $username = '';
  if(isset($_POST['username'])){
    $username = $_POST['username'];
  }
  $rand = rand(000000,999999);

  $selecta = "SELECT * FROM user WHERE email='$mail' OR username='$username'";
  $resulta = mysqli_query($dbcon, $selecta);

  $selectb = "SELECT * FROM cinema WHERE email='$mail' OR username='$username'";
  $resultb = mysqli_query($dbcon, $selectb);

  $selectc = "SELECT * FROM admin WHERE email='$mail' OR username='$username'";
  $resultc = mysqli_query($dbcon, $selectc);

    if (mysqli_num_rows($resulta) > 0){
      while ($row = mysqli_fetch_assoc($resulta)){
          $fname = $row['fname'];
          $email = $row['email'];
          $subject = "Verification Code";
          $body = "Hii $fname,
                      This is your verification code to reset your password : $rand 
                      Valid for only 2 minutes!";
          
            //$_SESSION['otp'] = $rand;
            setcookie('otp', $rand, time()+120, '/');

            //Import PHPMailer classes into the global namespace


            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'VIVEK & PRIY @gmail.com';                     //SMTP username
                $mail->Password   = '****************';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('VIVEK & PRIY @gmail.com', 'Cineplex');
                $mail->addAddress($email, $fname);     //Add a recipient
                $mail->addReplyTo($email, 'Information');

                // //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $body;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';

                setcookie('usermail', $email, time()+120, '/');

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                $msg = "Email can't send.";
                break;
            }
            echo '
                  <script>
                    window.onload = function() {
                      window.location.href = "otp.php";
                    }
                  </script>';
          }

        }               

    elseif (mysqli_num_rows($resultb) > 0){
      while ($row = mysqli_fetch_assoc($resultb)){
           $cname = $row['cinema_name'];
           $email = $row['email'];

          $subject = "Verification Code";
          $body = "Hii $cname,
                      This is your verification code to reset your password : $rand 
                      Valid for only 2 minutes!"; 

            setcookie('otp', $rand, time()+120, '/');

            //$_SESSION['otp'] = $rand;
            //Import PHPMailer classes into the global namespace


            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'VIVEK & PRIY @gmail.com';                     //SMTP username
                $mail->Password   = '****************';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('VIVEK & PRIY @gmail.com', 'Cineplex');
                $mail->addAddress($email, $cname);     //Add a recipient
                $mail->addReplyTo($email, 'Information');

                // //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $body;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
                setcookie('usermail', $email, time()+120, '/');

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                $msg = "Email can't send.";
                break;
            }
            echo '
                  <script>
                    window.onload = function() {
                      window.location.href = "otp.php";
                    }
                  </script>';               
      }
    }   

    elseif (mysqli_num_rows($resultc) > 0){
      while ($row = mysqli_fetch_assoc($resultc)){
           $fname = $row['fname'];
           $email = $row['email'];
          $subject = "Verification Code";
          $body = "Hii $fname,
                      This is your verification code to reset your password : $rand 
                      Valid for only 2 minutes!";

            setcookie('otp', $rand, time()+120, '/');

            //$_SESSION['otp'] = $rand;
            //Import PHPMailer classes into the global namespace


            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'VIVEK & PRIY @gmail.com';                     //SMTP username
                $mail->Password   = '****************';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('VIVEK & PRIY @gmail.com', 'Cineplex');
                $mail->addAddress($email, $fname);     //Add a recipient
                $mail->addReplyTo($email, 'Information');

                // //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $body;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
                setcookie('usermail', $email, time()+120, '/');

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                $msg = "Email can't send.";
                break;
            }
            echo '
                  <script>
                    window.onload = function() {
                      window.location.href = "otp.php";
                    }
                  </script>';             
      }
    }
  
  else{
    $msg = "Enter valid username or email address."; 
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
<div class="forgetbody" style="background:linear-gradient(45deg, #ce1212, #e77c24); height:100%;width:100%">
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="border-radius:50px;">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p style="color :red;"><?php echo $msg; ?></p>
                  <div class="panel-body">
    
                    <form id="register-form" action="" role="form" autocomplete="off" class="form" method="post">
                  
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="username" name="username" placeholder="Username" class="form-control"  type="text">
                        </div>
                      </div>
                      <h style="color: grey;">OR</h>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
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
