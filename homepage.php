<?php
//session_start();
include('processlogin.php');
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: signin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: signin.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Carousel Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="carousel.css" rel="stylesheet">

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


    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">BCS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link " href="homepage.php?logout='1'" tabindex="-1"
                                aria-disabled="true">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled " href="#" tabindex="-1"
                                aria-disabled="true"><?php echo $_SESSION['email']; ?></a>
                        </li>

                    </ul>


                    <h3>

                        <!-- information of the user logged in -->
                        <!-- welcome message for the logged in user -->

                        <form class=" d-flex">



                            <input class=" form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>

                </div>
        </nav>
    </header>

    <main>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

                        <rect width="100%" height="100%" fill="#777" />
                    </svg>

                    <div class="container">
                        <div class="carousel-caption text-start">
                            <img src="homepage.jpg" alt="homepage image" width="100%" height="50%">
                            <h1 style="color: black;">Get Services Today.</h1>
                            <p style="color: black;">In a community we need each other.</p>
                            <p><a class="btn btn-lg btn-primary" href="registration.php">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" src="laundry.jpg" aria-hidden="true"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
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
                    <svg class="bd-placeholder-img" width="70%" height="70%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
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


        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="200" height="200"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <image href="watchmansvg.jpg">
                            <title>Laundry</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                                dy=".3em">140x140</text>
                    </svg>

                    <h2>Security</h2>
                    <p>To get some of the finest security for our home, Don't worry we gatchu.</p>
                    <p><a class="btn btn-secondary" href="watchman.php">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="200" height="200"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <image href="laundryicon.png">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                                dy=".3em">140x140</text>
                    </svg>

                    <h2>Laundry</h2>
                    <p>You want them watched and cleaned thoroughly,We have your back.</p>
                    <p><a class="btn btn-secondary" href="laundry.php">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="200" height="200"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <image href="cleanericon.png">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                                dy=".3em">140x140</text>
                    </svg>

                    <h2>Cleaners</h2>
                    <p>Clean home,Happy home.</p>
                    <p><a class="btn btn-secondary" href="cleaner.php">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Taking Care of our Women. <span class="text-muted">It’ll blow your
                            mind.</span></h2>
                    <p class="lead">With this website we will be able to connect various women and men also to easily
                        get jobs and also they'll assist you in the process.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                        height="500" src="laundry.jpg" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#eee" /> <text x="50%" y="50%" fill="#aaa"
                        dy=".3em">Laundry</text>


                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for
                            yourself.</span></h2>
                    <p class="lead">We all want to sleep in a secure home, and some want to sleep with full stomachs.
                        This helps in connecting people with two different agendas but still help each other in the
                        process</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                        height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <image href="watchman.jpg">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                                dy=".3em">500x500</text>
                    </svg>

                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                    <p class="lead">This feature will help those people who are either not ble to get cleaners because
                        they are in a new location get the cleaners to go to them.</p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                        height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <image href="cleaners.jpg">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                                dy=".3em">500x500</text>
                    </svg>

                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2017–2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
    </main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>