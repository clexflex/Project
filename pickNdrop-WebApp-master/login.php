<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&family=Work+Sans:wght@700;900" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-md">
        <a class="navbar-brand fs-3 ms-3 " href="index.html">
            <img class="logo" src="IMG/placeholder.png" alt="" height="30px" width="35px">
            <!-- pickNdrop -->
            <font color="#13375b">pickNdrop</font>
        </a>
    </nav>
    <div class="login-container">
        <div class="container my-4 d-flex align-items-center justify-content-center border shadow p-5 w-25">
            <form class="p-4" action="logback.php" method="post">
                <h2 >Login Here!</h2>
                <label class="form-label p-2"><b>Email:</b></label>
                <br><input class="form-control " type="text" name="email" placeholder="Enter e-mail" required><br>
                <label class="form-label p-2"><b>Password:</b></label>
                <input class="form-control" type="password" name="password" placeholder="*********" required><br />
                <input id="btn2" type="submit" name="submit" value="LOGIN " /><br><br>
                <a href="registration.php">
                   not yet registered?
                </a>
            </form>
        </div>
        <div class="login-image">
            <img src="IMG/loginbg.jpg" alt="" height="400px" width="60%" >
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>