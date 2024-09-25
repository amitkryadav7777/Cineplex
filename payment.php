<?php include 'base.php';
include 'dbconfig.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $useat = $_POST['check'];
    echo $useat;
    $price = $_POST['price'];
    $shows_id = $_POST['shows'];
    $user_id = $_POST['user'];
    //$price = $price*no_of_seats;
    $insert = "INSERT INTO `bookings`(`useat`, `price`, `shows_id`, `user_id`) VALUES ('$useat', '$price', '$shows_id', '$user_id')";
    $result = mysqli_query($dbcon, $insert);
}
echo '
<head>

</head>
<style media="screen">

.panel-title {display: inline;font-weight: bold;}
/*.checkbox.pull-right { margin: 0; }*/
.pl-ziro { padding-left: 0px; }

.main {
    background-color: lightgrey;
}


</style>

<div class="container" style="text-align:center;">
    <div class="row">
        <div class="col-xs-12 col-md-8 main">
            <div class="panel panel-default">

                <form method="post", action="booked.php">
                
                <div class="panel-heading">
                    <h3 class="panel-title">
                        PAYMENT DETAILS
                    </h3><br/>
                    <div class="checkbox pull-right">
                        <label>
                            <input type="checkbox" />
                            Remember
                        </label><br/>
                    </div>
                </div>
                <div class="panel-body">
            
                    <div class="form-group"><br/>
                        <label for="cardNumber" style="float: left;">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                required />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth" style="float: left;">
                                    EXPIRY DATE</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode" style="float: left; letter-spacing: .1rem;">
                                    CVV</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CVV" required style="letter-spacing: .1rem;" />
                            </div>
                        </div>
                    </div>
                   
                </div>


                    <div class="form-group"><br/>
                        <label for="cardNumber" style="float: left;letter-spacing: .1rem;">
                            PIN</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Enter PIN" style="letter-spacing: .1rem;" 
                                required />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>                
           
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><span class="badge pull-right" style="font-size: 1.3rem;margin-top: 1px">₹'.$price.'</span><h style="font-size: 1.3rem;"> Final Payment</h> 
                </li>
            </ul>
            <br/>
         
            <input class="btn btn-success btn-lg btn-block"  type="submit" value="Proceed To Pay" style="width: 50%;justify-items: center;"/>
           
        </form>
        </div>
    </div>
    </div>
</div>';
?>

