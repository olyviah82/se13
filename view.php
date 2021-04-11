<?php
include 'processlogin.php';
include_once './util.php';
include_once 'dbconnect.php';
$conn = new DBConnector();
$pdo = $conn->connectToDB();
$_SESSION['email'] = $emailadd;
