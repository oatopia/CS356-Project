<?php 
session_start();

if(!isset($_SESSION["order"])){
    $_SESSION["order"] = 0;
    $_SESSION["Product_name"][0] = $_GET["p_name"];
    $_SESSION["Product_color"][0] = $_GET["p_color"];
    $_SESSION["Product_size"][0] = $_GET["p_size"];
    $_SESSION["Product_Num"][0] = $_GET["p_number"];
}

?>