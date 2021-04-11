<?php
include_once './util.php';
include_once 'dbconnect.php';
$conn = new DBConnector();
$pdo = $conn->connectToDB();


session_start();
if (isset($_POST['register'])) {
    $firstname = !empty($_POST['firstname']) ? trim($_POST['firstname']) : null;
    $lastname = !empty($_POST['lastname']) ? trim($_POST['lastname']) : null;
    $emailadd = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $location1 = !empty($_POST['location']) ? trim($_POST['location']) : null;

    $gender = !empty($_POST['gender']) ? trim($_POST['gender']) : null;
    $phone = !empty($_POST['txtEmpPhone']) ? trim($_POST['txtEmpPhone']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $confirmpassword = !empty($_POST['confirmpassword']) ? trim($_POST['confirmpassword']) : null;
    if ($password != $confirmpassword) {
        echo "<script>alert('password does not match!'); window.location='registration.php'</script>";
    }

    $sql = "SELECT COUNT(email) AS num FROM employee WHERE email = :email";
    $stmt = $pdo->prepare($sql);

    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':email', $emailadd);

    //Execute.
    $stmt->execute();

    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //If the provided username already exists - display error.
    //TO ADD - Your own method of handling this error. For example purposes,
    //I'm just going to kill the script completely, as error handling is outside
    //the scope of this tutorial.
    if ($row['num'] > 0) {
        die('<script>alert("email already exists")</script>');
    }
    // Query for Insertion
    $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
    $stmt = $pdo->prepare('INSERT INTO employee (firstname, lastname,email,location,gender,phone,password,confirmpassword) VALUES(:firstname,:lastname,:email,:location,:gender,:phone,:password,:confirmpassword)');


    $stmt->bindValue(':firstname', $firstname);
    $stmt->bindValue(':lastname', $lastname);
    $stmt->bindValue(':email', $emailadd);
    $stmt->bindValue(':location', $location1);
    $stmt->bindValue(':gender', $gender);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':confirmpassword', $passwordHash);
    $result = $stmt->execute();
    if ($result) {
        //What you do here is up to you!
        echo 'Thank you for registering with our website.';
    }
}