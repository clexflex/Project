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

    $phno=$_POST['phno'];
    $bcommpany=$_POST['bikecompany'];
    $fromLocation=$_POST['fromLocation'];
    $toLocation=$_POST['toLocation'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $bnumber=$_POST['bnumber'];
    $rent=$_POST['rent'];
    // $lic=$_POST['lic'];
    $bstatus=$_POST['bstatus'];

    $sql ="insert into rider values ( '$fname', '$lname', '$phno', '$bcommpany', '$fromLocation', '$toLocation', '$date', '$time','$bnumber', '$rent', '$bstatus')";
    $result=mysqli_query($conn,$sql);
    if(!$result)
    {
        echo"some thing is wrong".$fname;
        exit;
    }
    header("Location:nextlog.php");

    $conn->close();
?>