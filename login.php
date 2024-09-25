<?php include 'base.php'; 
if(!isset($_SESSION['username'])){

echo '
<title>Cineplex | Home</title>
<link rel="stylesheet" href="css/login.css"/>


<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-md-5 col-10 login">';
        if(isset($_COOKIE['loggedin'])){
                    echo '
            <div class="alert alert-danger" role="alert">
                 Invalid credentials.
            </div>';
            setcookie("loggedin", "false", time()-60, "/");

        }
            
       

            echo '
            <form action="after_login.php" method="POST" class="text-white">
                
               

                <h1>Login</h1>
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="username" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="password" required>
                </div>
                <a href="forget.php" style="color : #e77c24;"> Forgot Password?</a></br>
                <input class="btn btn-primary btn-lg" type="submit" value="Login">
            </form>
        </div>
    </div>
</div>';
}
else{
    echo "You are already logged in!";
}
?>