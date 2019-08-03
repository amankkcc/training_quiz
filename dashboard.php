<?php 
session_start();
if(isset($_SESSION['email'])){

include('connect.php');

$i = 0;
$sql = "select * from questions limit $i,1";

$q = mysqli_query($con, $sql);

if($q->num_rows>0)
{
	$question = mysqli_fetch_array($q, MYSQLI_ASSOC);
	// var_dump($question); //exit;
}

if(isset($_POST['submit'])){
	$submit_answer = $_POST['answer'];
	

	$i++;
	var_dump($i++);
	$sql = "select * from questions limit $i,1";

	$q = mysqli_query($con, $sql);

	if($q->num_rows>0)
	{
		$question = mysqli_fetch_array($q, MYSQLI_ASSOC);
		// var_dump($question); //exit;
	}
}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<nav>
		<a href="logout.php">Logout</a>
	</nav>
	<h1>Student Dashboard</h1>
	<form align="center" method="post">
		<h3 >Question : <?php echo $question['question']; ?></h3>
		<table align="center">
			
			<tr>
				<td><input type="radio" value="opt1" name="answer"><label><?php echo $question['opt1']; ?></label></td>
				<td><input type="radio" value="opt2" name="answer"><label><?php echo $question['opt2']; ?></label></td>
			</tr>
			<tr>
				<td><input type="radio" value="opt3" name="answer"><label><?php echo $question['opt3']; ?></label></td>
				<td><input type="radio" value="opt4" name="answer"><label><?php echo $question['opt4']; ?></label></td>
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