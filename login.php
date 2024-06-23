<?php
    include "connection.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!--stylesheet-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!--favicon-->
    <link rel="shortcut icon" href="https://i0.wp.com/www.thecontemplativeeducator.org/wp-content/uploads/2017/02/zen-circle-favicon-w512.png?ssl=1">
    <title>Login</title>
</head>

<header>
    <nav class="navbar navbar-dark bg-primary">
        <!-- Navbar content -->
        <a href="index.php"><img src="https://i0.wp.com/www.thecontemplativeeducator.org/wp-content/uploads/2017/02/zen-circle-favicon-w512.png?ssl=1" alt="logo" ></a>
        <h1 id="#index-page"><a href="index.php" class="hover-underline-animation">Ricerca eventi</a></h1>
        <a href="login.php" class="hover-underline-animation">Area Riservata</a>
    </nav>
</header>

<body>
        <div class="subtitle1">
            <h2>Accesso area riservata</h2>
        </div>

<div class="login" id="login-div">
            <form action="loginsession.php" method="post" enctype="multipart/form-data">
                <div class="logo-size">
                <h3 style="text-align:center;"><img style="height: 50px" src="https://i0.wp.com/www.thecontemplativeeducator.org/wp-content/uploads/2017/02/zen-circle-favicon-w512.png?ssl=1" alt="logo">
                    Login dipendente: </h3>
                </div>
                <?php   // msg errore autenticazione => se msg==true => write-msg
                if(isset($_GET['msg'])){ ?>
                    <span class="badge badge-pill badge-warning">
                        <?php echo $_GET['msg']; ?> </span> <?php } ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Codice dipendente: </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="code" placeholder="codice utente" required>
                </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password: </label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pw" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
<body>

<footer>
    <div id="footer-div">
        <h6>Test finale PHP - PDO - IFTS 2021 - 2022</h6>
        <h6> © 2021 - 2022, Dellapasqua Lorenzo</h6>
    </div>
</footer>

</html>