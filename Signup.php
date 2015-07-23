<?php

	$con=mysqli_connect("localhost","root","","book_store");
	$response_array=array();
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$addr = $_POST['addr'];
	$phone = $_POST['phone'];
	$pin = intval($_POST['pin']);
	$pass = $_POST['pass'];
		
		$result = mysqli_query($con,"SELECT * FROM customer_login WHERE email='".$email."'");
		$data = mysqli_num_rows($result);
		if(($data)==0)
		{
			$insert_query = "insert into customer_login(password,name,email,address,pin,phone) values('".$pass."','".$uname."','".$email."','".$addr."',".$pin.",'".$phone."')";
			mysqli_query($con,$insert_query);
			$response_array['success'] = true;
			$response_array['message'] = 'Success!';
			header('Location: UserLogin.html');
		}
		else
		{	
			$response_array['success'] = false;
			$response_array['message'] = 'Failure!';
			header('Location: UserSignUp.html');
		}
		echo json_encode($response_array);
?>