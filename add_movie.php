<?php include 'base.php' ;
include 'dbconfig.php'; 

if($_SESSION['role'] == 'admin'){

$curuser = $_SESSION["username"];

$select = "SELECT * FROM admin WHERE username='$curuser'";
$result = mysqli_query($dbcon, $select);
if($result){
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $id = $row['admin'];
        }

    }
}

?>
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
            <a class="nav-link" href="admin_dashb.php">
                <i class="fa fa-tachometer"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item active">
            <a class="active-link" href="add_movie.php">
                <i class="fa fa-film"></i>
                <span>Add Movie</span></a>
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
                <h5 class="display-4">Add Movie</h5>
                <hr>
                <?php 
                    if(isset($inserted)){
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Shows added successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';


                    }
                ?>

    <form action="add_movie.php" method="POST" enctype="multipart/form-data" class="text-black cinema" >
         
                <!-- <h style='background-color: grey;color : white; padding: 4px;' >{{ message }}</h> -->
                
                <div class="form-row">
                    <div class="form-group col-12">
                        <label class="form-label" for="movie_name">Movie Name</label>
                        <input class="form-control" type="text" placeholder="Movie Name" name="movie_name" id="movie_name" required>
                    </div></br>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label" for="movie_trailer" >Movie Trailer</label>
                        <input class="form-control" type="text" placeholder="Paste Embed Code Here" name="movie_trailer" id="movie_trailer">
                    </div></br>
                    <div class="form-group col-md-12">
                        <label class="form-label" for="movie_rdate" >Release Date</label>
                        <input class="form-control" type="date" placeholder="Release Date" name="movie_rdate" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="movie_desc" >Movie Desc.</label>
                    <input class="form-control" type="text" placeholder="Movie Description Here" name="movie_desc" required>
                </div>
                <div class="form-row">
               
                 
                </div>
                <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="form-label" for="movie_rt">Movie Rating</label>
                    <input class="form-control" type="text" placeholder="Rating" name="movie_rt" required>
                </div></br>
                <div class="form-group col-md-12">
                    <label class="form-label" for="movie_post">Movie Poster</label></br>
                <input type="file" name="movie_post" accept="image/*" id="movie_post" />
                </div></br>
                  <div class="form-group">
                    <label class="form-label" for="movie_gen" >Movie Genre</label>
                    <input class="form-control" type="text" value="Action | Sci-Fi | Fiction" name="movie_gen" required>
                </div></br>
                 <div class="form-group col-md-12">
                    <label class="form-label" for="movie_dur">Movie Duration</label>
                    <input class="form-control" type="text"  name="movie_dur"  value="2 hrs 30 min">
                </div></br>
               

            </div>

                <input class="btn btn-primary btn-block btn-lg" type="submit" value="ADD">
            </form>
                    
                </div>

        </div>
    </div>
</div>
<!-- End of Content Wrapper -->

<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $movie_name =  $_POST['movie_name'];
        $movie_trailer =  $_POST['movie_trailer'];
        $movie_rdate =  $_POST['movie_rdate'];
        $movie_desc =  $_POST['movie_desc'];
        $movie_rt =  $_POST['movie_rt'];       
        $img = $_FILES['movie_post']['name'];
        $movie_gen =  $_POST['movie_gen'];
        $movie_dur =  $_POST['movie_dur'];
        
        $insert = "INSERT INTO `movie`(`movie_name`, `movie_trailer`, `movie_rdate`, `movie_desc`, `movie_rt`, `movie_post`, `movie_gen`, `movie_dur`, `user`) VALUES ('$movie_name','$movie_trailer','$movie_rdate','$movie_desc','$movie_rt','media/$img','$movie_gen','$movie_dur', '$id')";
        $result = mysqli_query($dbcon, $insert);
        if($result){
            $targetDir = 'media/';
            $targetFile= $targetDir.basename($img);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            move_uploaded_file($_FILES['movie_post']['tmp_name'], $targetFile);
        }
    }

}
else{
    echo '<h1>Sorry...</h1>';
}
?>




 
