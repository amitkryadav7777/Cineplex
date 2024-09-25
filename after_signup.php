<?php 
include 'dbconfig.php';

    // USER SIGN UP
	if($dbcon){
		$role = $_POST["role"];
		if ( $role == 'user' ){
			$username = $_POST["username"];
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$email = $_POST["email"];		
			$pass = $_POST["password"];
			$password = password_hash($pass, PASSWORD_DEFAULT);
			$cpassword = $_POST["cpassword"];

			if($pass==$cpassword){
				$insert = "INSERT INTO `user`(`username`, `fname`, `lname`, `email`, `password`, `role`) VALUES ('$username','$fname','$lname','$email','$password', '$role')";
				$inserted = mysqli_query($dbcon, $insert);
				if($inserted){
					header ("location:login.php");
		    		// echo "You have signed up successfully as user.</br>";
				}
				else{
					header ("location:register_user.php");
				}
			}
			else{
				echo "Password and confirm password did not matched.";
			}

		}
	
		else{

			//CINEMA SIGN UP
			$username = $_POST["username"];
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$email = $_POST["email"];		
			$pass = $_POST["password"];
			$password = password_hash($pass, PASSWORD_DEFAULT);
			$cpassword = $_POST["cpassword"];
			$cinema_name = $_POST["cname"];
			$cinema_phone = $_POST["cphone"];
			$cinema_city = $_POST["ccity"];
			$cinema_address = $_POST["caddress"];
			$role = $_POST['role'];
			if($pass==$cpassword){
				$insert = "INSERT INTO `cinema`(`username`, `fname`, `lname`, `email`, `password`, `cinema_name`, `cinema_phone`, `cinema_city`, `cinema_address`, `role`) VALUES ('$username','$fname','$lname','$email','$password','$cinema_name','$cinema_phone','$cinema_city','$cinema_address', '$role')";
				$inserted = mysqli_query($dbcon, $insert);
				if($inserted){
		    		// echo "You have signed up successfully as cinema.</br>";
					header ("location:login.php");

				}
				else{
					header ("location:register_cinema.php");
				}
			}
			else{
				echo "Password and confirm password did not matched.";
			}
		}


	}


?>