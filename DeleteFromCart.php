<?php

		$bookid = $_GET['bookid'];
		$copies = $_GET['copies'];
		echo $bookid."  ".$copies;
		$con= mysqli_connect("localhost","root","","BOOK_STORE");
		$insert_query = "delete from cart where bookid=".$bookid." and quantity=".$copies."";
		mysqli_query($con,$insert_query);
		header("Location: ViewCart.php");
?>
