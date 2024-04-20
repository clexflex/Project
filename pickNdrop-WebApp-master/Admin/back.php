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

    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from admin where username='$username' and password='$passwprd'";
    $result=mysqli_query($conn,$sql);
    if(!$result)
    {
        echo"some thing is wrong";
        exit;
    }
    if($result==True)
    {
        $row=$result->fetch_assoc();
        $_SESSION["id"]=$row["id"];
        $_SESSION["username"]=$row["username"];
    }
    header("Location:dashboard.php");

    $conn->close();
?>
