<?php 

session_start();
if(isset($_SESSION['email'])){  ?>
<html>
<head>
	<title></title>
</head>
<body>
	<nav>
		<a href="logout.php">Logout</a>
	</nav>
	<h1>Student Dashboard</h1>
	<?php echo $_SESSION['email']; ?>
</body>
</html>


<?php }else{
	header('Location:index.php');
}
?>