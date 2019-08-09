<?php 

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Total Questions <?php echo $_SESSION['right_answers']+$_SESSION['wrong_answers']; ?></h1>
	<h2>Total Right Answers <?php echo $_SESSION['right_answers']; ?></h1>
	<h2>Total Wrong Answers <?php echo $_SESSION['wrong_answers']; ?></h1>
		<h3><a href="reset.php">Go to Home</a></h3>
</body>
</html>