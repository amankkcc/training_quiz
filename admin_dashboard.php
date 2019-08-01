<?php 

session_start();
if(isset($_SESSION['email'])){  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<nav>
		<a href="logout.php">Logout</a>
	</nav>
	<h1>Admin Dashboard</h1>
</body>
</html>

<?php }else{
	header('Location:index.php');
}
?>

