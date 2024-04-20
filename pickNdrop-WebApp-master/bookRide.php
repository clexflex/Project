<?php
session_start();
   
   $fname= $_SESSION["name"];
   $lname= $_SESSION["lname"];
   $dob=$_SESSION["dob"];


   $db_hostname="172.0.0.1";
   $db_username="root";
   $db_pass="";
   $db_name="pickndrop";

   $conn = mysqli_connect("localhost", $db_username, $db_pass, $db_name);
   if(!$conn)
   {
       die("not connected".mysqli_connect_error());
   }


   $rideId = $_POST["rider_id"];
 $sql = "UPDATE rider SET bstatus=1 WHERE id=$rideId";
if ($conn->query($sql) === TRUE) {
  echo "success";
} else {
  echo "error";
}

// Close the database connection
$conn->close();
?>