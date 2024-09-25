<?php include 'base.php';
include 'dbconfig.php';

if($_SESSION['role'] == 'user'){

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['check'])){
      $seats = $_POST['check'];
      $useat = join(", ", $seats);
      $no_of_seats = str_word_count($useat);   
      $price = $_POST['price']*$no_of_seats;
      $shows_id = $_POST['shows'];
      $user_id = $_POST['user'];
      //$price = $price*no_of_seats;
      $insert = "INSERT INTO `bookings`(`useat`, `price`, `shows_id`, `user_id`) VALUES ('$useat', '$price', '$shows_id', '$user_id')";
      $result = mysqli_query($dbcon, $insert);
      $select = "SELECT * FROM bookings WHERE shows_id='$shows_id' AND user_id='$user_id'";
      $result = mysqli_query($dbcon, $select);
      if($result){
        if (mysqli_num_rows($result) > 0){
          while ($row = mysqli_fetch_assoc($result)){
            $book_id = $row['id'];
            
          }
        }
      }
    
      echo '
      <title>Cineplex</title>


      <script>
          window.onload = function() {
            window.location.href = "ticket.php?book_id='.$book_id.'";
        }
      </script>';
      }
      else{

      echo '<style>
  .form-gap {
    padding-top: 70px;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<div class="form-gap"></div>
     <div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-info fa-4x"></i></h3>
                  <h3 class="text-center">Please select a seat.</h3>
                  <div class="panel-body">
                      <div class="form-group">
                        <button name="submit" class="btn btn-lg btn-primary btn-block"  onclick="history.back()" type="submit">Go Back</button>
                      </div>
          
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div>
</div>';
      }    
  }


}
else{
  echo "<h1>Sorry...</h1>";
}

?>

