<?php
    session_start();
    if(!isset($_SESSION['Username'])){
        echo "NOT LOGIN";
        header("http://localhost/CS356-Finalpj/CS356-Project/html/Login.html");
    }
    $user = $_SESSION['Username'];
    $conn = new mysqli("localhost", "root", "5643789thanapat" ,"n2clothing");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
   }
   //select all product
   $sql = "SELECT * FROM collection_product";
    $result = $conn->query($sql);
    $Array = array();
   while($row = $result->fetch_assoc()){
       $Array[] = array("ID_collection"=>$row['ID_collection'],"Collection_name"=>$row['Collection_name']
       ,"Collection_image"=>$row['Collection_name'],"Collection_image"=>$row['Collection_image']
       ,"Collection_price"=>$row['Collection_price'],"Collection_type"=>$row['Collection_type']);
   }



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AllOrder</title>
    <link rel="icon" href="../image/LogoN2clothing.jpg" type="image/icon type">
    <link rel="stylesheet" href="./css/AllOrder-php.css">
    </header>

<body>
    <header>
        <div class="Navbar-homepage">
            <div class="Navbar-contain-icon-menu">
                <img class="LogoN2clothing" src="../image/LogoN2clothing.png" />
                <ul class="menu-navbar">
                    <li><a href="./Home.php" id="home-link">หน้าแรก</a></li>
                    <li><a href="./AllOrder.php" id="allorder-link">สินค้า</a></li>
                    <li class="HowToOrder-link"><a id="order-link">การสั่งซื้อสินค้า</a>
                        <div class="sub-menu-navbar">
                            <ul>
                                <li><a id="howtoOrder-link" href="./HowToOrder.php">วิธีการสั่งซื้อสินค้า</a></li>
                                <li><a id="transferMoney-link" href="./TransferMoney.php">แจ้งโอนเงิน</a></li>
                            </ul>
                        </div>
                            
                    </li>
                    <li><a href="./Contact.php">ติดต่อเรา</a></li>
                </ul>
            </div>

            <div class="menu-login-cart">
            <li class="Username-link">
                <p class="username-p" ><?= $user; ?></p>
                <div class="sub-menu-navbar-profile">
                            <ul>
                                <li class="order-link"><a href="./ProfileOrder.php">คำสั่งซื้อ</a></li>
                                <li ><a href="./ProfileAddress.php" >ที่อยู่</a></li>
                                <li><a href="../service/Logout.php">ออกจากระบบ</a></li>
                            </ul>
                    </div>
                </li>
                <div class="line-vertical"></div>
                <img class="cart-icon" src="../image/icon/shopping-cart 1.png" />
            </div>

        </div>
    </header>

    <section class="left-content">
        <h1>รายการ</h1>
        <ul>
            <li>เสื้อ</li>
            <li>เดรส</li>
        </ul>
    </section>

    <section class="right-content">
        <div class="all-goods">
            <?php 
            foreach($Array as $Array){
                echo'<div class="product-collection">';
                echo'<img class="image-collection" src="../image/product/'.$Array["Collection_image"].' " />';
                echo'<h1>'.$Array["Collection_name"].'</h1>';
                echo'<h2>'.$Array["Collection_price"].'</h2>';
                echo'</div>';
            }
            ?>
        </div>
    </section>

    <footer>
        <p>Copyright © N2clothing</p>
    </footer>
</body>

</html>