<?php include 'base.php';
include 'dbconfig.php'; 
$update = 0;
if($_SESSION['role'] == 'user'){
    $user = $_SESSION['user'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $selects = "SELECT * FROM user WHERE user='$user'";
                        $results = mysqli_query($dbcon, $selects);
                        if($results){
                            if (mysqli_num_rows($results) > 0){
                                while ($row = mysqli_fetch_assoc($results)){
                                    $old = $row['password']; 
                                    $user_id = $_POST['user'];               
                                    $username = $_POST['username'];
                                    $fname = $_POST['fname'];                               
                                    $lname = $_POST['lname'];
                                    $email = $_POST['email'];
                                    $oldpass = $_POST['oldpass'];
                                    $pass = $_POST['password'];
                                    $password = password_hash($pass, PASSWORD_DEFAULT);
                                    if(password_verify($oldpass, $old)){
                                        $update = "UPDATE `user` SET `user`='$user_id',`username`='$username',`fname`='$fname',`lname`='$lname',`email`='$email',`password`='$password',`role`='user' WHERE user='$user'";
                                        $result = mysqli_query($dbcon, $update);
                                        if($result){
                                            $update = 1;
 
                                        }
                                    }
                                    else{
                                        $update = 2;
                                    }
                                }
                            }
                        }
    }    
    echo '
<title>Cineplex | Profile</title>
<style>
    body {
        background-image: linear-gradient(250deg, #dc3545, #FF9800);
        height: 100vh;
    }

    .imge {
        background-image: url(images/customer.png);
        max-height: 450px;
        background-size: cover;
        background-position: -120px 0px;
        border-radius: 20px 0px 0px 20px;
    }

    .bck {
        border-radius: 20px;
        border: none;
    }

    label {
        margin: 10px 0px 3px 0px;
    }

    .submit {
        background-image: linear-gradient(25deg, #fa8a09, #df3e3f);
        color: white;
        border: none;
        margin-top: 12%;
    }

    .submit:hover {
        background-color : #cc2333;
        color : white;
        background-image: none;
    }

    .alert {
        bottom: 5px;
        right: 25px;
        position: absolute;
        z-index: 15;
        width: 500px;
    }
</style>

<div class="container-fluid">
';
if($update == 1){
echo ' 
    <div class="alert alert fade show alert-success" role="alert">
        Successfuly updated.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
if($update == 2){
echo ' 
    <div class="alert alert fade show alert-danger" role="alert">
        Old Password did not match!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}

                    
                        $select = "SELECT * FROM user WHERE user='$user'";
                        $result = mysqli_query($dbcon, $select);
                        if($result){
                            if (mysqli_num_rows($result) > 0){
                                while ($row = mysqli_fetch_assoc($result)){
                        echo  ' 
   
    
    <div class="row justify-content-center">
        <div class="col-8 card shadow mt-5 bck">
            <div class="row">
                <div class="col-4 imge"></div>
                <div class="col-8 p-4">

                    <form action="profile.php" method="POST">

                        <div class="form-group row justify-content-center">
                            <div class="col-12">
                            <input type="hidden" value="'.$row['user'].'" class="form-control" name="user">
                                <label>Username</label>
                                <input type="text" value="'.$row['username'].'" class="form-control" name="username" required>
                            </div>
                            <div class="col-6">
                                <label>First Name</label>
                                <input type="text" value="'.$row['fname'].'" class="form-control" name="fname" required>
                            </div>
                            <div class="col-6">
                                <label>Last Name</label>
                                <input type="text" value="'.$row['lname'].'" class="form-control" name="lname" required>
                            </div>
                            <div class="col-12">
                                <label>E-mail</label>
                                <input type="text" value="'.$row['email'].'" class="form-control" name="email" required>
                            </div>
                            <div class="col-6">
                                <label>Old Password</label>
                                <input type="password" class="form-control" name="oldpass" required>
                            </div>
                            <div class="col-6">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-lg btn-block submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>';
          }
        }
    }
        
    
    echo '
    </div>';
}
else{
    echo '<h1>Sorry...</h1>';
}
?>