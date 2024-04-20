<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Link  -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&family=Work+Sans:wght@700;900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/style.css">
    <title>Search a Ride</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-md">
        <a class="navbar-brand fs-3 ms-3 " href="index.html">
            <img class="logo" src="IMG/placeholder.png" alt="" height="30px" width="35px">
            <!-- pickNdrop -->
            <font color="#13375b">pickNdrop</font>
        </a>
        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#btn">
            <!-- <i class='bx bx-menu'></i> -->
            <span class="navbar-toggler-icon"></span>
        </button>
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
    </nav>


    <div class="search-container">
        <div class="d-flex justify-content-center pt-5">
            <div class="col-md-7 ">
                <form action="">
                    <div class="input-group">
                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])) {echo $_GET['search'];} ?>" class="form-control" placeholder="Search Location">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card-mt-4">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Bike Company</th>
                            <th>From Location</th>
                            <th>To Location</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Bike Number</th>
                            <th>Rent Of Ride</th>
                            <th>Booking Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $con= mysqli_connect("localhost","root","","pickndrop");

                           

                            if(isset($_GET['search']))
                            {
                                $filtervalues= $_GET['search'];
                                $query= "SELECT * FROM rider WHERE CONCAT(fromLocation,toLocation)  LIKE '%$filtervalues%' ";
                                $query_run= mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run)>0)
                                {
                                    foreach($query_run as $items)
                                    {
                                        ?>
                                        <tr>
                                            <td class="center"><?= $items['fname']; ?></td>
                                            <td class="center"><?= $items['lname']; ?></td>
                                            <td class="center"><?= $items['phno']; ?></td>
                                            <td class="center"><?= $items['Bike Company']; ?></td>
                                            <td class="center"><?= $items['fromLocation']; ?></td>
                                            <td class="center"><?= $items['toLocation']; ?></td>
                                            <td class="center"><?= $items['date']; ?></td>
                                            <td class="center"><?= $items['time']; ?></td>
                                            <td class="center"><?= $items['bnumber']; ?></td>
                                            <td class="center"><?= $items['Rent Of Ride']; ?></td>
                                            <td class="center">
                                                


                                            <?php if($items['bstatus']==0)
                                            
                                            {?>
                                              <button type="submit" name="submit" onClick="bookRide()" value="not clicked" class="booking-button btn btn-danger"> Not Booked</button>
                                              <?php } else {?>

                                            <button class="booking-button btn btn-primary"> Booked</button> 
                                            <?php } ?>

                                          
                                            </td>

                                            

                                        </tr>
                                        <?php

                                    }
                                }
                            
                                else
                                {
                                    ?> 
                                        <tr>
                                            <td colspan="11"><img  src="IMG/nodata.jpg" alt="" height="650px" width="100%"> </td>
                                        </tr>
                                        <?php
                                }
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>

        const bookRide=()=> {
 
        var buttons = document.querySelectorAll(".booking-button");
        for (var i = 0; i < buttons.length; i++) {
         buttons[i].addEventListener("click", handleClick);
        }

    function handleClick(event) {
        var button = event.target;
        button.innerText = "Booked";
        button.style.backgroundColor = "green"
        button.disabled = true;
    } 

    <?php 

    




//      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     foreach ($_POST as $key => $value) {
//     if (strpos($key, 'button') === 0) {
//       // This is a button
//       $id = substr($key, strlen('button'));
//       $query = "UPDATE rider SET bstatus=1 WHERE phno=$phno";
//       $query_run= mysqli_query($conn, $query);
//      }
//     }
//   }

    ?>
    
    }


   


      
    </script>
   
</body>


</html>