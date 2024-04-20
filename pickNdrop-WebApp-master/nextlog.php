<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Link  -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&family=Work+Sans:wght@700;900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/style.css">

    <title>pickNdrop Services</title>
</head>

<body>
    <!-- NAVIGATION BAR  -->
    <nav class="navbar sticky-top navbar-expand-md">
        <a class="navbar-brand fs-3 ms-3 " href="Home.html">
            <img class="logo" src="IMG/placeholder.png" alt="" height="30px" width="35px">
            <!-- pickNdrop -->
            <font color="#13375b">pickNdrop</font>
        </a>
        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-target="#btn">
            <i class='bx bx-menu'></i>
        </button>

        <div class="collapse navbar-collapse " id="btn">

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link mx-3" href="searchride.php">
                        <button class="btn1">
                            <img src="IMG/search-location.png" alt="" height="32px" width="32px">
                            Search a Ride
                        </button>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link mx-3" href="rider.php">
                        <button class="btn1">
                            <img src="IMG/add.png" alt="" height="32px" width="32px">
                            Publish a Ride
                        </button>
                    </a>
                </li>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">

                        <font color="black" class="nav-link mx-2 ">
                            <img src="IMG/login.png" alt="" height="35px" width="35px">
                            <?php
                            echo $_SESSION["name"];
                            echo " " . $_SESSION["lname"];


                            ?>
                        </font>

                    </li>


                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="home.html">
                            <button type="button" class="btn btn-danger">Logout</button>
                        </a>


                    </li>


                </ul>

        </div>
    </nav>

    <!-- BANNER AND SEARCH BUTTONS -->
    <div class="banner-container">
        <img src="IMG/communityride.jpg" alt="" height="600px" width="120%">;
    </div>

    <!-- PROPERTIES CARD  -->

    <div class=" properties-container">
        <div class=" property1" id="left">
            <div class="card text-center border shadow" style="width: 18rem;">
                <div class="card-body">
                    <img src="IMG/low-cost.png" alt="" height="50px" width="50px">
                    <h5 class="card-title">Your pick of rides at low prices</h5>
                    <p class="card-text">Find the perfect ride from our wide range of destinations and routes at low
                        prices.</p>
                </div>
            </div>
        </div>
        <div class=" property1" id="center">
            <div class="card text-center border shadow" style="width: 18rem;">
                <div class="card-body">
                    <img src="IMG/trust.png" alt="" height="50px" width="50px">
                    <h5 class="card-title">Trust who you travel with</h5>
                    <p class="card-text">We take the time to get to know each of our members, so you know who you’re
                        travelling with and can book your ride at ease on our secure platform.</p>

                </div>
            </div>
        </div>
        <div class=" property1" id="right">
            <div class="card text-center border shadow" style="width: 18rem;">
                <div class="card-body">
                    <img src="IMG/easy-to-use.png" alt="" height="50px" width="50px">
                    <h5 class="card-title">Scroll, click, tap and go!</h5>
                    <p class="card-text">Booking a ride has never been easier! Thanks to our simple app powered by great
                        technology, you can book a ride close to you in just minutes.</p>
                </div>
            </div>
        </div>

    </div>


    <!-- FOOTER  -->
    <div class="footer">
        <div class="terms-condition">
            <a href="http://">TERMS & CONDITIONS</a>
        </div>
        <div class="copyright">
            <img class="logo" src="IMG/placeholder.png" alt="" height="30px" width="35px">
            @pickNdrop,2023 ©
        </div>
    </div>

</body>

</html>