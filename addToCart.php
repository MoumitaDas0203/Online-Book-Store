<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<html>
<body>
<?php
	$bookname = $_GET['bookname'];
	$author = $_GET['author'];
	$price = $_GET['price'];
	$number_of_copies = $_GET['number_of_copies'];
	$quantity = $_GET['quantity'];
	$userid = $_SESSION["global_user_id"];
	$bookid = $_GET['bookid'];
	$new_price = $price * $quantity;
	
	$con= mysqli_connect("localhost","root","","BOOK_STORE");
	$insert_query = "insert into cart values('".$bookid."','".$userid."','".$quantity."','".$new_price."')";
	if (mysqli_query($con,$insert_query)){
		echo "Added to Cart !";
	}
	else{
		echo "Not added";
	}
	echo "<a href = 'wpl1.php'>Back</a>";
?>
</body>
</html>