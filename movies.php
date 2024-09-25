<?php include 'base.php';
include 'dbconfig.php';
$movieid = $_GET['movieid'];
?>
<title>Cineplex </title>

<style>
    <?php 
        $select = "SELECT * FROM movie WHERE movie='$movieid'";
        $result = mysqli_query($dbcon, $select);
        if($result){
            if (mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    $poster = $row['movie_post'];
    echo "
        .bg {
            background: linear-gradient(to right, rgba(138, 181, 206, 0), #000),
            url('";echo $poster; echo "');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100vh;
        }";
    }
}}
    ?>

    .bl {
        background: black;
    }

    .right-c {
        margin-top: 150px;
        color: #fff;
    }

    .pillow {
        background: rgba(0, 0, 0, 0.13);
        border-radius: 50px;
        color: white;
        border: solid 1px whitesmoke;
        padding: 5px 10px;
        text-align: center;
        width: 60%;
    }

    .title {
        font-size: 50px;
        padding: 10px 0px;
    }

    .rate {
        margin: 10px 0px;
        margin-left: 30px;
    }

    .rate i {
        text-shadow: 0 0 5px white;
        color: red;
    }

    .desc {
        margin: 5px 50px 5px 5px;
    }

    .btn-custom {
        background: linear-gradient(320deg, blue, red);
        color: #fff;
        border: none;
        border-radius: 10px;
        width: 230px;
        margin: 5px;
    }

    .btn-custom i {
        padding: 0px 5px;
    }

    .btn-custom:hover {
        color: #fff;
        border: solid 2px white;
        background: transparent;
    }

    .time {
        margin: 5px;
        display: inline;
    }
</style>
<?php 

        $select = "SELECT * FROM movie WHERE movie='$movieid'";
            $result = mysqli_query($dbcon, $select);
            if($result){
                if (mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)){
echo '
<div class="container-fluid">
    <div class="row" style="margin-top: -63px">
        <div class="col-7 bg">

        </div>
        <div class="col-5 bl">
            <div class="row">
                <div class="col-12 right-c">
                    <h1 class="title">'.$row['movie_name'].'</h1>
                    <h4 class="pillow">'.$row['movie_gen'].'</h4>
                    <h4 style="padding: 5px 0px"> <i class="fa fa-clock-o" aria-hidden="true"></i> '.$row['movie_dur'].' | <i class="fa fa-calendar-o"></i> '.$row['movie_rdate'].'</h4>
                    <p class="desc">'.$row['movie_desc'].'</p>
                    <h1 class="rate"> <i class="fa fa-star"></i> '.$row['movie_rt'].'</h1>
                    <button type="button" id="btn-t" class="btn btn-lg btn-custom">Watch Trailer <i
                            class="fa fa-play-circle"></i>
                    </button>
                    <button type="button" id="btn-time" class="btn btn-lg btn-custom">Book Now <i
                            class="fa fa-ticket"></i> </button>

                </div>

                <div class="modal fade" id="trailer" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">';
                            $select = "SELECT * FROM movie WHERE movie='$movieid'";
                            $result = mysqli_query($dbcon, $select);
                            if($result){
                                if (mysqli_num_rows($result) > 0){
                                    while ($row = mysqli_fetch_assoc($result)){

                            echo '<iframe width="800px" height="500px" src="'.$row['movie_trailer'].'"
                                allowfullscreen></iframe>';
                                    }
                                }
                            }
                            echo '
                        </div>
                    </div>
                </div>


                <!-- Modal for time selection-->
                <div class="modal fade" id="shows" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> Select cinema and timings </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">


                                    
                                    <div class="row">';
                                        $select = "SELECT shows, movie_id, time, cinema_name
                                                    FROM shows, cinema WHERE cinema_id = cinema";
                                        $result = mysqli_query($dbcon, $select);
                                        if($result){
                                            if (mysqli_num_rows($result) > 0){
                                                while ($row = mysqli_fetch_assoc($result)){
                                                    $showsid = $row['shows'];
                                                    $time = $row['time'];
                                                    $cinema_name = $row['cinema_name'];
                                                    $movie_id = $row['movie_id'];
                                                    if($movie_id == $movieid){
                                                    echo '
                                        <div class="col-12">
                                            <h3>'.$cinema_name.'</h3>
                                        </div>
                                        
                                           
                                            <h5 class="time"><a href="seat.php?movieid='.$movieid.'&showsid='.$showsid.'"
                                                    class="badge badge-primary">'.$time.'</a></h5>';
                                                    }
                                                }
                                            }
                                        }

                                        echo '    
                                        
                                    </div>
                            

                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="container d-none">
        <div class="row mt-5">
            <div class="col-3">
                <div class="card">
                    <img class="card-img-top" src="{{movies.movie_poster.url}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{movies.movie_name}}</h4>
                        <p class="card-text">{{movies.movie_rating}}</p>

                    </div>
                </div>
            </div>

            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Cinema</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {% for i in cin %}
                            <td scope="row"> {{i.cinema_name}} </td>
                            {% for j in i.cinema_show.all %}

                            {% if j.movie_id == movies.movie %}
                            <td><a href="/seat/{{j.shows}}"> {{j.time}} </a></td>
                            {% endif %}

                            {% endfor %}
                        </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>';
               }
         }
    }
?>
    <script>
        $('#btn-t').click(function () {
            $('#trailer').modal('toggle')
        });

        $('#btn-time').click(function () {
            $('#shows').modal('toggle')
        });
    </script>

    