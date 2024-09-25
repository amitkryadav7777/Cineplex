<?php include 'base.php'; 
include 'dbconfig.php';

if($_SESSION['role'] == 'user'){

echo '
<title>Cineplex | Bookings</title>

<link rel="stylesheet" href="css/bookings.css"/>


<div class="container-fluid box">
    <div class="row justify-content-center">

        <div class="col-8 card p-2 shadow mt-5">
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Movie Name</th>
                        <th scope="col">Cinema</th>
                        <th scope="col">Show Date</th>
                        <th scope="col">Price</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>';

                 
                    $user_id = $_SESSION['user'];
                    $selecta = "SELECT *  FROM bookings WHERE user_id='$user_id'";
                    $resulta = mysqli_query($dbcon, $selecta);
                    if($resulta){
                      if (mysqli_num_rows($resulta) > 0){
                        while ($row = mysqli_fetch_assoc($resulta)){
                            $book_id = $row['id'];
                            $price = $row['price'];
                            $shows_id = $row['shows_id'];
                            $selectb = "SELECT shows.date, shows.cinema_id, shows.movie_id FROM shows WHERE shows=$shows_id";
                            $resultb = mysqli_query($dbcon, $selectb);
                            if($resultb){
                              if (mysqli_num_rows($resultb) > 0){
                                while ($row = mysqli_fetch_assoc($resultb)){
                                  $date = $row['date'];
                                  $cinema_id = $row['cinema_id'];
                                  $movie_id = $row['movie_id'];
                                  $selectc = "SELECT cinema.cinema_name, movie.movie_name FROM cinema, movie WHERE cinema='$cinema_id' AND movie=$movie_id";
                                  $resultc = mysqli_query($dbcon, $selectc);
                                  if($resultc){
                                    if (mysqli_num_rows($resultc) > 0){
                                      while ($row = mysqli_fetch_assoc($resultc)){
                                          $cinema_name = $row['cinema_name'];
                                          $movie_name = $row['movie_name'];
                                          echo '
                                            <tr>
                                                <th>'.$book_id.'</th>
                                                <th>'.$cinema_name.'</th>
                                                <th>'.$movie_name.'</th>
                                                <th>'.$date.'</th>
                                                <th>Rs. '.$price.'</th>
                                                <!-- <th><a class="btn submit" href="ticket/{{b.pk}}" target="_blank">View Ticket</a></th> -->
                                                <th><a class="btn submit" href="ticket.php?book_id='.$book_id.'" target="_blank">View Ticket</a></th>
                                            </tr>';
                                      }
                                    }
                                  }
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
</div>';

}
else{
    echo '<h1>Sorry...</h1>';
}
?>