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
    $service = !empty($_POST['service']) ? trim($_POST['service']) : null;
    $gender = !empty($_POST['gender']) ? trim($_POST['gender']) : null;
    $phone = !empty($_POST['phone']) ? trim($_POST['phone']) : null;
    $image_path = $_FILES['image_path'];
    $original_file_name = $_FILES["image_path"]["name"];
    $file_tmp_location = $_FILES["image_path"]["tmp_name"];
    $file_path = "images/";
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $confirmpassword = !empty($_POST['confirmpassword']) ? trim($_POST['confirmpassword']) : null;
    if ($password != $confirmpassword) {
        echo "<script>alert('password does not match!'); window.location='registration.php'</script>";
    }

    $sql = "SELECT COUNT(email) AS num FROM hirer WHERE email = :email";
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
    if (move_uploaded_file($file_tmp_location, $file_path . $original_file_name)) {

        $stmt = $pdo->prepare('INSERT INTO hirer (firstname, lastname,email,location,service,gender,phone,image,password,confirmpassword) VALUES(:firstname,:lastname,:email,:location,:service,:gender,:phone,:image,:password,:confirmpassword)');
    }

    $stmt->bindValue(':firstname', $firstname);
    $stmt->bindValue(':lastname', $lastname);
    $stmt->bindValue(':email', $emailadd);
    $stmt->bindValue(':location', $location1);
    $stmt->bindValue(':service', $service);
    $stmt->bindValue(':gender', $gender);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':image', $original_file_name);
    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':confirmpassword', $passwordHash);
    $result = $stmt->execute();
    if ($result) {
        //What you do here is up to you!
        echo 'Thank you for registering with our website.';
    }
}