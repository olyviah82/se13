<?php
include('processlogin.php');
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You have to log in first";
    // header('location: signin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: signin.php");
}
?>



<!DOCTYPE HTML>
<html>

<head>



    <title> Blue Collar Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="register.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<?php
include_once './util.php';
include_once 'dbconnect.php';
$conn = new DBConnector();
$pdo = $conn->connectToDB();
$id = $_SESSION['email'];
$stmt = $pdo->prepare('SELECT * FROM hirer WHERE email=:id ');
$stmt->bindParam(":id", $id, PDO::PARAM_INT, 1);
if ($stmt->execute()) {
    echo " Success <br>";
    $row = $stmt->fetch(PDO::FETCH_OBJ);
} else {
    print_r($pdo->errorInfo());
}
?>


<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="logo.jpg" alt="" />
                <h3 href="homepage.php">Welcome </h3>
                <a href="homepage.php"> Back to Homepage</a>
                <p>EDIT YOUR PROFILE!</p>

                <br />
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Hirer </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled " href="#" tabindex="-1"
                            aria-disabled="true"><?php echo $_SESSION['email']; ?></a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">EDIT PROFILE</h3>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row register-form">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" name="firstname"
                                            placeholder="First Name *" value="<?php $row->firstname; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" name="lastname"
                                            placeholder="Last Name *" value="<?php $row->lastname; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="male" checked>
                                                <span> Male </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="female">
                                                <span>Female </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Service">Service</label>
                                        <select class="form-control" name="service">
                                            <option class="hidden"> Watchman
                                            </option>
                                            <option>Laundry</option>
                                            <option>Cleaner</option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="PhoneNumber">Phone Number</label>
                                        <input type="text" minlength="10" maxlength="10" name="txtEmpPhone"
                                            class="form-control" placeholder="Your Phone *"
                                            value="<?php $row->phone; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="Location">Location</label>
                                        <select class="form-control" name="location" id="location">
                                            <option> Kakamega
                                            </option>
                                            <option>Nairobi</option>
                                            <option>Kisumu</option>
                                            <option>Mombasa</option>
                                        </select>
                                    </div>

                                    <input type="submit" class="btnRegister" name="submit" value="Update" />

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $service = $_POST['service'];
    $phone = $_POST['txtEmpPhone'];
    $location = $_POST['location'];

    $stmt = $pdo->prepare('UPDATE hirer SET firstname=:fname,lastname=:lname,location=:loc,service=:ser,gender=:gender,phone=:pho WHERE email=:uid');
    $stmt->bindParam(':fname', $firstame);
    $stmt->bindParam(':lname', $lastname);
    $stmt->bindParam(':loc', $location);
    $stmt->bindParam(':ser', $service);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':pho', $phone);
    $stmt->bindParam(':uid', $id);
    if ($stmt->execute()) {

        if ($stmt->rowCount() != 1) {
            print_r($stmt->errorInfo()); // if any error is there it will be posted
            $msg = " Database problem, please contact site admin ";
            $db_status = 'NOTOK';
            $msg = 'Record Not updated';
        } else {
            echo "Successfully updated Profile";

            $msg = 'One record updated';
            $db_status = 'OK';
?>
<script type="text/javascript">
alert("Update Successfull.");
window.location = "homepage.php";
</script>
<?php

        }
    }


    ?>
<!--  -->
<?php
}
?>