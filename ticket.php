<?php include 'base.php'; 
include 'dbconfig.php';
?>
<title>Cineplex</title>

<style>
  body {
    background: #2196f34a;
  }

  .title {
    padding: 10px;
    color: white;
    text-decoration: none;
  }

  .card {
    margin: 100px auto;
    border-radius: 10px;
    border: none;
  }

  .pass-h {
    border-radius: 10px 10px 0px 0px;
    background: linear-gradient(45deg, red, #ff4343);
}

  .info {
    line-height: 40px;
    background: #000;
    color: white;
    font-size: 20px;
    border: solid 1px;
    border-right: 0px;
    border-radius: 50px 0px 0px 50px;
  }

  h3 span {
    font-weight: 400;
  }
</style>

<?php 
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $book_id = $_GET['book_id'];
    $select = "SELECT * FROM bookings WHERE id='$book_id'";
    $result = mysqli_query($dbcon, $select);
    if($result){
      if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
          $book_id = $row['id'];
          $useat = $row['useat'];
          $price = $row['price'];
          $shows_id = $row['shows_id'];
          $user_id = $row['user_id'];
        }
      }
    }
    $select = "SELECT shows.date, shows.time, shows.movie_id, shows.cinema_id FROM shows WHERE shows='$shows_id'";
    $result = mysqli_query($dbcon, $select);
    if($result){
      if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
          $date = $row['date'];
          $time = $row['time'];
          $cinema_id = $row['cinema_id'];
          $movie_id = $row['movie_id'];
        }
      }
    }
    $select = "SELECT cinema.cinema_name, movie.movie_name, cinema.cinema_address FROM cinema, movie WHERE cinema='$cinema_id' AND movie=$movie_id";
    $result = mysqli_query($dbcon, $select);
    if($result){
      if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
          $cinema_name = $row['cinema_name'];
          $movie_name = $row['movie_name'];
          $cinema_address = $row['cinema_address'];
        }
      }
    }

echo '
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-8 card shadow">
      <div class="row justify-content-around pass-h title">
        <div class="col-4">
          <h2> <i class="fa fa-video-camera"></i> Cineplex  </h2>
        </div>
        <div class="col-6">
          <h2 style="text-align:center">'.$movie_name.' ('.$cinema_name.')</h2>
        </div>
      </div>
      <div class="row mt-4 mb-4">
        <div class="col-3">
          <img class="img-fluid shadow-sm border"
            src="https://www.ruletech.com.au/wp-content/uploads/2018/06/qr-code-rule-website.png">
        </div>
        <div class="col-9">
          <div class="row">
            <div class="col-6">
              <h3>Booking ID :<span> '.$book_id.' </span> </h3>
              <h3>Date :<span> '.$date.'</span> </h3>
              <h3>Price :<span> ₹'.$price.'</span> </h3>
            </div>
            <div class="col-6">
              <h3>Seat(s) :<span> '.$useat.'</span> </h3>
              <h3>Time :<span> '.$time.'</span> </h3>
              <h3>Hall :<span> H1</span> </h3>
            </div>
            <div class="col-12 mt-3 info">
               <i class="fa fa-location-arrow"></i> '.$cinema_name.' : <span> '.$cinema_address.'</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>';
        
  }
?>
