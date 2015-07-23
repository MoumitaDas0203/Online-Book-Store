<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<html>
<body>
<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "book_store";
	$con = mysqli_connect($servername, $username, $password, $dbname);
	$u = strval($_POST['username']);
	$pwd = strval($_POST['pwd']);
	$user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM customer_login WHERE email = '".$u."' and password = '".$pwd."'"));
	if($user == 0)
	{
		die("That username doesn't exist ! Try making one today ! <br /><a href='UserSignUp.html'>Sign Up</a>");
	}
	if($user['password'] != $pwd)
	{
		die("Incorrect password ! <br /> <a href = 'UserLogin.php'>Back</a>");
	}
	mysqli_close($con);
	$name = $user['name'];
	$userid = $user['userid'];
	
	$_SESSION["global_user_name"] = $name;
	$_SESSION["global_user_id"] = $userid;
	
	include 'wpl1.php';
	
?>
</body>
</html>