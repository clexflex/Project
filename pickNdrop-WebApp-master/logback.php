<?php
    session_start();
    $db_hostname="172.0.0.1";
    $db_username="root";
    $db_pass="";
    $db_name="pickndrop";

    $conn = mysqli_connect("localhost", $db_username, $db_pass, $db_name);
    if(!$conn)
    {
        die("not connected".mysqli_connect_error());
    }

    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql ="select * from user where email='$email' and password=$password";
    $result=mysqli_query($conn,$sql);
    if(!$result)
    {
        echo"some thing is wrong";
        exit;
    }
    if($result==True)
    {
        $row = $result->fetch_assoc();
        $_SESSION["name"]=$row["name"];
        $_SESSION["lname"]=$row["last name"];
        $_SESSION["dob"]=$row["dob"];
        $_SESSION["email"]=$row["email"];
        
        // echo"login successfull ".$_SESSION["name"];
        header("Location:nextlog.php");
        
    }
    
    $conn->close();
?>