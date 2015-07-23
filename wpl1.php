<?php
if(!isset($_SESSION))
{
    session_start();
	if (!isset($_SESSION['global_user_name']))
	{
		
		include 'LogOut.php';
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Book Store</title>
<link rel="stylesheet" type="text/css" href="table.css" />
</head>
<body>

<div id="header">
<h1>Online Book Store</h1>
<h2>Welcome <?php echo $_SESSION["global_user_name"]?></br><input type="button" onclick="window.location='ViewCart.php'" value="View Cart"/>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" onclick="window.location='order.php'" value="View Order History"/></br></br>
<input type="button" onclick="window.location='LogOut.php'" value="Logout"/>
</h2>	
</div>

<div id="categories">
<h3> Categories </h3>
<a href=wpl1.php?category=Romance> Romance </a><br>
<a href=wpl1.php?category=Science_Fiction_and_Fantasy> Science Fiction and Fantasy </a><br>
<a href=wpl1.php?category=Children> Children </a><br>
<a href=wpl1.php?category=Teen_and_Young_Adult> Teen and Yound Adult</a><br>
<a href=wpl1.php?category=Mystery_Thriller_and_Suspense> Mystery ,Thriller , and Suspense </a><br>
<a href=wpl1.php?category=Comics_and_Graphic_Novels> Comics and Graphics Novels </a><br>
<a href=wpl1.php?category=Literature_and_Fiction> Literature and Fiction</a><br>
<a href=wpl1.php?category=Religion_and_Spirituality> Rligion and Spirituality </a><br>
<a href=wpl1.php?category=Business_and_Money> Business and Money </a><br>
<a href=wpl1.php?category=Biographies_and_Memoirs> Biographics and Memoirs </a><br>
<br>
</div>
<div id="Display">
<h1>Display List</h1>

<?php
include('connection.php');
if (isset($_GET['category']))
{
	$category=$_GET['category'];
	$category1=str_replace("_"," ",$category);
	$sqlQuery="Select bd.bookid,bd.bookname, bd.author, bd.price,bd.number_of_copies,bd.rating from book_details bd inner join      book_category bc on bd.bookid=bc.bookid inner join category c on bc.category_id = c.category_id where c.name ='".$category1."'";
	$res1= mysqli_query($con,$sqlQuery);
?> 
        <table class="data"></table><?php
		echo "<table><tr><th>Book Name</th><th>Author</th><th>Price</th><th>Number of Copies</th><th>Rating</th><th>Quantity (Between 1-5)</th><th>Add to cart?</th></tr>";
        while($row =mysqli_fetch_assoc($res1)) 
	    {
      		echo "<tr><form action='addToCart.php' method='get'>
				    <input type='hidden' value='".$row["bookid"]."' name='bookid' />
					<td><input type='hidden' value='".$row["bookname"]."' name='bookname' />".$row["bookname"]."</td>
					<td><input type='hidden' value='".$row["author"]."' name='author' />".$row["author"]."</td>
					<td><input type='hidden' value='".$row["price"]."' name='price' />".$row["price"]."</td>
					<td><input type='hidden' value='".$row["number_of_copies"]."' name='number_of_copies' />".$row["number_of_copies"]."</td>
					<td><input type='hidden' value='".$row["rating"]."' name='rating' />"."  ".$row["rating"]."</td>
					<td><input type='number' name='quantity' min='1' max='5'></td>
					<td><input type='submit' value='Add to Cart'></td></form></tr>";
   		}
		echo "</table>";
}
else 
{		
		echo " You have not selected any category";
}
?>
   
</div>
<div id="footer">
Copyright © OnlineBookStore.com
</div>
</body>
</html>
