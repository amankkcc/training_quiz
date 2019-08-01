<?php


$con = mysqli_connect("localhost","training_quiz","quiz1234");

if($con){
	mysqli_select_db($con,'training_quiz');
	
}else{
	echo mysqli_error($con);
}