<?php 
include 'dbconfig.php';

	if($dbcon){
		$username = $_POST["username"];
		$password = $_POST["password"];

		$userselect = "SELECT *  FROM user WHERE username='$username'";		
		$userresult  = mysqli_query($dbcon, $userselect);

		$cinemaselect = "SELECT *  FROM cinema WHERE username='$username'";		
		$cinemaresult  = mysqli_query($dbcon, $cinemaselect);

		$adminselect = "SELECT *  FROM admin WHERE username='$username'";		
		$adminresult  = mysqli_query($dbcon, $adminselect);

		if (mysqli_num_rows($userresult) > 0){
        	while ($row = mysqli_fetch_assoc($userresult)){
        		if(password_verify($password, $row['password'])){

	        		session_start();
	        	
	        		$_SESSION['username'] = $row["username"];
	        		$_SESSION['role'] = $row["role"];
	        		$_SESSION['user'] = $row["user"];
	        		header("location:index.php ");
        		}
        		else{
        			setcookie("loggedin", "false", time()+60, "/");
        			header ('location:login.php');

        		}

        			
        	}       
        }  
 
		elseif (mysqli_num_rows($cinemaresult) > 0){
        	while ($row = mysqli_fetch_assoc($cinemaresult)){
        		if(password_verify($password, $row['password'])){
	        		session_start();
	        	
	        		$_SESSION['cinema'] = $row["cinema"];
	        		$_SESSION['username'] = $row["username"];
	        		$_SESSION['role'] = $row["role"];
	        		$_SESSION['cname'] = $row["cinema_name"];
	        		header("location:index.php ");
	        	}
	        	else{
        			setcookie("loggedin", "false", time()+60, "/");
        			header ('location:login.php');
	        	}
        	}       
        }

		elseif (mysqli_num_rows($adminresult) > 0){

        	while ($row = mysqli_fetch_assoc($adminresult)){
    	        if(password_verify($password, $row['password'])){

	        		session_start();
	        		
	        		$_SESSION['username'] = $row["username"];
	        		$_SESSION['role'] = $row["role"];
	        		header("location:index.php");
	        	}
	        	else{
        			setcookie("loggedin", "false", time()+60, "/");
        			header ('location:login.php');	        		
	        	}       	 
       		 }

		}

       	else{
       		setcookie("loggedin", "false", time()+60, "/");
       		$invalid = 'Invalid credentials.';
       		header ('location:login.php');
       	}


	}


?>