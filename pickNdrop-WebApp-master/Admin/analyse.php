<?php

$conn = mysqli_connect("localhost", "root", "", "pickndrop");
$sql = "select * from analysistest";

$test = array();
$count = 0;
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    $test[$count]["label"] = $row["toLocation"];
    $test[$count]["y"] = $row["count"];
    $count = $count + 1;
}
?>
<!DOCTYPE HTML>
<html>

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

    <script>
        window.onload = function() {

            var chart1 = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Ride Analysis Bar Chart"
                },
                axisY: {
                    title: "No. of Rides to City"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## times",
                    dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart1.render();

            var chart2 = new CanvasJS.Chart("pieContainer", {
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: "Ride Analysis Pie Chart"
                },
                data: [{
                    type: "pie",
                    indexLabel: "{y}",
                    yValueFormatString: "#,##0.\"times\"",
                    indexLabelPlacement: "inside",
                    indexLabelFontColor: "#36454F",
                    indexLabelFontSize: 18,
                    indexLabelFontWeight: "bolder",
                    showInLegend: true,
                    legendText: "{label}",
                    dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart2.render();

        }
    </script>
</head>

<body>
    <!-- Header  -->
    <nav class="navbar sticky-top navbar-expand-md">
        <a class="navbar-brand fs-3 ms-3 " href="index.html">
            <img class="logo" src="IMG/placeholder.png" alt="" height="30px" width="35px">
            <!-- pickNdrop -->
            <font color="#13375b">pickNdrop</font>
        </a>
    </nav>
    <div id="chartContainer" style="height: 400px; width:100%;  padding:10px"></div>
    <br><br>
    <div id="pieContainer" style="height: 400px; width:100%;  padding:10px"></div>
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
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</body>

</html>


</body>

</html>