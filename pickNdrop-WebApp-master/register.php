<?php
    $db_hostname="172.0.0.1";
    $db_username="root";
    $db_pass="";
    $db_name="pickndrop";

    $conn = mysqli_connect("localhost", $db_username, $db_pass, $db_name);
    if(!$conn)
    {
        die("not connected".mysqli_connect_error());
    }

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];

    $sql ="insert into user values ('$fname', '$lname', '$email', '$dob', '$gender', '$password')";
    $result=mysqli_query($conn,$sql);
    if(!$result)
    {
        echo"some thing is wrong".$fname;
        exit;
    }
    header("Location:Home.html");

    $conn->close();
?>