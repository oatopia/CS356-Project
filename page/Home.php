<?php
    session_start();
    if(!isset($_SESSION['Username'])){
        echo "NOT LOGIN";
        header("http://localhost/CS356-Finalpj/CS356-Project/html/Login.html");
    }
    $user = $_SESSION['Username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="icon" href="../image/LogoN2clothing.jpg" type="image/icon type">
    <link rel="stylesheet" href="../css/Home.css">
</header>
<body>
    <header>
        <div class="Navbar-homepage">
            <div class="Navbar-contain-icon-menu">
                <img class="LogoN2clothing" src="../image/LogoN2clothing.png"/>
                <ul class="manu-navbar">
                    <li><a href="../html/Home.html" id="home-link">หน้าแรก</a></li>
                    <li><a href="../html/AllOrder.html">สินค้า</a></li>
                    <li class="HowToOrder-link"><a >การสั่งซื้อสินค้า</a>
                        <div class="sub-menu-navbar">
                            <ul>
                                <li><a href="../html/HowToOrder.html">วิธีการสั่งซื้อสินค้า</a></li>
                                <li><a href="../html/TransferMoney.html">แจ้งโอนเงิน</a></li>
                            </ul>
                        </div>
                            
                    </li>
                    <li><a href="../html/Contact.html">ติดต่อเรา</a></li>
                </ul>
            </div>
            
            <div class="menu-login-cart">
                <a class="login-link" ><?= $user; ?></a>
                <a class="login-link" href="../service/Logout.php" >Log out</a>
                <div class="line-vertical"></div>
                <img class="cart-icon" src="../image/icon/shopping-cart 1.png"/>
            </div>
            
        </div>
    </header>

    <section class="slide-image">
            <img class="image-slide" src="../image/showimage.jpg" style="width: 100%;"/>
    </section>

    <section class="collection-image">
        <div id="first-collection" class="collection-contain">
            <label>เสื้อ</label>
            <img src="../image/shirt.jpg"/>
        </div>
        
        <div class="collection-contain">
            <label>เดรส</label>
            <img src="../image/dress.jpg"/>
        </div>
    </section>

    <section class="Best-seller">
        <h1>สินค้าขายดี</h1>
        <div class="best-seller-contain">
            <div class="best-seller-contain-inner">
                <img src="../image/best-1.jpg"/>
            </div>
            <p>Two-Tone</p>
            <h4>฿410</h4>
            <button class="btn-choose">เลือกรูปแบบ</button>
        </div>
        
        <div id="center-best" class="best-seller-contain">
            <div  class="best-seller-contain-inner">
                <img src="../image/best-2.jpg"/>
            </div>
            <p>Macaron</p>
            <h4>฿420</h4>
            <button class="btn-choose">เลือกรูปแบบ</button>
        </div>
        
        <div class="best-seller-contain">
            <div class="best-seller-contain-inner">
                <img src="../image/best-3.jpg"/>
            </div>
            <p>Cake</p>
            <h4>฿420</h4>
            <button class="btn-choose">เลือกรูปแบบ</button>
        </div>
    </section>

    <section class="btn-all-item-contain">
        <button class="btn-all-item">ดูสินค้าทั้งหมด</button>
    </section>
    
    <footer>
        <p>Copyright © N2clothing</p>
    </footer>
</body>
</html>