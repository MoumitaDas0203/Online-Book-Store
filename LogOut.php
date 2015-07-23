<?php
if(!isset($_SESSION)){
    session_start();
}
session_unset(); 
session_destroy();

//deleting cart table
$con= mysqli_connect("localhost","root","","BOOK_STORE");
$delete_cart_query = "delete from cart";
mysqli_query($con,$delete_cart_query);		

echo 'You have been logged out. <a href="UserLogin.html">Go Back</a>';
exit();
?>