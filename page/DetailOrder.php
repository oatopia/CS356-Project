<?php
    session_start();
    if(!isset($_SESSION['Username'])){
        echo "NOT LOGIN";
        header("Location: http://localhost/CS356-Finalpj/CS356-Project/html/Login.html");
    }
    $user = $_SESSION['Username'];
    $c_name = $_GET['collection_name'];
    $c_price = $_GET['collection_price'];
    $c_type = $_GET['collection_type'];
    $conn = new mysqli("localhost", "root", "5643789thanapat" ,"n2clothing");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
   }
   //select all product
   $sql = "SELECT * FROM product WHERE Product_collection = '$c_name' ";
    $result = $conn->query($sql);
    $Array = array();
   while($row = $result->fetch_assoc()){
       $Array[] = array("ID_product"=>$row['ID_product'],"Product_color"=>$row['Product_color']
       ,"Product_price"=>$row['Product_price'],"Product_image"=>$row['Product_image']
       ,"Product_type"=>$row['Product_type'],"Product_collection"=>$row['Product_collection']);
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DetailOrder</title>
    <link rel="icon" href="../image/LogoN2clothing.jpg" type="image/icon type">
    <link rel="stylesheet" href="./css/DetailOrder-php.css?v=<?php echo time(); ?>">
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
                                <li><a id="howtoOrder-link" href="./HowToOrder.phpl">วิธีการสั่งซื้อสินค้า</a></li>
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

    <section class="detail-order">
        <img src="../image/background.jpg"/>
        <div class="detail-goods">
            <div class="detail">
                <h1 class="goods-collection"><?=$c_name;?></h1>
                <h1 class="goods-type"><?=$c_type;?></h1>
                <h1 class="goods-price">฿<?=$c_price;?></h1>
                <div class="select-size-container">
                    <p>สี</p>
                    <select class="select-size">
                    <?php 
                        foreach($Array as $Array){
                            echo'<option  value=\''.$Array['Product_color'].'\'>'.$Array['Product_color'].'</option>';
                        }  
                    ?>
                    </select>
                </div>
                <div class="select-size-container">
                    <p>ไซส์</p>
                    <select class="select-size">
                        <option>XS</option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                    </select>
                </div>
                
                <div class="input-number">
                    <button class="btn-minus">-</button>
                    <input class="input-text-number" type="number" value="1"/>
                    <button class="btn-plus">+</button>
                </div>
                <button class="btn-pickup">หยิบใส่ตะกร้า</button>
            </div>
            
        </div>
    </section>

    <footer>
        <p>Copyright © N2clothing</p>
    </footer>
</body>

</html>