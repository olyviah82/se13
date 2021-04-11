<?php

session_start();

require 'lib/password.php';
$errors = array();
$_SESSION['success'] = "";


require 'dbconnect.php';
$conn = new DBConnector();
$pdo = $conn->connectToDB();
$user_check = $_SESSION['email'];
$stmt = $pdo->prepare("SELECT email FROM employee WHERE email='$user_check'");
$stmt->execute($_POST["email"]);
$arr = $stmt->fetch();
$login_session = $arr['email'];
if (!$arr) exit('No rows');
var_export($arr);
$stmt = null;
