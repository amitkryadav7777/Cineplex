<?php include 'base.php';
include 'dbconfig.php';

if($_SESSION['role'] == 'cinema'){

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

        <li class="nav-item">
            <a class="nav-link" href="add_shows.php">
                <i class="fa fa-ticket"></i>
                <span>Add Shows</span></a>
        </li>
        <li class="nav-item active">
            <a class="active-link" href="earnings.php">
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
                <h5 class="display-4">Total Sales at '; echo $_SESSION['cname']; echo '</h5>
                <hr>
                <div style="background-color: #404040;padding: 7px;">';

                $cinema = $_SESSION['cinema'];
                $selecta = "SELECT * FROM shows WHERE cinema_id='$cinema'";
                $resulta = mysqli_query($dbcon, $selecta);
                $gtotal = 0;
                    if($resulta){
                        if (mysqli_num_rows($resulta) > 0){
                            while ($row = mysqli_fetch_assoc($resulta)){
                                $shows_id = $row['shows'];                
                                $selectb = "SELECT SUM(price)  AS sum FROM bookings WHERE shows_id='$shows_id'";
                                $resultb = mysqli_query($dbcon, $selectb);
                                if($resultb){
                                    if (mysqli_num_rows($resultb) > 0){
                                        while ($row = mysqli_fetch_assoc($resultb)){
                                            $total = $row['sum'];
                                        }
                                    }
                                }
                                $gtotal = $gtotal+$total;
                                
                            }
                        }
                    }
                echo '
                 <h style="color: white;font-size: 1.5rem;margin-left:10px;">Total Earnings   :   Rs '.$gtotal.'</h>';

                 echo '
                </div>
                <div class="row p-4">
                        <table class="table shadow text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" width="5%">ID</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Movie</th>
                                        <th scope="col">Seat</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>';
                              
                                    $cinema = $_SESSION['cinema'];
                                    $selecta = "SELECT *  FROM shows WHERE cinema_id='$cinema'";
                                    $resulta = mysqli_query($dbcon, $selecta);
                                    if($resulta){
                                        if (mysqli_num_rows($resulta) > 0){
                                            while ($row = mysqli_fetch_assoc($resulta)){
                                                $shows = $row['shows'];             
                                                $time = $row['time'];
                                                $date = $row['date'];
                                                $movie_id = $row['movie_id'];
                                                $selectb = "SELECT *  FROM movie WHERE movie='$movie_id'";
                                                $resultb = mysqli_query($dbcon, $selectb);
                                                if (mysqli_num_rows($resultb) > 0){
                                                    while ($row = mysqli_fetch_assoc($resultb)){
                                                        $movie_name = $row['movie_name'];
                                                    }
                                                }

                                                $selectc = "SELECT *  FROM bookings WHERE shows_id='$shows'";
                                                $resultc = mysqli_query($dbcon, $selectc);
                                                if($resultc){
                                                    if (mysqli_num_rows($resultc) > 0){
                                                        while ($row = mysqli_fetch_assoc($resultc)){
                                                            $id = $row['id'];
                                                            $useat = $row['useat'];
                                                            $price = $row['price'];
                                                            $user_id = $row['user_id'];
                                                            $selectd = "SELECT *  FROM user WHERE user='$user_id'";
                                                            $resultd = mysqli_query($dbcon, $selectd);
                                                            if($resultd){
                                                                if (mysqli_num_rows($resultd) > 0){
                                                                    while ($row = mysqli_fetch_assoc($resultd)){
                                                                        $fname = $row['fname'];
                                                                    }
                                                                }
                                                            }                                               
                                                            echo '
                                                                <tr>
                                                                    <th scope="row">'.$id.'</th>
                                                                    <th scope="row">'.$fname.'</th>
                                                                    <th scope="row">'.$movie_name.'</th>
                                                                    <th scope="row">'.$useat.'</th>
                                                                    <th scope="row">'.$time.'</th>
                                                                    <th scope="row">'.$date.'</th>
                                                                    <th scope="row">Rs '.$price.'</th>
                                                                </tr>';
                                                        }
                                                    }
                                                }
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

