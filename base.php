<?php 
session_start();
include 'dbconfig.php';
if (isset($_SESSION["username"])){

}
?>
 <!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="https://kit.fontawesome.com/7dd9aac670.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <!-- <link rel="stylesheet" href="css/login.css"/> -->

    <style>
            .search-text {
                border-radius: 30px 0px 0px 30px;
            }
    
            .search {
                border-radius: 0px 30px 30px 0px;
                width: 45px;
                color: white;
                background: linear-gradient(45deg, #ef2c3f, #dc3545);
            }
    </style>    

</head>
  <body>
      
    <nav class="navbar sticky-top" style="background-color: #0000006b">
        <div class="col-lg-3 col-md-4 col-8">
            <h2 class="text-white"> <a role="button" href="index.php" style="text-decoration: none; color: white;" ><i class="fa fa-video-camera"></i> Cineplex</a></h2>
        </div>
    
       <?php if (isset($_SESSION['username'])){

      echo  '<div class="col-lg-3 col-4">
                <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-user" aria-hidden="true"> '.$_SESSION["username"].'</i> 
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                            
                        if( $_SESSION["role"] == 'cinema'){
                            echo  ' <a class="dropdown-item" href="dashboard.php"> <i class="fa fa-edit"></i> Dashboard</a>';
                        }
                            
                    elseif($_SESSION["role"] == 'user'){ 
                      echo  '<a class="dropdown-item" href="profile.php"> <i class="fa fa-edit"></i> Profile</a>

                            
                        
                            <a class="dropdown-item" href="bookings.php"> <i class="fa fa-ticket"></i> Bookings</a>';
                       }
                     else{                        
                         echo  '<a class="dropdown-item" href="admin_dashb.php"> <i class="fa fa-edit"></i> Dashboard</a>';
                       }

                        echo  '<a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                        </div>
                </div>
        </div>';
        }
        else{
       
       echo '<div class="col-lg-3 col-12 mt-2">
            <div class="row no-gutters">
                <div class="col mr-1">
                    <a class="btn btn-danger d-block" href="register.php" role="button"> Sign Up </a>
                </div>
                <div class="col">
                    <a class="btn btn-danger d-block" href="login.php" role="button"> Sign In </a> 
                </div>
            </div>    
        </div>';
    }
    ?>

        
        
    </nav>

   
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

    

</body>
</html>
