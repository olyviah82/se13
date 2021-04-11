<?php


session_start();

require 'lib/password.php';


require 'dbconnect.php';
$conn = new DBConnector();
$pdo = $conn->connectToDB();




if (isset($_POST['login'])) {

    //Retrieve the field values from our login form.
    $emailadd = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    //Retrieve the user account information for the given username.
    $sql = "SELECT id, email, password FROM hirer WHERE email = :email";
    $stmt = $pdo->prepare($sql);

    //Bind value.
    $stmt->bindValue(':email', $emailadd);

    //Execute.
    $stmt->execute();

    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //If $row is FALSE.
    if ($user === false) {
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username / password combination!');
    } else {
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.

        //Compare the passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);

        //If $validPassword is TRUE, the login has been successful.
        if ($validPassword) {

            //Provide the user with a login session.
            $_SESSION['email'] = $emailadd;
            $_SESSION['logged_in'] = time();

            //Redirect to our protected page, which we called home.php
            header('Location: homepage.php', true, 301);
            exit();
        } else {
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect username / password combination!');
        }
    }
}