
<?php
    session_start();
    if(!isset($_SESSION['Username'])){
        echo "NOT LOGIN";
        header("Location: http://localhost/CS356-Finalpj/CS356-Project/html/Login.html");
    }
    $user = $_SESSION['Username'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ProfileAddress</title>
    <link rel="icon" href="../image/LogoN2clothing.jpg" type="image/icon type">
    <link rel="stylesheet" href="./css/ProfileOrder-php.css">
</header>
<body>
    <header>
        <div class="Navbar-homepage">
            <div class="Navbar-contain-icon-menu">
                <img class="LogoN2clothing" src="../image/LogoN2clothing.png"/>
                <ul class="manu-navbar">
                    <li><a href="./Home.php" id="home-link">หน้าแรก</a></li>
                    <li><a href="./AllOrder.php">สินค้า</a></li>
                    <li class="HowToOrder-link"><a >การสั่งซื้อสินค้า</a>
                        <div class="sub-menu-navbar">
                            <ul>
                                <li><a href="./HowToOrder.php">วิธีการสั่งซื้อสินค้า</a></li>
                                <li><a href="./TransferMoney.php">แจ้งโอนเงิน</a></li>
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
                <img class="cart-icon" src="../image/icon/shopping-cart 1.png"/>
            </div>
            
        </div>
    </header>


    <section class="ProfileOrder-container">
        <div class="header-Order">
            <h1>คำสั่งซื้อของลูกค้า</h1>
        </div>
        <div class="content-Order">
            <div class="left-menu">
                <div class="icon-username">
                    <img class="icon-user" src="../image/icon/profile-user.png"/>
                    <h2><?= $user; ?></h2>
                </div>
                <ul>
                    <li class="here">
                        <a href="./ProfileOrder.php">คำสั่งซื้อ</a>
                    </li>
                    <li >
                        <a href="./ProfileAddress.php">ที่อยู่</a>
                    </li>
                    <li>
                        <a href="../service/Logout.php">ออกจากระบบ</a>
                    </li>
                </ul>
            </div>
            <div class="right-content">
                <h2>ที่อยู่นี้จะถูกใช้ในหน้าการสั่งซื้อ</h2>
            </div>
        </div>
    </section>
    
    <footer>
        <p>Copyright © N2clothing</p>
    </footer>
</body>
</html>