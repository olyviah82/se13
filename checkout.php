<?php

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>Carousel Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="carousel.css" rel="stylesheet">
    <link href="display.css" rel="stylesheet">

    <link href="carousel.rtl.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">BCS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="homepage.php?logout='1'" tabindex="-1" aria-disabled="true">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled " href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['email']; ?></a>
                        </li>

                    </ul>


                    <h3>

                        <!-- information of the user logged in -->
                        <!-- welcome message for the logged in user -->



                </div>
        </nav>
    </header>

    <main>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

                        <rect width="100%" height="100%" fill="#777" />
                    </svg>

                    <div class="container">
                        <div class="carousel-caption text-start">
                            <img src="homepage.jpg" alt="homepage image" width="100%" height="50%">

                            <h1 style="color: black;">Get Services Today.</h1>
                            <!-- search tab -->

                        </div>
                    </div>
                </div>




                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" src="laundry.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <image href="homepage.jpg">
                            <rect width="100%" height="100%" fill="#777" />
                    </svg>

                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="70%" height="70%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="50%" height="50%" fill="#777" />
                    </svg>

                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-5">
                                <h2>checkout.php</h2>
                            </div>
                            <?php
                            if (!empty($_SESSION["cart"])) {
                            ?>

                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>email</th>
                                            <th>id</th>
                                            <th>Profile Picture</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Location</th>
                                            <th>Service</th>
                                            <th>Choose</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php


                                        foreach ($_SESSION["cart"] as $keys => $values) {
                                        ?>
                                            <tr>
                                                <td><?php echo $values["email"]; ?></td>
                                                <td><?php echo $values["id"]; ?></td>
                                                <td><?php echo $values["image"] ?></td>
                                                <td><?php echo $values["firstname"]; ?></td>
                                                <td><?php echo $values["lastname"] ?></td>
                                                <td><?php echo $values["Service"] ?></td>
                                                <td><a href="checkout.php?action=delete&id=<?php echo $values["id"]; ?>"><span>Remove</span></a>
                                                </td>
                                            </tr>
                                        <?php

                                        }
                                        ?>
                                        <?php
                                        echo '<a href="checkout.php?action=empty"><button class="btn btn-lg btn-primary"><span class=""></span> Empty Cart</button></a>&nbsp;<a href="homepage.php"><button class="btn btn-lg btn-primary">Continue Selecting</button></a>&nbsp;<a href="checkout.php"><button class="btn btn-lg btn-primary"><span class=""></span> Check Out</button></a>';
                                        ?>


                        </div>
                    </div>
                <?php
                            }
                            if (empty($_SESSION["cart"])) {
                ?>
                    <div class="col-sm-7">
                        <h1>Your checkout PAGE</h1>
                        <p>Oops! We can't FIND AND SELECTION here. Go back and <a href="homepage.php">CHOOSE now.</a>
                        </p>
                        <h5>Thank you so much!!!!</h5>
                    </div>
                <?php
                            }
                ?>

                </div>
            </div>
        </div>
    </main>
    <?php


    if (isset($_POST["add"])) {
        if (isset($_SESSION["cart"])) {
            $item_array_id = array_column($_SESSION["cart"], "id");
            if (!in_array($_GET["email"], $item_array_id)) {
                $count = count($_SESSION["cart"]);

                $item_array = array(
                    'email' => $_GET["email"],
                    'firstname' => $_POST["firstname"],
                    'lastname' => $_POST["lastname"],
                    'location' => $_POST["location"],
                    'service' => $_POST["service"]
                );
                echo $item_array;
                $_SESSION["cart"][$count] = $item_array;
                header('Location: cart.php');
            } else {
                echo '<h4>"services already placed"<h4>';
                header('Location: checkout.php');
            }
        } else {
            $item_array = array(
                'email' => $_GET["email"],
                'firstname' => $_POST["firstname"],
                'lastname' => $_POST["lastname"],
                'location' => $_POST["location"],
                'service' => $_POST["service"]
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
            foreach ($_SESSION["cart"] as $keys => $values) {
                if ($values["email"] == $_GET["email"]) {
                    unset($_SESSION["cart"][$keys]);
                    echo '<h2>"Food has been removed</h2>';
                    header('Location: checkout.php');
                }
            }
        }
    }

    if (isset($_GET["action"])) {
        if ($_GET["action"] == "empty") {
            foreach ($_SESSION["cart"] as $keys => $values) {

                unset($_SESSION["cart"]);
                echo '<h3>"Cart is made empty!"</h3>';
                header('Location: cart.php');
            }
        }
    }


    ?>



</body>

</html>