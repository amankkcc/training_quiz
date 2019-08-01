<?php

if(isset($_POST['submit'])){
  include('connect.php');
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $mobile = $_POST['mobile'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];

  $sql = "insert into users(name,email,password,mobile, gender, dob) values('$name', '$email', '$password', '$mobile', '$gender', '$dob')";

   $result = mysqli_query($con, $sql);

   if($result){
   	$msg = true;
   }else{
   	echo mysqli_error($con);
   }
   mysqli_close($con);	
}

?>
 <!DOCTYPE html>
<html>
  <head>
      <title></title>
      <link rel="stylesheet" type="text/css" href="register.css">
  </head>
  <body>
    <div class="formDiv">
      <form action="register.php" method = "post">
        <div class="container">
          <h1>Register</h1>
          
          <hr>
          <?php if($msg){  ?>
            <div>
              <h1 style="color:green">User Registered</h1>
            </div>
          <?php }else{ ?>
            <p>Please fill in this form to create an account.</p>
          <?php } 
          ?>
          <br>
          <label for="name"><b>Name</b></label>
          <input type="text" placeholder="Enter your name" name="name" required>

          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>

          <label for="mobile"><b>Mobile No.</b></label>
          <input type="text" placeholder="Enter your mobile No." name="mobile" required>

           <label for="gender"><b>Gender </b></label>
          <input type="radio" value="m" name="gender" required>male<input type="radio" value="f"  name="gender" required>female<br><br>

           <label for="dob"><b>dob</b></label>
          <input type="date" placeholder="Enter your dob" name="dob" required class="dob">

          <hr>

          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
          <input type="submit" name="submit" value="Submit" class="registerbtn">
        </div>

        <div class="container signin">
          <p>Already have an account? <a href="index.html">Login</a>.</p>
        </div>
      </form> 
    </div>
    
  </body>
</html>