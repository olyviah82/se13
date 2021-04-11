<?php
include_once './util.php';
include_once 'dbconnect.php';
$conn = new DBConnector();
$pdo = $conn->connectToDB();
// $db_server = "localhost";
// $db_username = "root";
// $db_password = "";
// $db_database = "bcs";
$errors = array();
session_start();
if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $emailadd = $_POST['email'];
    $location1 = $_POST['location'];
    $gender = $_POST['gender'];
    $phone = $_POST['txtEmpPhone'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    var_dump($_POST);
    if (empty($firstname)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if ($password != $confirmpassword) {
        array_push($errors, "The two passwords do not match");
    }

    if ($password == $confirmpassword) {
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        try {
            var_dump($pdo);
            $stmt = $pdo->prepare('INSERT INTO employee (firstname, lastname,email,location,gender,phone,password,confirmpassword) VALUES(?,?,?,?,?,?,?,?)');
            $stmt->execute([$firstname, $lastname, $emailadd, $location1, $gender, $phone, $passwordhash, $passwordhash]);
            echo "<script>alert('Account successfully added!'); window.location='registration.php'</script>";
        } catch (PDOException $e) {
            echo
            "<script>alert('error has occurred'); window.location='registration.php'</script>" . $e->getMessage();
        }


        //         $conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
        //         $sql = "INSERT INTO employee (firstname, lastname,email,location,gender,phone,password,confirmpassword user_name)
        // VALUES ('$firstname', '$lastname','$emailadd','$location1','$gender','$phone','$password','confirmpassword')";
        //         $conn->exec($sql);
        //         echo "added successfully";
        //         echo "<script>alert('Account successfully added!'); window.location='registration.php'</script>";
        //     } else {
        //         echo "<script>alert('password does not match confirm password'); window.location='registration.php'</script>";
    } else {
        echo "<script>alert('password does not match confirm password'); window.location='registration.php'</script>";
    }
}