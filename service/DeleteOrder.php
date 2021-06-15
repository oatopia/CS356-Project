<?php 
session_start();
    $line = $_GET["DeleteIndex"];
    $_SESSION["Order"] = $_SESSION["Order"] - 1;
    unset($_SESSION["Product_name"][$line]);
    unset($_SESSION["Product_image"][$line]);
    unset($_SESSION["Product_type"][$line]);
    unset($_SESSION["Product_price"][$line]);
    unset($_SESSION["Product_color"][$line]);
    unset($_SESSION["Product_size"][$line]);
    unset($_SESSION["Product_num"][$line]);
    
    $_SESSION["Product_name"]= array_values($_SESSION["Product_name"]);
    $_SESSION["Product_image"]= array_values($_SESSION["Product_image"]);
    $_SESSION["Product_type"]= array_values($_SESSION["Product_type"]);
    $_SESSION["Product_price"]= array_values($_SESSION["Product_price"]);
    $_SESSION["Product_color"]= array_values($_SESSION["Product_color"]);
    $_SESSION["Product_size"]= array_values($_SESSION["Product_size"]);
    $_SESSION["Product_num"]= array_values($_SESSION["Product_num"]);

header("location:../page/Cart.php");

?>