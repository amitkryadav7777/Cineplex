<?php include 'base.php';

if(!isset($_SESSION['username'])){

echo '<title>Cineplex | Home</title>

<link rel="stylesheet" href="css/login.css"/>




<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-lg-5 col-12">
            <div class="text-white register" style="justify-content: center;">
                <div style="align-content: center;">
                

                    <h1>Register As</h1>

                
                <a href="register_user.php" class="btn btn-primary btn-block" style="width: 50%; align-content: center;">User</a>
                <a href="register_cinema.php" class="btn btn-primary btn-block" style="width: 50%">Cinema</a>
                <!-- <a href="/accounts/register_admin" class="btn btn-primary btn-block" style="width: 50%">Admin</a> -->
            </div>
        </div>
        </div>
    </div>
</div>';
}
else{
    echo "You can't access this page!";
}
?>