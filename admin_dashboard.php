<?php 
session_start();
	
	if(isset($_POST['submit'])){
		include('connect.php');

		$question = $_POST['question'];
		$opt1 = $_POST['ans1'];
		$opt2 = $_POST['ans2'];
		$opt3 = $_POST['ans3'];
		$opt4 = $_POST['ans4'];
		$answer = $_POST['answer'];

		$sql_query = "insert into questions(question, opt1, opt2, opt3, opt4, answer) values('$question', '$opt1', '$opt2', '$opt3' , '$opt4', '$answer')";

		$result = mysqli_query($con, $sql_query);

		if($result){
			$msg = "Question Inserted.";
		}else{
			$msg = myslqli_error($con);
		}
	}// end of isset if block

if(isset($_SESSION['email'])){  ?>
<!DOCTYPE html>
<html>
<head>
  <title>welcome</title>
  <link rel="stylesheet" type="text/css" href="jjquiz.css">
</head>
<body>
	<nav>
		<a href="logout.php">Logout</a>
	</nav>
  <h1 align="center"><i><u>Admin Dashboard</i></u></h1>

<div class="div">
<form method="post"  >
  <table width="80%"  border="1" align="center">
    
    <tr>
        <td height="26"><div align="left"><strong> Enter Question </strong></div></td>
        <td>&nbsp;</td>
      <td><textarea name="question" cols="60" rows="2" id="addque" class="s"></textarea></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>option (a) </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="ans1" type="text" id="ans1" size="85" maxlength="85" class="s"></td>
    </tr>
    <tr>
      <td height="26"><strong>option (b) </strong></td>
      <td>&nbsp;</td>
      <td><input name="ans2" type="text" id="ans2" size="85" maxlength="85" class="s"></td>
    </tr>
    <tr>
      <td height="26"><strong>option (c) </strong></td>
      <td>&nbsp;</td>
      <td><input name="ans3" type="text" id="ans3" size="85" maxlength="85" class="s"></td>
    </tr>
    <tr>
      <td height="26"><strong>option (d)</strong></td>
      <td>&nbsp;</td>
      <td><input name="ans4" type="text" id="ans4" size="85" maxlength="85" class="s"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter True Answer </strong></td>
      <td>&nbsp;</td>
		<td>
	       	<select name="answer" class="drop">
		        <option value="0" disabled>Select :</option>
		        <option value="a">A</option>
		        <option value="b">B</option>
		        <option value="c">C</option>
		        <option value="d">D</option>
	       </select>
   		</td>
    </tr>
    <tr>
      <td height="26"></td>
      <td></td>
      <td><input type="submit" name="submit" value="Add" class="btn"></td>
    </tr>
  </table>
  <h3 align="center"><?php if(isset($msg)) echo $msg; ?></h3>
</form>

<p>&nbsp; </p>
</div>
</body>
</html>




<?php }else{
	header('Location:index.php');
}
?>

