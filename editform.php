<?php
error_reporting(~E_NOTICE);
require_once 'dbconnect.php';
$conn = new DBConnector();
$pdo = $conn->connectToDB();

if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $stmt_edit = $DB_con->prepare('SELECT firstname,lastname,location,service,gender,phone FROM hirer WHERE email=:uid');

    $stmt_edit->execute(array(':uid' => $id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
} else {
    header("Location: homepage.php");
}
if (isset($_POST['btn_save_updates'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $location = $_POST['location'];
    $service = $_POST['service'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    $stmt = $DB_con->prepare('UPDATE users SET firstname=:fname,lastname=:lname,location=:loc,service=:ser,gender=:gender,phone=:pho WHERE email=:uid');
    $stmt->bindParam(':fname', $firstame);
    $stmt->bindParam(':lname', $lastname);
    $stmt->bindParam(':loc', $location);
    $stmt->bindParam(':ser', $service);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':pho', $phone);
    $stmt->bindParam(':uid', $id);
  if($stmt->execute()){
			echo "<script> alert('Successfully Updated...');
				window.location.href='home.php';</script>"	;


			}
			else{
				echo "Sorry User Could Not Be Updated!";
			}  


}