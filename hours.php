<?php
session_start();
$con = mysqli_connect("localhost", "root", "mysql", "HelixHacks");
// Check user login or not
if(!isset($_SESSION['email'])){
    echo $_SESSION['email'];
}

// logout
// if(isset($_POST['but_logout'])){
//     session_destroy();
//     header('Location: login.html');
// }
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
	<style>

	  * {
	    box-sizing: border-box;
	  }
	  input {
	    display:block;
	    width:100%;
	    margin:10px 0;
	    padding:10px;
	  }
	  .type-1 {
	    border-radius:10px;
	    border: 1px solid #eee;
	    transition: .3s border-color;
	  }
	  .type-1:hover {
	    border: 1px solid #aaa;
	  }

	  .type-2 {
	    background-color: #fafafa;
	    border:0;
	    box-shadow:0 0 4px rgba(0,0,0,0.3);
	    transition: .3s box-shadow;
	  }
	  .type-2:hover {
	    box-shadow:0 0 4px rgba(0,0,0,0.5);
	  }
	  .type-3 {
	    border:1px solid #111;
	    transition: .3s background-color;
	  }
	  .type-3:hover {
	    background-color: #fafafa;
	  }
		
	  table {
	    width: 90%;
		display: block;
		margin-left:auto;
		margin-right:auto;
	  }

	  table, th, td {
	    border: 1px solid black;
		width:40%;
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
	
<link rel="icon" href="icon.png">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
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
		        <a class="nav-link" href="home.php">Dashboard<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="hours.php">Hours</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="index.html">Sign Out</a>
		      </li>
		    </ul>
		  </div>
		</nav>
		<div style = "margin-top:30px">
		<h1 style = "font-family: 'Abril Fatface', cursive;margin-left:60px">Hours</h1>
		<div style = "margin-top:30px">
			
		<div class="col-sm-6" style = "margin-top:20px;display:block;margin-right:auto;margin-left:40px;margin-bottom:30px">
		<div class="card" >

		  <div class="card-body">
		    <h5 class="card-title">Input your hourly achievements!</h5>
		    <h6 class="card-subtitle mb-2 text-muted">What have you accomplished?</h6>
		    <br>
    <form name="cartform" id="theForm" method="POST" action = "hoursLog.php">
             Full Name: <input type="text" id="fullname" class="type-1" name="fullname"><span style="color:red" id="error1" "></span>
             Activity: <input type="text" id="activity" class="type-1" name="activity"><span style="color:red" id="error1" "></span>
             Hours: <input type="text" id="hours" class="type-1" name="hours"><span style="color:red" id="error1" "></span>
 			Signature: <input type="text" id="signature" class="type-1" name="signature"><span style="color:red" id="error1" "></span>
 			Dates: <input type="text" id="dates" class="type-1" name="dates"><span style="color:red" id="error1" "></span>
            
             <input type="submit" id="btnSave" class="btn btn-outline-primary" style = "border-radius: 45px;" value="Submit">
         </form>
	
		  </div>
		</div>
		</div>

		</div>	
		<div style = "margin-right:200px;margin-left:800px;margin-top:-750px">
		<img src = "hour1.png" style = "border-radius:50%;width:100%;border: 1px solid black;margin-bottom:10px">
		<div style = "margin-left:50px"></div>
		<img src = "hour2.png" style = "border-radius:50%;width:100%;border: 1px solid black;margin-bottom:10px">
		<div style = "margin-left:50px"></div>
		<img src = "hour3.png" style = "border-radius:50%;width:100%;border: 1px solid black">
	</div>
		<div style = "margin-top:40px"></div>
	<?php
	session_start();
	$link = mysqli_connect("localhost", "root", "mysql", "deltaX");
	$valid = $_SESSION['email'];
	$sql = "SELECT email, fullname, activity, hours, signature, dates from hours where email = '$valid'";
	if($result = mysqli_query($link, $sql)) {
		if(mysqli_num_rows($result) > 0) {
			echo "<table style = 'width:90%'>";
				echo "<tr>";
				echo "<th>Full Name</th>";
				echo "<th>Activity</th>";
				echo "<th>Hours</th>";
				echo "<th>Signature</th>";
				echo "<th>Dates</th>";
			echo "</tr>";
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td>" . $row['fullname'];
				echo "<td>" . $row['activity'];
				echo "<td>" . $row['hours'];
				echo "<td>" . $row['signature'];
				echo "<td>" . $row['dates'];
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
	<div style = "margin-top:40px"></div>