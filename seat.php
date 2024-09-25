<?php include 'base.php';
include 'dbconfig.php';
$movieid = $_GET['movieid'];
$shows = $_GET['showsid'];


if (isset($_SESSION["user"])){
  $user = $_SESSION["user"];
  $select = "SELECT * FROM user WHERE user=$user";
  $result = mysqli_query($dbcon, $select);
  if($result){
      if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
          $user_id = $row['user'];
        }
      }
  }
}

echo '
<title>Cineplex</title>

<link rel="stylesheet" href="css/seat.css">
<style>
  .hall__screen {';
      $select = "SELECT * FROM movie WHERE movie= '$movieid'";
  $result = mysqli_query($dbcon, $select);
  if($result){
    if (mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_assoc($result)){
        $poster = $row['movie_post'];
         echo 'background-image: url("'.$poster.'");';
       
      }
    }
  }
  echo '
  height : 300px;

  }
</style>



<div class="d-none">
  <div class="col-2">'; 
  $select = "SELECT * FROM movie WHERE movie= '$movieid'";
  $result = mysqli_query($dbcon, $select);
  if($result){
    if (mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_assoc($result)){
        $poster = $row['movie_post'];
        echo '<img src="'.$poster.'" height="300px">';
      }
    }
  }
  $selectp = "SELECT * FROM shows WHERE shows= '$shows'";
  $resultp = mysqli_query($dbcon, $selectp);
  if($resultp){
    if (mysqli_num_rows($resultp) > 0){
      while ($row = mysqli_fetch_assoc($resultp)){
        $price = $row['price'];
      }
    }
  }

echo '
  </div>

  <div class="col-3">
    <h1 class="display-5"> {{show.movie.movie_name}} </h1>
    <h1 class="display-5"> {{show.cinema.cinema_name}} </h1>
    <h1 class="display-5"> {{show.time}} </h1>
    <h1 class="display-5"> Rs {{show.price}} </h1>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-12 hall" style="background: linear-gradient(360deg, black, #1f1f1f);">
      <form action="booked.php" method="POST" id="book">
    
        <input type="hidden" value="'.$user_id.'" name="user" readonly>
        <input type="hidden" value="'.$shows.'" name="shows" readonly>
        <input type="hidden" value="'.$price.'" name="price" readonly>


        <div class="hall__screen"></div>


        <div class="seats">

          <div class="row">
            <h3 class="text-white m-2">A</h3>
            <div class="seat" id="A1">
              <input type="checkbox" value="#A1" id="seatA1" name="check[]" />
              <label for="seatA1"></label>
            </div>
            <div class="seat" id="A2">
              <input type="checkbox" value="#A2" id="seatA2" name="check[]" />
              <label for="seatA2"></label>
            </div>
            <div class="space"></div>
            <div class="seat" id="A3">
              <input type="checkbox" value="#A3" id="seatA3" name="check[]" />
              <label for="seatA3"></label>
            </div>
            <div class="seat" id="A4">
              <input type="checkbox" value="#A4" id="seatA4" name="check[]" />
              <label for="seatA4"></label>
            </div>
            <div class="seat" id="A5">
              <input type="checkbox" value="#A5" id="seatA5" name="check[]" />
              <label for="seatA5"></label>
            </div>
            <div class="seat" id="A6">
              <input type="checkbox" value="#A6" id="seatA6" name="check[]" />
              <label for="seatA6"></label>
            </div>
            <div class="seat" id="A7">
              <input type="checkbox" value="#A7" id="seatA7" name="check[]" />
              <label for="seatA7"></label>
            </div>
            <div class="seat" id="A8">
              <input type="checkbox" value="#A8" id="seatA8" name="check[]" />
              <label for="seatA8"></label>
            </div>
            <div class="space"></div>
            <div class="seat" id="A9">
              <input type="checkbox" value="#A9" id="seatA9" name="check[]" />
              <label for="seatA9"></label>
            </div>
            <div class="seat" id="A10">
              <input type="checkbox" value="#A10" id="seatA10" name="check[]" />
              <label for="seatA10"></label>
            </div>
          </div>

          <div class="row">
            <h3 class="text-white m-2">B</h3>
            <div class="seat" id="B1">
              <input type="checkbox" value="#B1" id="seatB1" name="check[]" />
              <label for="seatB1"></label>
            </div>
            <div class="seat" id="B2">
              <input type="checkbox" value="#B2" id="seatB2" name="check[]" />
              <label for="seatB2"></label>
            </div>
            <div class="space"></div>
            <div class="seat" id="B3">
              <input type="checkbox" value="#B3" id="seatB3" name="check[]" />
              <label for="seatB3"></label>
            </div>
            <div class="seat" id="B4">
              <input type="checkbox" value="#B4" id="seatB4" name="check[]" />
              <label for="seatB4"></label>
            </div>
            <div class="seat" id="B5">
              <input type="checkbox" value="#B5" id="seatB5" name="check[]" />
              <label for="seatB5"></label>
            </div>
            <div class="seat" id="B6">
              <input type="checkbox" value="#B6" id="seatB6" name="check[]" />
              <label for="seatB6"></label>
            </div>
            <div class="seat" id="B7">
              <input type="checkbox" value="#B7" id="seatB7" name="check[]" />
              <label for="seatB7"></label>
            </div>
            <div class="seat" id="B8">
              <input type="checkbox" value="#B8" id="seatB8" name="check[]" />
              <label for="seatB8"></label>
            </div>
            <div class="space"></div>
            <div class="seat" id="B9">
              <input type="checkbox" value="#B9" id="seatB9" name="check[]" />
              <label for="seatB9"></label>
            </div>
            <div class="seat" id="B10">
              <input type="checkbox" value="#B10" id="seatB10" name="check[]" />
              <label for="seatB10"></label>
            </div>
          </div>

          <div class="row">
            <h3 class="text-white m-2">C</h3>
            <div class="seat" id="C1">
              <input type="checkbox" value="#C1" id="seatC1" name="check[]" />
              <label for="seatC1"></label>
            </div>
            <div class="seat" id="C2">
              <input type="checkbox" value="#C2" id="seatC2" name="check[]" />
              <label for="seatC2"></label>
            </div>
            <div class="space"></div>
            <div class="seat" id="C3">
              <input type="checkbox" value="#C3" id="seatC3" name="check[]" />
              <label for="seatC3"></label>
            </div>
            <div class="seat" id="C4">
              <input type="checkbox" value="#C4" id="seatC4" name="check[]" />
              <label for="seatC4"></label>
            </div>
            <div class="seat" id="C5">
              <input type="checkbox" value="#C5" id="seatC5" name="check[]" />
              <label for="seatC5"></label>
            </div>
            <div class="seat" id="C6">
              <input type="checkbox" value="#C6" id="seatC6" name="check[]" />
              <label for="seatC6"></label>
            </div>
            <div class="seat" id="C7">
              <input type="checkbox" value="#C7" id="seatC7" name="check[]" />
              <label for="seatC7"></label>
            </div>
            <div class="seat" id="C8">
              <input type="checkbox" value="#C8" id="seatC8" name="check[]" />
              <label for="seatC8"></label>
            </div>
            <div class="space"></div>
            <div class="seat" id="C9">
              <input type="checkbox" value="#C9" id="seatC9" name="check[]" />
              <label for="seatC9"></label>
            </div>
            <div class="seat" id="C10">
              <input type="checkbox" value="#C10" id="seatC10" name="check[]" />
              <label for="seatC10"></label>
            </div>
          </div>

          <div class="row">
            <h3 class="text-white m-2">D</h3>
            <div class="seat" id="D1">
              <input type="checkbox" value="#D1" id="seatD1" name="check[]" />
              <label for="seatD1"></label>
            </div>
            <div class="seat" id="D2">
              <input type="checkbox" value="#D2" id="seatD2" name="check[]" />
              <label for="seatD2"></label>
            </div>
            <div class="space"></div>
            <div class="seat" id="D3">
              <input type="checkbox" value="#D3" id="seatD3" name="check[]" />
              <label for="seatD3"></label>
            </div>
            <div class="seat" id="D4">
              <input type="checkbox" value="#D4" id="seatD4" name="check[]" />
              <label for="seatD4"></label>
            </div>
            <div class="seat" id="D5">
              <input type="checkbox" value="#D5" id="seatD5" name="check[]" />
              <label for="seatD5"></label>
            </div>
            <div class="seat" id="D6">
              <input type="checkbox" value="#D6" id="seatD6" name="check[]" />
              <label for="seatD6"></label>
            </div>
            <div class="seat" id="D7">
              <input type="checkbox" value="#D7" id="seatD7" name="check[]" />
              <label for="seatD7"></label>
            </div>
            <div class="seat" id="D8">
              <input type="checkbox" value="#D8" id="seatD8" name="check[]" />
              <label for="seatD8"></label>
            </div>
            <div class="space"></div>
            <div class="seat" id="D9">
              <input type="checkbox" value="#D9" id="seatD9" name="check[]" />
              <label for="seatD9"></label>
            </div>
            <div class="seat" id="D10">
              <input type="checkbox" value="#D10" id="seatD10" name="check[]" />
              <label for="seatD10"></label>
            </div>
          </div>
        </div>


    </div>
  </div>


  <div class="row bottom">
    <div class="col-9">
      <h1 class="text-white">Selected Seats : <span id="slots"></span></h1>
    </div>
    <div class="col-3">';

    
      if (isset($_SESSION['username'])){
        if($_SESSION['role'] == 'user'){
          echo '
          <button type="submit" form="book" class="btn btn-lg btn-block btn-primary" name="submit" id="submit" disabled> Click To Book </button>';
        }
        if($_SESSION['role'] == 'cinema'){
          echo "
          <button type='submit' form='book' class='btn btn-lg btn-block btn-primary' disabled> Only Users can book.</button>";
        }
        if($_SESSION['role'] == 'admin'){
          echo "
          <button type='submit' form='book' class='btn btn-lg btn-block btn-primary' disabled> Only Users can book.</button>";
        }
     }
     else {
      echo '
      <a href="login.php" class="btn btn-lg btn-block btn-danger"> Login To Book </a>';
    }
  echo '
      </form>
    </div>
  </div>  

</div>';
?>


<script type="text/javascript">
  <?php 
  $select = "SELECT * FROM bookings WHERE shows_id='$shows'";
  $result = mysqli_query($dbcon, $select);
  if($result){
    if (mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_assoc($result)){
        echo '
        $("'.$row['useat'].'").addClass("notvacant").children("input").prop("disabled", true);
        $("'.$row['useat'].'").children("label").remove();';
        // $("{{seat.useat}}").addClass("notvacant").children("input").prop("disabled", true);
        // $("{{seat.useat}}").children("label").remove();
      }
    }
  }
  ?>
</script>

<script type="text/javascript">
  $(".seat").click(function () {
    var favorite = [];
    $.each($("input[name='check[]']:checked"), function () {
      favorite.push($(this).val());
    });
    $("#slots").empty().append(favorite.join(", "));

  });
</script>
<script type="text/javascript">
  $('.seat').click(function(){
   $("#submit").prop("disabled", false);
});
</script>




