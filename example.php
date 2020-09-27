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
			    
		      <li class="nav-item active">
		        <a class="nav-link" href="topiclist.php"><- Back to Forum</a>
		      </li>
			    </ul>
			  </div>
			</nav>
	<h1>Let's Discuss!</h1>
	<h1 style = "font-size:25px">Forum Topic: Community Service in ms</h1>
	
 <div style = "margin-top:40px">
	<?php
	session_start();
	$email = $_SESSION['email'];
	$link = mysqli_connect("localhost", "root", "mysql", "deltaX");

	$sql = "SELECT post_id, post_text, post_create_time, post_owner from forum_posts";


	if($result = mysqli_query($link, $sql)) {
		if(mysqli_num_rows($result) > 0) {
			echo "<table style = 'width:90%'>";
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Message</th>";
				echo "<th>Time</th>";
				echo "<th>Account</th>";
			echo "</tr>";
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td>" . $row['post_id'];
				echo "<td>" . $row['post_text'];
				echo "<td>" . $row['post_create_time'];
				echo "<td>" . $row['post_owner'];
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
	
	<h1 style = "font-size:25px">Reply!</h1>
	<div style = "padding-left:50px">
	<form method=post action="messageAdd.php">
	<p><strong>Your E-Mail Address:</strong><br>
	<input type="text" name="post_owner" size=60 maxlength=250>
	<p><strong>Message:</strong><br>
	<input type="text" name="post_text" size=60 maxlength=250>
	<P><strong>Topic Timing:</strong><br>
	<input name="post_create_time" rows=4 cols=60 wrap=virtual type = "date"></input>
	<P><input type="submit" name="submit" value="Add Topic" class = "btn-primary rounded"></p>
	</form>
</div>

<img src = "hour1.png" style = "display:block;margin-left:auto;margin-right:60px;width:40%;margin-top:-340px">
</body>
</html>