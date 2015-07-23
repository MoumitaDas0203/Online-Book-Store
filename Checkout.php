 <?php
if(!isset($_SESSION)){
    session_start();
}
		$username = $_SESSION["global_user_name"];
		$userid = $_SESSION["global_user_id"] ;
		$invoice=0;
		$con= mysqli_connect("localhost","root","","BOOK_STORE");
		$query = "SELECT sum(price) as total_price from cart";
		$result = mysqli_query($con,$query);
		while ($row = mysqli_fetch_array($result)) 
		{
			$invoice=$row['total_price'];
		}
		//inserting into order details
		$insert_order_details_query = "insert into order_details(order_date,delivery_date,invoice_total) values(CURRENT_TIMESTAMP(),date_add(CURRENT_TIMESTAMP(), INTERVAL 10 DAY),'".$invoice."')";
		mysqli_query($con,$insert_order_details_query);
		
		//fetching max(orderid) from order_details
		$fetch_max_orderid_query = "SELECT max(orderid) as max_orderid from order_details;";
		$result = mysqli_query($con,$fetch_max_orderid_query);
		while ($row = mysqli_fetch_array($result)) 
		{
			$max_orderid=$row['max_orderid'];
		}
		
		
		$query="SELECT * FROM cart";
		$result = mysqli_query($con,$query);
		while($row = mysqli_fetch_array($result))
		{
				$bookid=$row['bookid'];
				//inserting into order_history.
				$insert_order_history_query = "insert into order_history(orderid,userid,bookid) values(".$max_orderid.",".$userid.",".$bookid.")";
				mysqli_query($con,$insert_order_history_query);
		}
		
		//deleting all entries from cart.
		$delete_cart_query = "delete from cart";
		mysqli_query($con,$delete_cart_query);
		
		
		die("Your order has been placed..Total amount is: ".$invoice.". The expected delivery date is".date('l jS F (Y-m-d)', strtotime('+10 days'))."  <br /> <a href = 'wpl1.php'>Back to Home page</a>");
		
?>
