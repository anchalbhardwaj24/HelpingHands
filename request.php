<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "mysql", "deltaX");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$activity = mysqli_real_escape_string($link, $_REQUEST['activity']);
$contact = mysqli_real_escape_string($link, $_REQUEST['contact']);
$grade = mysqli_real_escape_string($link, $_REQUEST['grade']);
$hours = mysqli_real_escape_string($link, $_REQUEST['hours']);
$number = mysqli_real_escape_string($link, $_REQUEST['number']);
$notes = mysqli_real_escape_string($link, $_REQUEST['notes']);

// Attempt insert query execution
$sql = "INSERT INTO request (name, activity, contact,grade,hours, number,notes) VALUES ('$name','$activity','$contact','$grade','$hours','$number','$notes')";


if(mysqli_query($link, $sql)){
	$last_id = mysqli_insert_id($link);
	
    header("Location:index.html");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


// Close connection
mysqli_close($link);
?>