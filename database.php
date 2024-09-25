<?php 
$server = "localhost";
$user = "root";
$password = "";
// $db_name = "phpcineplex";
$con = mysqli_connect($server, $user, $password);
if ($con){

	try {
    $db = "CREATE DATABASE phpcineplex";
    $db_created  = mysqli_query($con, $db);
    if ($db_created){
    	$db_name = "phpcineplex";
	    $dbcon = mysqli_connect($server, $user, $password, $db_name);

	   
		if($dbcon){			
			try {
	        $table = "CREATE table admin (
	   				admin int(5) PRIMARY KEY AUTO_INCREMENT,
				    username varchar(20),
					fname varchar(20),
				    lname varchar(20),
				    email varchar(30),
				    password varchar(255),
	    			role varchar(10));";
	    	$tb_created = mysqli_query($dbcon, $table);
	    	$password = password_hash('admin', PASSWORD_DEFAULT);
	    	$insert = "INSERT INTO `admin`(`username`, `fname`, `lname`, `email`, `password`, `role`) VALUES ('admin','admin','admin','amitkuyadav738@gmail.com','$password','admin')";
	    	$result = mysqli_query($dbcon, $insert);
			}
			catch (Exception $e){
			}

			try{
			$table = "CREATE TABLE user (
				    user int(5) PRIMARY KEY AUTO_INCREMENT,
				    username varchar(20),
					fname varchar(20),
				    lname varchar(20),
				    email varchar(30),
				    password varchar(255),
				    role varchar(10)
					);";
			$tb_created = mysqli_query($dbcon, $table);
			}
			catch (Exception $e){
			}
		
			try{
			$table = "CREATE TABLE cinema (
				    cinema int(5) PRIMARY KEY AUTO_INCREMENT,
				    username varchar(20),
					fname varchar(20),
				    lname varchar(20),
				    email varchar(30),
				    password varchar(255),
				    cinema_name varchar(50),
				    cinema_phone int(10),
				    cinema_city varchar(100),
				    cinema_address varchar(255)	,
				    role varchar(10)			
					);";
			$tb_created = mysqli_query($dbcon, $table);
			}
			catch (Exception $e){
			}

			try{
            $table = "CREATE TABLE movie (
	               movie int(5) PRIMARY KEY AUTO_INCREMENT,
	               movie_name varchar(255),
	               movie_trailer varchar(255),
	               movie_rdate varchar(30),
	               movie_desc varchar(255),
	               movie_rt varchar(2),
	               movie_post varchar(255),
	               movie_gen varchar(255),
	               movie_dur varchar(100),
	               user int(5) NOT NULL,
	    		   FOREIGN KEY (user) REFERENCES admin(admin)
	               )";
	       	$tb_created = mysqli_query($dbcon, $table);
			}
			catch (Exception $e){
			}

			try{
			$table = "CREATE TABLE shows(
			        shows int(5) PRIMARY KEY AUTO_INCREMENT,
			        price varchar(5),
			        time varchar(30),
			        date varchar(30),
			        cinema_id int(5) NOT NULL,
			        movie_id int(5) NOT NULL,
		            FOREIGN KEY (cinema_id) REFERENCES cinema(cinema),
		            FOREIGN KEY (movie_id) REFERENCES movie(movie)		        
			    );";
	    	$tb_created = mysqli_query($dbcon, $table);
			}
			catch (Exception $e){
			}

			try{
			$table = "CREATE TABLE bookings(
		           id int(5) PRIMARY KEY AUTO_INCREMENT,
		           useat varchar(255),
		           price varchar(100),
		           shows_id int(5) NOT NULL,
		           user_id int(5) NOT NULL,
		           FOREIGN KEY (shows_id) REFERENCES shows(shows),
		           FOREIGN KEY (user_id) REFERENCES user(user)
	               );";
			$tb_created = mysqli_query($dbcon, $table);
			}
			catch (Exception $e){
			}	
			     
		}	
	}
}
	catch (Exception $e){

	}
}

else{
	echo "Connection not stablished. </br>";
}
?>