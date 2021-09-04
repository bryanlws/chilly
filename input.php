<?php
session_start();
$servername= "127.0.0.1";
$username= "root";
$password = "";
$dbname = "";
$handler = mysqli_connect($servername,$username,$password)
 or die ("Connection failed.");

 $sql = "CREATE DATABASE registration";
 mysqli_query($handler, $sql);
    
 mysqli_select_db ($handler, "registration");

$dbname = "registration";

$handler = mysqli_connect($servername, $username, $password, $dbname);

if (!$handler) {
    die("Connection failed: " . mysqli_connect_error());
}

$pname = $_POST['pname'];
$email = $_POST['email'];
$contactnumber = $_POST['contactnumber'];
$course = $_POST['course'];

$the_query = "CREATE TABLE registrant (
		id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		pname VARCHAR(40) NOT NULL,
        email VARCHAR(55) NOT NULL,
        contactnumber VARCHAR(15) NOT NULL,
        course VARCHAR(55) NOT NULL) ";

mysqli_query($handler, $the_query);
   
$sql_query = "REPLACE INTO registrant(pname, email, contactnumber, course)
			 VALUES ('$pname', '$email', '$contactnumber', '$course')";

			
if(mysqli_query($handler,$sql_query)){
    echo "You have successfully registered, see you there!";
} else{
    echo "There was a problem registering your details, please try again: " . mysqli_error($handler) . "<br>";
}

mysqli_close($handler);
?>