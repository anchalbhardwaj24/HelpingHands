<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<link rel="icon" href="icon.png">
    <meta name="viewport" content="width=device-width">
    <title>Sign Up!</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">


    <style>

h1 {
	margin-left:50px;
	margin-top:10px;
  font-family: 'Abril Fatface', cursive;
  font-size:60px;
}

table {
  width: 90%;
margin-left:50px;
}

table, th, td {
  border: 1px solid black;
}

td,  th {
  border: 1px solid #ddd;
  padding: 8px;
}

 tr:nth-child(even){background-color: #f2f2f2;}

 tr:hover {background-color: #ddd;}

 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0275d8;
  color: white;
}

</style>
  </head>
  <body>
    <script src="script.js"></script>

	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	     <a class="navbar-brand" href="index.html">
	       <img src="icon.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
	       Helping Hands
	     </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="opportunities.php">Opportunities</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="login.html">Sign In</a>
		      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="signUp.html">Sign Up</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="request.html">Request</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="topiclist.php">Forum</a>
	      </li>
		    </ul>
		  </div>
		</nav>


  <h1>Opportunities:</h1>

  
  
  <div style = "margin-top:40px"></div>
<div style = "margin-left:50px;margin-right:50px">
  <img src = "hour1.png" style = "width:32%;border-radius:50%;border: 1px solid black;margin-right:10px">
  <img src = "hour2.png" style = "width:32%;border-radius:50%;border: 1px solid black;margin-right:10px">
  <img src = "hour3.png" style = "width:32%;border-radius:50%;border: 1px solid black;margin-right:10px">
</div>


 <div style = "margin-top:40px"></div>
 
<?php
session_start();
$email = $_SESSION['email'];
$link = mysqli_connect("localhost", "root", "mysql", "deltaX");

$sql = "SELECT name, activity, contact, hours, grade, number, notes from request";


if($result = mysqli_query($link, $sql)) {
	if(mysqli_num_rows($result) > 0) {
		echo "<table style = 'width:90%'>";
			echo "<tr>";
			echo "<th>Name</th>";
			echo "<th>Activity</th>";
			echo "<th>Contact</th>";
			echo "<th>Grade of Volunteers</th>";
			echo "<th>Spots</th>";
			echo "<th>Hours</th>";
			echo "<th>Notes</th>";
		echo "</tr>";
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
			echo "<td>" . $row['name'];
			echo "<td>" . $row['activity'];
			echo "<td>" . $row['contact'];
			echo "<td>" . $row['grade'];
			echo "<td>" . $row['number'];
			echo "<td>" . $row['hours'];
			echo "<td>" . $row['notes'];
		echo "</tr>";
	}
	echo "</table>";
	mysqli_free_result($result);

	
	} else {
		echo "no records";
	}
} else {
	echo "error." . mysqli_error($link);
}

?>
 <div style = "margin-top:40px">
 <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1I4zNqEiVoCNNgN_hx2y45YJe-Hfn9cvL"  height="480" style = "width:90%;display:block;margin-left:50px"></iframe>

  </body>
</html>