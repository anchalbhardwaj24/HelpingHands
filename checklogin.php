<?php
session_start();
?>

<?php
	
$con = mysqli_connect("localhost", "root", "mysql", "deltaX");

if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
	 $_SESSION['email'] = $uname;
    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where email='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];
        if($count > 0){
            header('Location: home.php');
			echo "hi";
        }else{
            echo "Invalid username and password";
        }

    }

}
