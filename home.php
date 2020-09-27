<html>
<head>
	<link rel="icon" href="icon.png">
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
	<title>Dashboard</title>
	<style>

	  table {
	    width: 40%;
		margin-left:30px;
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
	  ul {list-style-type: none;}

	  /* Month header */
	  .month {
	    padding: 70px 25px;
	    width: 100%;
	    background-color: #0275d8;
	    text-align: center;
	  }

	  /* Month list */
	  .month ul {
	    margin: 0;
	    padding: 0;
	  }

	  .month ul li {
	    color: white;
	    font-size: 20px;
	    text-transform: uppercase;
	    letter-spacing: 3px;
	  }

	  /* Previous button inside month header */
	  .month .prev {
	    float: left;
	    padding-top: 10px;
	  }

	  /* Next button */
	  .month .next {
	    float: right;
	    padding-top: 10px;
	  }

	  /* Weekdays (Mon-Sun) */
	  .weekdays {
	    margin: 0;
	    padding: 10px 0;
	    background-color:#ddd;
	  }

	  .weekdays li {
	    display: inline-block;
	    width: 13.6%;
	    color: #666;
	    text-align: center;
	  }

	  /* Days (1-31) */
	  .days {
	    padding: 10px 0;
	    background: #eee;
	    margin: 0;
	  }

	  .days li {
	    list-style-type: none;
	    display: inline-block;
	    width: 13.6%;
	    text-align: center;
	    margin-bottom: 5px;
	    font-size:12px;
	    color: #777;
	  }

	  /* Highlight the "current" day */
	  .days li .active {
	    padding: 5px;
	   background-color: #0275d8;
	    color: white !important
	  }
	  data-toggle{
	    color: white
	  }
	</style>
</head>
<?php
session_start();
$con = mysqli_connect("localhost", "root", "mysql", "deltaX");
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
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Dashboard<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="hours.php">Hours</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="index.html">Sign Out</a>
		      </li>
		    </ul>
		  </div>
		</nav>
		
<div style = "font-family: 'Abril Fatface', cursive;">
		
<?php
session_start();
$email = $_SESSION['email'];
$link = mysqli_connect("localhost", "root", "mysql", "deltaX");
$sql = "SELECT fname from users where email = '$email'";
if($result = mysqli_query($link, $sql)) {
while($row = mysqli_fetch_array($result)) {
	echo "<h1 style = 'margin-left:30px;font-size:60px;margin-top:30px;font-family: 'Abril Fatface', cursive;'>Hello ", $row['fname'], "!";
	echo "<div style = 'margin-top:30px'></div>";
}
} else {
	echo "error." . mysqli_error($link);
}

echo "<div style = 'margin-top:20px'></div>";
?>
</div>
		
		<?php
		session_start();
		$email = $_SESSION['email'];
		$link = mysqli_connect("localhost", "root", "mysql", "deltaX");

		$sql = "SELECT interest1, interest2, interest3, strength1, strength2 from users where email = '$email'";


		if($result = mysqli_query($link, $sql)) {
			if(mysqli_num_rows($result) > 0) {
				echo "<table style = 'width:40%'>";
					echo "<tr>";
					echo "<th>Interests</th>";
				echo "</tr>";
			while($row = mysqli_fetch_array($result)) {
				echo "<tr>";
					echo "<td>" . $row['interest1'];
				echo "</tr>";
				echo "<tr>";
					echo "<td>" . $row['interest2'];
				echo "</tr>";
				echo "<tr>";
					echo "<td>" . $row['interest3'];
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
		
		
		
		if($result = mysqli_query($link, $sql)) {
			if(mysqli_num_rows($result) > 0) {
				echo "<table style = 'width:40%;margin-left:50%;margin-top:-12%'>";
					echo "<tr>";
					echo "<th>Strengths</th>";
				echo "</tr>";
			while($row = mysqli_fetch_array($result)) {
				echo "<tr>";
					echo "<td>" . $row['strength1'];
				echo "</tr>";
				echo "<tr>";
					echo "<td>" . $row['strength2'];
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
		
		<img src = "home.gif" style = "width:35%;margin-top:90px;margin-left:30px">
		


			 <div class="col-sm-6" style = "display:block;margin-left:auto;margin-right:100px;margin-top:-380px;font-size:20px">
		<div class="card" >
		  <div class="card-body">
		<?php
		session_start();
		$email = $_SESSION['email'];
		// Make a MySQL Connection
		$sql = mysqli_connect("localhost", "root", "mysql", "deltaX");
		
		$query = "SELECT  activity, SUM(hours) FROM hours GROUP BY activity"; 
	 
		$result = mysqli_query($sql, $query) or die(mysqli_error($sql));

		// Print out result
		while($row = mysqli_fetch_array($result)){
			echo "<li>Total ". $row['activity']. ": ".$row['SUM(hours)']. " hours</li>";
			echo "<br />";
		}
		?>
		
	</div>
	 <div class="col-sm-6">
</div>
</div>

<div style = "margin-top:80px">


<div style = "width:183%;margin-left:-83%;border-radius:10%">
 <div class="month" >
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>October<br><span style="font-size:18px">2020</span></li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mon</li>
  <li>Tues</li>
  <li>Wed</li>
  <li>Thurs</li>
  <li>Fri</li>
  <li>Sat</li>
  <li>Sun</li>
</ul>

<ul class="days">
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
    <li><span class="active" data-toggle="tooltip" data-placement="bottom"  title="Reading to Children at Library">5</span></li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li><span class="active" data-toggle="tooltip" data-placement="bottom"  title="Picking up Groceries for Seniors">10</span></li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li><span class="active" data-toggle="tooltip" data-placement="bottom"  title="Picking up Trash at Beach">14</span></li>
  <li><span class="active" data-toggle="tooltip" data-placement="bottom"  title="Volunteering at Animal Shelter">15</span></li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li><span class="active" data-toggle="tooltip" data-placement="bottom"  title="Tutoring Disabled Children at Library">25</span></li>
  <li>26</li>
  <li><span class="active" data-toggle="tooltip" data-placement="bottom"  title="Walking Dogs">27</span></li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>
</ul>

</div>

</div>
<div style = "margin-top:40px"></div>
<?php
session_start();
$email = $_SESSION['email'];
$link = mysqli_connect("localhost", "root", "mysql", "deltaX");

$sql = "SELECT name, dates, hours, prereq from opportunities";


if($result = mysqli_query($link, $sql)) {
	if(mysqli_num_rows($result) > 0) {
		echo "<table style = 'width:184%;margin-left:-495px'>";
			echo "<tr>";
			echo "<th>Name</th>";
			echo "<th>Dates</th>";
			echo "<th>Hours</th>";
			echo "<th>Prerequisites</th>";
		echo "</tr>";
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
			echo "<td>" . $row['name'];
			echo "<td>" . $row['dates'];
			echo "<td>" . $row['hours'];
			echo "<td>" . $row['prereq'];
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

</html>



