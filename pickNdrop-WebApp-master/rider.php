<?php
session_start();
$fname= $_SESSION["name"];
$lname= $_SESSION["lname"];
$dob=$_SESSION["dob"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&family=Work+Sans:wght@700;900" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Publish a Ride</title>
</head>

<body >
    <nav class="navbar sticky-top navbar-expand-md">
        <a class="navbar-brand fs-3 ms-3 " href="index.html">
            <img class="logo" src="IMG/placeholder.png" alt="" height="30px" width="35px">
            <!-- pickNdrop -->
            <font color="#13375b">pickNdrop</font>
        </a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">

                <font color="black" class="nav-link mx-2 ">
                    <img src="IMG/login.png" alt="" height="35px" width="35px">
                    <?php
                    echo $_SESSION["name"];
                    echo " ". $_SESSION["lname"];
                    ?>
                </font>

            </li>
        </ul>
    </nav>
    <div class="registration-container">
        <div class="image-container">
            <img src="IMG/publishride.jpg" alt="" srcset="" height="500px" width="60%">
        </div>
        <div class="h-75 form-container">
            <form action="riderback.php" method="post">
            <h2>Publish Ride Here!</h2>

                <label><b>Enter Phone number:</b></label><br>
                <input type="number" name="phno" id="phno" placeholder="Enter PhoneNo" required><br /><br>

                <label><b> Enter company of bike:</b></label><br>
                <input type="text" name="bikecompany" id="bikecompany" placeholder="Eg: Honda" required><br><br>

                <label><b>Enter from location:</b></label><br>
                <input type="text" name="fromLocation" id="fromLocation" placeholder="Eg: Ichalkaranji" required><br>

                <label><b>Enter To location:</b></label><br>
                <input type="text" name="toLocation" id="toLocation" placeholder="Eg: Kolhapur" required><br><br>

                <label><b>Enter date:</b></label><br>
                <input type="date" name="date" id="date" placeholder="DD/MM/YYYY" required><br>

                <label><b>Enter time:</b></label><br>
                <input type="time" name="time" id="time" required><br>

                <label><b>Enter your bike number:</b></label><br>
                <input type="text" name="bnumber" id="bnumber" placeholder="MH-09 XY ****" required><br>

                <label><b>Enter the Rent of your ride:</b></label><br>
                <input type="number" name="rent" id="rent" placeholder="Rs.50"><br><br>


                <input id="btn2" type="submit" name="submit" value=" Publish Ride " onclick="Click()" /><br>
                
            </form>
        </div>

        <script>
            const Click=()=>{
                window.alert("You ride is successfully published!");
            }
        </script>
    </div>

</body>

</html>