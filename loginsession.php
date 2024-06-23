<?php
    //include "connection.php";
    include "library.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
</head>
<body>
    
</body>
</html>
<?php
    //se dati SV corretti setta dati SESSIONE
    checkLogin($_POST['code'],$_POST['pw']);
    

    //se loggedIn true/false => reindirizza a pagina + msg
    if (!loggedIn()) {
        header("Location: login.php?msg=Failed authentication!");
    } else {
        //echo "Logged In";
        //se loggato update su accessi
        /*
        $em = $_POST['mail'];
        updateSession($em);
        */
        header("Location: areariservata.php?msg=Autenticazione riuscita!");
    }
?>
