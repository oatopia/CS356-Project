
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" href="../image/LogoN2clothing.jpg" type="image/icon type">
    <link rel="stylesheet" href="./css/Login.css">

</head>

<body>
    <header>
        <div class="Navbar-homepage">
            <div class="Navbar-contain-icon-menu">
                <img class="LogoN2clothing" src="../image/LogoN2clothing.png"/>
                <ul class="manu-navbar">
                    <li><a href="../html/Home.html">หน้าแรก</a></li>
                    <li><a href="../service/AlertLogin.php">สินค้า</a></li>
                    <li class="HowToOrder-link"><a >การสั่งซื้อสินค้า</a>
                        <div class="sub-menu-navbar">
                            <ul>
                                <li><a href="../html/HowToOrder.html">วิธีการสั่งซื้อสินค้า</a></li>
                                <li><a href="../html/TransferMoney.html">แจ้งชำระเงิน</a></li>
                            </ul>
                        </div>
                            
                    </li>
                    <li><a href="../html/Contact.html">ติดต่อเรา</a></li>
                </ul>
            </div>
            
            <div class="menu-login-cart">
                <a class="login-link" href="../page/LoginPage.php" >เข้าสู่ระบบ</a>
                <div class="line-vertical"></div>
                <img class="cart-icon" src="../image/icon/shopping-cart 1.png"/>
            </div>
            
        </div>
    </header>
    <div class="form">
        <div class="container">
            <div class="form-con">
                <form action="../service/Login.php" method="post" name="login">
                    <div class="contextcon">
                        <h1>เข้าสู่ระบบ</h1>
                        <label id="login" for="uname"><b>ชื่อผู้ใช้</b></label>
                        <input type="text" placeholder="กรอกชื่อผู้ใช้" name="username" required  value="<?php if(isset($_COOKIE['user'])) { echo $_COOKIE['user']; }?>">
                        <label id="login" for="psw"><b>รหัสผ่าน</b></label>
                        <input type="password" placeholder="กรอกรหัสผ่าน" name="password" required value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'] ;} ?>">
                        <label><input name="remember" type="checkbox" <?php if(isset($_COOKIE['user'])){?> checked <?php } ?> value="ON" />จดจำฉันในระบบ</label>
                        <input id="login" type="submit" name="submit" value="เข้าสู่ระบบ" onclick="">
                        <p><a id="regist" href="../html/Register.html">ลงทะเบียน</a></p>
                    </div>
                    <div class="contextconfoot" style="background-color:#f1f1f1">
                        <input id="cancel" type="submit" name="cancel" value="ยกเลิก"
                            onclick="window.location.href = '../html/Home.html';">
                        <p id="forgetpwd">ลืมรหัสผ่านใช่หรือไม่? <a id="click" href="../html/Forgetpassword.html">คลิก!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>