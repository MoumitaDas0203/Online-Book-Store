<?php
if(!isset($_SESSION)){
    session_start();
}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "book_store";
	$con = mysqli_connect($servername, $username, $password, $dbname);
	$u = strval($_POST['username']);
	$pwd = strval($_POST['pwd']);
	$cpwd = strval($_POST['pwd2']);
	
	if(!($pwd === $cpwd))
	{
		die("Both Passwords don't match");
	}
	
	$user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM customer_login WHERE email = '".$u."'"));

	if($user == 0)
	{
		echo $user;
		die("That username doesn't exist ! Try making one today ! <br /><a href='UserSignUp.html'>Sign Up</a>");
	}
	if($user['password'] != $pwd)
	{
		$update_Query = "update customer_login set password = '".$pwd."' where email = '".$u."'";
		mysqli_query($con,$update_Query);
		echo "Password has been reset. <br /><a href='UserLogin.html'>Sign In</a>";
	}
	mysqli_close($con);
?>