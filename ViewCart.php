<?php
if(!isset($_SESSION)){
   session_start();
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="ViewCart.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>

<div id="header">
<h1>Online Book Store</h1>
</div>
        
		</br></br></br>
        <center>
		<table border='2px'>
		<tr><td><b>Book Name</b></td><td><b>Book ID</b></td><td><b>Quantity</b></td><td><b>Price</b></td><td><b>Remove</b></td></tr>
		<?php
		include('connection.php');
		if (!mysqli_connect_errno())
		{
			$query="SELECT * FROM cart";
			$result = mysqli_query($con,$query);
			$bookname="";
			while($row = mysqli_fetch_array($result))
			{
				$query2="SELECT * FROM book_details where bookid=".$row['bookid']."";
				$result2 = mysqli_query($con,$query2);
				while($row2 = mysqli_fetch_array($result2))
				{
					$bookname=$row2['bookname'];
					break;
				}
				echo '<tr><td>'.$bookname.'</td><td>'.$row['bookid'].'</td><td>'.$row['quantity'].'</td><td>'.$row['price'].'</td><td><form action="DeleteFromCart.php" method="get"><input type="hidden" value="'.$row["bookid"].'" name="bookid" /><input type="hidden" value="'.$row["quantity"].'" name="copies" /><input type="submit" value="Remove"></form></td></tr>';
			}
		}
		?>
		</table>
		</br></br></br>
		<form action='Checkout.php'>
			<input type="submit" value="Final Checkout"></br></br>
			<input type="button" onclick="window.location='wpl1.php'" value="Home"/>
		</form>
		<center>
		
		<div id="footer">
        Copyright © OnlineBookStore.com
        </div>

		
	</body>


</html>