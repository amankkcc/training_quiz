<?php
include('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];


$sql = "select * from users where email = '$email' and password = '$password'";

$result = mysqli_query($con, $sql);

$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

if($user){
	echo "Logged In";
}else{
	echo "Email or password is wrong";
}

?>