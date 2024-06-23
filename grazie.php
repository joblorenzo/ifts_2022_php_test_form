<?php
include "library.php";

if(isset($_GET['msg'])){
    //print_r($_GET);
    $id = $_GET['id'];
    $str = substr($_GET['msg'], 0, 1); // returns "d"
    if($str == "G"){
        //incremento update DB interesse
        updateInteresse($id);
    } else {
        //incremento update DB non_interesse
        updateNonInteresse($id);
    }
    echo "<a href='index.php'> -ReturnHome-</a>";

} ?>