<?php
if(!isset($_SESSION))
{
    session_start();
	if (!isset($_SESSION['global_user_name']))
	{
		include 'LogOut.php';
	}
}?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order history</title>

<link rel="stylesheet" type="text/css" href="table.css" />



</head>

<body>


<div id="header">
<h1>Online Book Store</h1>
<h2>Welcome <?php echo $_SESSION["global_user_name"]?></br><input type="button" onclick="window.location='wpl1.php'" value="Home"/>
</div>

<div id="Display">
<h1>Display List</h1>

<center>
<table border='2px'>
<tr><td><b>Order ID</b></td><td><b>Order Date</b></td><td><b>Delivery Date</b></td><td><b>Book ID</b></td><td><b>Book Name</b></td></tr>

  <?php
		$con= mysqli_connect("localhost","root","","BOOK_STORE");
		$userid=$_SESSION["global_user_id"];
		$query="SELECT * FROM order_history where userid=".$userid." ";
		$result = mysqli_query($con,$query);
		while($row = mysqli_fetch_array($result))
		{
				$orderid=$row['orderid'];
				$query2="SELECT * FROM order_details where orderid=".$orderid." ";
				$result2 = mysqli_query($con,$query2);
				while($row2 = mysqli_fetch_array($result2))
				{
					echo "<tr><td>".$orderid."</td><td>".$row2['order_date']."</td><td>".$row2['delivery_date']."</td>";
				}
				echo "<td>".$row['bookid']."</td>";
				
				$query3="SELECT * FROM book_details where bookid=".$row['bookid']." ";
				$result3 = mysqli_query($con,$query3);
				while($row3 = mysqli_fetch_array($result3))
				{
					echo "<td>".$row3['bookname']."</td></tr>";
				}
		}
		?>
		</table>
		</center>
		</br></br></br>
			
		
		




<div id="footer">
        Copyright © OnlineBookStore.com
        </div>



</body>
</html>