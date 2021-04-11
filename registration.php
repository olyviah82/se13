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
</head>

<body>


    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="logo.jpg" alt="" />
                <h3>Welcome</h3>
                <p>You are 30 seconds away from earning your own money!</p>
                <a href="signin.php">LOG IN</a>
                <br />
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hirer</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Apply as a Employee</h3>
                        <form action="processregisteremp.php" method="POST" enctype="multipart/form-data">
                            <div class="row register-form">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" placeholder="First Name *" value="" name="firstname" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmpassword">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password *" value="" required />
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
                                        <label for="email">Confirm Password</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email address *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="PhoneNumber">Phone Number</label>
                                        <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" required />
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

                                    <input type="submit" class="btnRegister" name="register" value="Register" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Apply as a Hirer</h3>
                        <form action="processregisterhirer.php" method="POST" enctype="multipart/form-data">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" placeholder="First Name *" value="" name="firstname" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name *" value="" required />
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="userName *" value="" required />
                                    </div> -->
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmpassword">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password *" value="" required />
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
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" name="email" placeholder="Your Email *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="PhoneNumber">Phone Number</label>
                                        <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Your Phone *" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="Location">Location</label>
                                        <select class="form-control" name="location">
                                            <option class="hidden"> Kakamega
                                            </option>
                                            <option>Nairobi</option>
                                            <option>Kisumu</option>
                                            <option>Mombasa</option>
                                        </select>
                                    </div>
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
                                        <label for="image_path"> Add Image</label>
                                        <input class="names" type="file" name="image_path" id="image_path" placeholder="enter the image">
                                    </div>
                                    <input type="submit" class="btnRegister" name="register" value="Register" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </form>
</body>

</html>