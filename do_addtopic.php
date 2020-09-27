

<?php

$link = mysqli_connect("localhost", "root", "mysql", "deltaX");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$topic_owner = mysqli_real_escape_string($link, $_REQUEST['topic_owner']);
$topic_title = mysqli_real_escape_string($link, $_REQUEST['topic_title']);
$topic_create_time = mysqli_real_escape_string($link, $_REQUEST['topic_create_time']);



$sql = "INSERT INTO forum_topics (topic_owner, topic_title,topic_create_time) VALUES ('$topic_owner','$topic_title','$topic_create_time')";

mysqli_query($link,$sql);
mysqli_close($link);

?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
	<style>
	h1 {
	  font-size:50px; 
	    font-family: 'Abril Fatface', cursive;
		margin-left:40px;
	}
	p {
		margin-left:40px;
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	     <a class="navbar-brand" href="#">
	       <img src="icon.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
	       Helping Hands
	     </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="index.html">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="opportunities.php">Opportunities</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="login.html">Sign In<span class="sr-only">(current)</span></a>
		      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="signUp.html">Sign Up</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="request.html">Request</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="topiclist.php">Forum</a>
	      </li>
		    </ul>
		  </div>
		</nav>
		
		
	<div style ="margin-top:40px;"></div>
	
	<h1>Topic Added</h1>
	<p><strong>Your topic has been added. Check out <a href = 'topiclist.php'>the forum</a>.</p>
</body>
<html>
</html>