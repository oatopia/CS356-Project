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
    $Arrayproduct = array();
   while($row = $result->fetch_assoc()){
       $Arrayproduct[] = array("ID_product"=>$row["ID_product"],"Product_color"=>$row["Product_color"]
       ,"Product_price"=>$row["Product_price"],"Product_image"=>$row["Product_image"]
       ,"Product_type"=>$row["Product_type"],"Product_collection"=>$row["Product_collection"]);
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
        <div class="image-goods">
            <?php 
                foreach($Arrayproduct as $image){
                    echo'<div class="Image-product-slide fade">';
                    echo'<img class="Image-product" src="../image/product/'.$image["Product_image"].' " />';
                    echo'</div>';
                }
            ?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div class="detail-goods">
            <div class="detail">
                <h1 class="goods-collection"><?=$c_name;?></h1>
                <h1 class="goods-type"><?=$c_type;?></h1>
                <h1 class="goods-price">฿<?=$c_price;?></h1>
                <div class="select-container">
                    <div class="select-block">
                        <p>สี</p>
                        <select class="select-tag">
                        <?php 
                        foreach($Arrayproduct as $color){
                            echo'<option value="'.$color["Product_color"].'">'.$color["Product_color"].'</h1>';
                        }  
                        ?>
                        </select>
                    </div>
                </div>
                <div class="select-container">
                    <div class="select-block">
                        <p>ไซส์</p>
                        <select class="select-tag">
                        <option>XS</option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                        </select>
                    </div>
                </div>
                <div class="number-pick-container">
                    <div class="input-number">
                        <button class="btn-minus">-</button>
                        <input class="input-text-number" type="number" value="1"/>
                        <button class="btn-plus">+</button>
                    </div>
                    <button class="btn-pickup">หยิบใส่ตะกร้า</button>
                </div>
                
            </div>
            
        </div>
    </section>

    <footer>
        <p>Copyright © N2clothing</p>
    </footer>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("Image-product-slide");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
            }
            slides[slideIndex-1].style.display = "block";  
        }
    </script>
</body>

</html>