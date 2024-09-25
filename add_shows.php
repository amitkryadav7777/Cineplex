<?php include 'base.php';
include 'dbconfig.php';

if($_SESSION['role'] == 'cinema'){


$cname = $_SESSION['cname'];
$select = "SELECT * FROM cinema WHERE cinema_name = '$cname'";
$result = mysqli_query($dbcon, $select);
    if($result){
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $cinema = $row['cinema'];
            }
        }
    }
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $m = $_POST['m'];
    $d = $_POST['d'];
    $t = $_POST['t'];
    $p = $_POST['p'];
    $insert = "INSERT INTO `shows`(`price`, `time`, `date`, `cinema_id`, `movie_id`) VALUES ('$p','$t','$d','$cinema','$m')";
    $result = mysqli_query($dbcon, $insert);
    if($result){
        $showsadded = true;
        echo '
        <script>
            window.onload = function() {
                window.location.href = "add_shows.php";
            }
        </script>';
    }
}

echo '
<title>Cineplex | Profile</title>

<style>
    #wrapper {
        display: flex;
        margin-top: -62px;
    }

    .sidebar {
        width: 19rem !important;
        background: linear-gradient(0deg, #2196F3, #00106b);
        padding-top: 80px;
    }

    #content-wrapper {
        background-color: #e6e6e6;
        width: 100%;
        height: 100vh;
        padding-top: 60px;
        overflow-x: hidden;
    }

    .active {
        background: white;
        box-shadow: -1px 1px 13px 2px;
    }

    .nav-item:hover {
        background: #e0e0e0;
        box-shadow: -1px 1px 13px 2px;
    }

    .active-link,
    .nav-link:hover {
        color: #021045;
        display: block;
        padding: .5rem 0rem;
    }

    .nav-item {
        padding: 0px 20px;
        border-radius: 10px;
        margin: 5px 5px;
    }

    .nav-item a {
        font-size: 19px;
        font-weight: 500;
        text-decoration: none;
        color: #021045;
    }

    a.nav-link {
        color: white;
    }

    i {
        padding-right: 5px;
    }

    .round {
        padding: 20px;
        border-radius: 20px;
        min-height: 250px;
    }

    .poster {
        margin: 15px;

    }
</style>



<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar ">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <i class="fa fa-tachometer"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item active">
            <a class="active-link" href="add_shows.php">
                <i class="fa fa-ticket"></i>
                <span>Add Shows</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="earnings.php">
                <i class="fas fa-rupee-sign"></i>
                <span>Earnings</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span></a>
        </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="row m-3">
            <div class="col-12 card round">
                <h5 class="display-4">Add Shows at '; echo $_SESSION['cname']; echo '</h5>
                <hr>';


              
                   
            if(isset($showsadded)){
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Shows added successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';


            }
                
            echo '
                <div class="row p-4">
                    <div class="col-12">
                        <form action="" method="POST">
                                
                            <div class="form-row justify-content-center">
                                <div class="col-5">
                                    <select id="inputState" class="form-control" name="m" required>
                                       <option>Choose Movie</option>';
                                    
                                        $select = "SELECT * FROM movie";
                                        $result = mysqli_query($dbcon, $select);
                                        if($result){
                                            if (mysqli_num_rows($result) > 0){
                                                while ($row = mysqli_fetch_assoc($result)){
                                                    $movie = $row['movie'];
                                                  echo '<option value="'.$movie.'">'.$row['movie_name'].'</option>';
                                                   
                                                }
                                            }
                                        }
                                       
                                       echo ' 
                                    </select>
                                </div>
                                <div class="col-3">
                                    <input type="date" class="form-control" placeholder="Date" name="d" required>
                                </div>
                                <div class="col-2">
                                    <input type="time" class="form-control" placeholder="Time" name="t" required>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" placeholder="Ticket Price (Rs)" name="p" required>
                                </div>
                            </div>
                            <div class="col-3 mt-4">
                                <input type="submit" class="btn btn-block btn-primary">
                            </div>
                    </div>
                    </form>
                </div>
                <div ><span><h3 style="font-weight:355;"> All Movies </h3></span><hr></div>
                <div class="row">';
                  
                $select = 'SELECT * FROM movie';
                $result = mysqli_query($dbcon, $select);
                if($result){
                    if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            $name = $row['movie_name'];
                            $movie_post = $row['movie_post'];
                            echo '
                            <div class="col-12 col-md-6 col-lg-3 mb-5">
                                <a href="movies.php?movieid='.$row['movie'].'">
                                    <div class="card shadow" style="width: 14rem; margin:0px auto;">
                                        <img src="'.$row['movie_post'].'" class="card-img-top" height="230px" alt="Movie">
                                        <div class="card-body p-2">
                                            <h4 class="card-title text-center">'.$row['movie_name'].'</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>'; 
                        }
                    }
                }

               
                echo '              
                </div>
               
            </div>


            <div class="col-12 card round mt-2">
                    <h3 class="">All Shows at '; echo $_SESSION['cname']; echo '</h3>
                    <hr>

                    <table class="table shadow text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" width="5%">ID</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Date (YYYY-MM-DD)</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Movie</th>
                                </tr>
                            </thead>
                            <tbody>';
                                
                        
                            $select = "SELECT * FROM shows WHERE cinema_id = '$cinema'";
                            $result = mysqli_query($dbcon, $select);
                                if($result){
                                    if (mysqli_num_rows($result) > 0){
                                        while ($row = mysqli_fetch_assoc($result)){
                                            $movie_id = $row['movie_id'];
                                            

                                        echo '
                                            <tr>
                                                <th scope="row">'.$row['shows'].'</th>
                                                <td>'.$row['time'].'</td>
                                                <td>'.$row['date'].'</td>
                                                <td>Rs. '.$row['price'].'</td>
                                                <td>';
                                                $selectm = "SELECT * FROM movie WHERE movie = '$movie_id'";
                                                $resultm = mysqli_query($dbcon, $selectm);
                                                if($resultm){
                                                    if (mysqli_num_rows($resultm) > 0){
                                                        while ($row = mysqli_fetch_assoc($resultm)){
                                                            echo $row['movie_name'];
                                                    }
                                                }
                                            }echo '</td>
                                            </tr>';
                                        }
                                    }
                                }
                           echo '
                            </tbody>
                        </table>
                    
                </div>

        </div>
    </div>
</div>
<!-- End of Content Wrapper -->

</div>';

}

else{
    echo '<h1>Sorry...</h1>';
}
