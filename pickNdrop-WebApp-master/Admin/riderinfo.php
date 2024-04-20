<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Link  -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&family=Work+Sans:wght@700;900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/style.css">

    <title>Rider Infromation</title>
</head>

<body>
    <!-- Header  -->
    <nav class="navbar sticky-top navbar-expand-md">
        <a class="navbar-brand fs-3 ms-3 " href="index.html">
            <img class="logo" src="IMG/placeholder.png" alt="" height="30px" width="35px">
            <!-- pickNdrop -->
            <font color="#13375b">pickNdrop</font>
        </a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="analyse.php">
                    <input id="analyse" type="submit" value="ANALYSE">
                </a>
            </li>


        </ul>
    </nav>

    <div id="tablecontainer1">
        <table id="users">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Bike Company</th>
                <th>Pick Location</th>
                <th>Drop Location</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "pickndrop");
            if (!$conn) {
                die("not connected" . mysqli_connect_error());
            }
            $sql = "Select * from rider where 1";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["fname"] . "</td><td>" . $row["lname"] . "</td><td>" . $row["Bike Company"] . "</td><td>" . $row["fromLocation"] . "</td><td>" . $row["toLocation"] . "</td><td>" . $row["date"] . "</td><td>" . $row["time"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 result";
            }

            $conn->close();
            ?>
        </table>
    </div>



    <!-- Footer  -->
    <div class="footer">
        <div class="terms-condition">
            <a href="http://">TERMS & CONDITIONS</a>
        </div>
        <div class="copyright">
            <img class="logo" src="IMG/placeholder.png" alt="" height="30px" width="35px">
            @pickNdrop,2023 ©
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


</body>

</html>