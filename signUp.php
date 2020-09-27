<?php

$link = mysqli_connect("localhost", "root", "mysql", "deltaX");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($link, $_REQUEST['lname']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$grade = mysqli_real_escape_string($link, $_REQUEST['grade']);
$interest1 = mysqli_real_escape_string($link, $_REQUEST['interest1']);
$interest2 = mysqli_real_escape_string($link, $_REQUEST['interest2']);
$interest3 = mysqli_real_escape_string($link, $_REQUEST['interest3']);
$strength1 = mysqli_real_escape_string($link, $_REQUEST['strength1']);
$strength2 = mysqli_real_escape_string($link, $_REQUEST['strength2']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$notes = mysqli_real_escape_string($link, $_REQUEST['notes']);


$sql = "INSERT INTO users (fname, lname, email, password, grade, interest1, interest2, interest3, strength1, strength2,  age, notes) VALUES ('$fname','$lname','$email','$password','$grade','$interest1','$interest2','$interest3','$strength1','$strength2','$age','$notes')";




if(mysqli_query($link, $sql)){
	$last_id = mysqli_insert_id($link);
	
    header('Location: login.html');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


mysqli_close($link);
?>