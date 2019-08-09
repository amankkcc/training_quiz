<?php 
session_start();
include('connect.php');
if(isset($_SESSION['email'])){

if(!isset($_POST['submit'])){
	if(isset($_SESSION['level'])){
		$level = $_SESSION['level'];	
	}else{
		$level = 0;
	}
	$sql = "select * from questions limit $level, 1";
	$q = mysqli_query($con, $sql);
	if($q->num_rows>0)
	{
		$question = mysqli_fetch_array($q, MYSQLI_ASSOC);
		
		$_SESSION['answer'] = $question['answer'];
		$_SESSION['qid'] = $question['qid'];
	}
}// end of isset submit

if(isset($_POST['submit'])){
	$submit_answer = $_POST['answer'];

	$right_answers = $_SESSION['right_answers'];
	$wrong_answers = $_SESSION['wrong_answers'];
	if($submit_answer == $_SESSION['answer']){
		$right_answers++;
		$_SESSION['right_answers'] = $right_answers;
	}else{
		$wrong_answers++;
		$_SESSION['wrong_answers'] = $wrong_answers;
	}
	echo "Right answer $right_answers<br>";
	echo "Wrong answer $wrong_answers<br>";
	$i = $_SESSION['level'];
	$i++;
	$sql = "select * from questions limit $i,1";
	$q = mysqli_query($con, $sql);
	$_SESSION['level'] = $i;
	if($q->num_rows>0)
	{	
		$question = mysqli_fetch_array($q, MYSQLI_ASSOC);
		$_SESSION['answer'] = $question['answer'];
		$_SESSION['qid'] = $question['qid'];
	}else{
		header('Location:result.php');
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
		<a href="reset.php">Reset</a>
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