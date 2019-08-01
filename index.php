<?php
session_start();
include('connect.php');
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "select * from users where email = '$email' and password = '$password'";

	$result = mysqli_query($con, $sql);
	//var_dump($result); exit;
	$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if($result->num_rows>0){
		$session_array = array('email' => $user['email'], 'user_type' => $user['user_type']);
		$_SESSION = $session_array;
		if($user['user_type'] == 0){

			//go to student dashbord
			header("Location:dashboard.php");
		}else{
			//go to admin dashboard
			header("Location:admin_dashboard.php");
		}
	}else{
		$msg =  "Email or password is wrong";
	}
}//end of if isset


?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title></title>
	</head>
	<body class="body">
		<div class="container" >
			<form action="index.php" method="post">
				<label style="position: center; color:red"><?php if(isset($msg)){ echo $msg; }  ?></label>
				<input type="email" name="email" class="input1"placeholder="enter your email" style="color: white;" ><br>
				<input type="Password" name="password" class="input2" placeholder="enter Password" style="color: white;" ><br>
				
				<input type="submit" name="submit" value="Login" class="btn1" style="color: white;">
				<a href="Register.html"><input type="submit" name="" value="Signup" class="btn2" style="color: white;"></a><br><br>
				<a href="forgot.html" class="anchor" ><span style="color: green;"> Forgot password ?</span>  </a>
			</form>
			
		</div>
	</body>
</html>