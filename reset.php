<?php
session_start();
$_SESSION['level'] = 0;
$_SESSION['right_answers'] = 0;
$_SESSION['wrong_answers'] = 0;
//var_dump($_SESSION['level']);exit;
header('Location:dashboard.php');

