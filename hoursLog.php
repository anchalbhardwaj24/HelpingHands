<?php
session_start();

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "mysql", "deltaX");
$email = $_SESSION['email'];
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$fullname = mysqli_real_escape_string($link, $_REQUEST['fullname']);
$activity = mysqli_real_escape_string($link, $_REQUEST['activity']);
$hours = mysqli_real_escape_string($link, $_REQUEST['hours']);
$signature = mysqli_real_escape_string($link, $_REQUEST['signature']);
$dates = mysqli_real_escape_string($link, $_REQUEST['dates']);

// Attempt insert query execution
$sql = "INSERT INTO hours (email, fullname, activity,hours,signature,dates) VALUES ('$email','$fullname','$activity','$hours','$signature','$dates')";


if(mysqli_query($link, $sql)){
	$last_id = mysqli_insert_id($link);
	
    header("Location:hours.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


// Close connection
mysqli_close($link);
?>