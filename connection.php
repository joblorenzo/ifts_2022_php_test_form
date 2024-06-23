<?php
// 1° SV-connection
    require_once "config.php";
    try {
        $c = new PDO($dsn, $user, $password);
        } catch(PDOException $e){
                echo "Exception found";
                echo $e -> getMessage();
            }