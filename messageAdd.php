<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "mysql", "deltaX");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
 
 
// Escape user inputs for security
$post_text = mysqli_real_escape_string($link, $_REQUEST['post_text']);
$post_create_time = mysqli_real_escape_string($link, $_REQUEST['post_create_time']);
$post_owner = mysqli_real_escape_string($link, $_REQUEST['post_owner']);

// Attempt insert query execution
$sql = "INSERT INTO forum_posts (post_text, post_create_time, post_owner) VALUES ('$post_text','$post_create_time','$post_owner')";


if(mysqli_query($link, $sql)){
	$last_id = mysqli_insert_id($link);
	
    header("Location:example.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


// Close connection
mysqli_close($link);
?>