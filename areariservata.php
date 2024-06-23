<?php
    include "connection.php";
    include "library.php";
    session_start();

    if( ! $_SESSION['logged_in'] == 1){ //key set in login.php $SESSION
        header("Location:login.php?msg=Non sei loggato!"); //creo pagina area Accesso riservata se non loggato
    }
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
    <title>Area Dipendenti</title>
</head>

<header>
    <nav class="navbar navbar-dark bg-primary">
        <!-- Navbar content -->
        <a href="index.php"><img src="https://i0.wp.com/www.thecontemplativeeducator.org/wp-content/uploads/2017/02/zen-circle-favicon-w512.png?ssl=1" alt="logo" ></a>
        <h1 id="#index-page"><a href="index.php" class="hover-underline-animation">Eventi</a></h1>
        <h4 style="color:white;"> dip: <?php echo $_SESSION['dip_codice'] ?></h4>
    </nav>
</header>

<body>
    <div class="subtitle1">
            <h2>Dati eventi</h2>
        </div>

    <div class="login" id="login-div">
            <?php tipologie(); ?>
    </div>
    <div class="login" id="login-div">
            <?php eventoPiuClick(); ?>
    </div>
</body>

<footer>
    <div id="footer-div">
        <h6>Test finale PHP - PDO - IFTS 2021 - 2022</h6>
        <h6> © 2021 - 2022, Dellapasqua Lorenzo</h6>
    </div>
</footer>

</html>