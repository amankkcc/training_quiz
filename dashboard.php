<?php 
session_start();

include('connect.php');
$sql = "select * from questions limit 0,1";

$q = mysqli_query($con, $sql);

if($q->num_rows>0)
{
	$question = mysqli_fetch_array($q, MYSQLI_ASSOC);
	 
}
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
	<form align="center">
		<h3 >Question : <?php echo $question['question']; ?></h3>
		<table align="center">
			
			<tr>
				<td><input type="radio" name="answer"><label><?php echo $question['opt1']; ?></label></td>
				<td><input type="radio" name="answer"><label><?php echo $question['opt2']; ?></label></td>
			</tr>
			<tr>
				<td><input type="radio" name="answer"><label><?php echo $question['opt3']; ?></label></td>
				<td><input type="radio" name="answer"><label><?php echo $question['opt4']; ?></label></td>
			</tr>
		</table>
		<input type="submit" value="Next" name="submit">
	</form>
</body>
</html>


<?php }else{
	header('Location:index.php');
}
?>