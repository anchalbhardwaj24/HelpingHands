
<html>
<head>
	 <link rel="icon" href="icon.png">
<title>Topics in My Forum</title>

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
<h1>Topics in My Forum</h1>
<?php print $display_block; ?>
<P style = "margin-left:50px">Would you like to <a href="addtopic.html">add a topic</a>?</p>
</body>
</html>

 
<?php
session_start();
$email = $_SESSION['email'];
$link = mysqli_connect("localhost", "root", "mysql", "deltaX");

$sql = "SELECT topic_id, topic_title, topic_create_time, topic_owner from forum_topics";

$sql3 = "SELECT count(post_id) AS total FROM forum_posts ";
$result = mysqli_query($link,$sql3);
$row = mysqli_fetch_assoc($result);

echo "<p style = 'margin-left:50px''>Total Number of Posts: ". $row['total'];
 
 

 
if($result = mysqli_query($link, $sql)) {
	if(mysqli_num_rows($result) > 0) {
		echo "<table style = 'width:90%;margin-left:-3px;margin-top:20px'>";
			echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>Title</th>";
			echo "<th>Time</th>";
			echo "<th>Owner</th>";
		echo "</tr>";
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
			echo "<td>" . $row['topic_id'];
			echo "<td>" . "<a href = 'example.php' style = 'color:black'>" .$row['topic_title'] ."</a>";
			echo "<td>" . $row['topic_create_time'];
			echo "<td>" . $row['topic_owner'];
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