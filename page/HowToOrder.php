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
    <title>HowToOrder</title>
    <link rel="icon" href="../image/LogoN2clothing.jpg" type="image/icon type">
    <link rel="stylesheet" href="./css/HowToOrder-php.css">
    </header>

<body>
    <header>
        <div class="Navbar-homepage">
            <div class="Navbar-contain-icon-menu">
                <img class="LogoN2clothing" src="../image/LogoN2clothing.png" />
                <ul class="menu-navbar">
                    <li><a href="./Home.php" id="home-link">หน้าแรก</a></li>
                    <li><a href="./AllOrder.php">สินค้า</a></li>
                    <li class="HowToOrder-link"><a id="order-link">การสั่งซื้อสินค้า</a>
                        <div class="sub-menu-navbar">
                            <ul>
                                <li><a id="howtoOrder-link" href="./HowToOrder.php">วิธีการสั่งซื้อสินค้า</a></li>
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
                                <li><a href="./ProfileOrder.php">คำสั่งซื้อ</a></li>
                                <li><a href="./ProfileAddress.php">ที่อยู่</a></li>
                                <li><a href="../service/Logout.php">ออกจากระบบ</a></li>
                            </ul>
                    </div>
                </li>
                <div class="line-vertical"></div>
                <img class="cart-icon" src="../image/icon/shopping-cart 1.png" />
            </div>

        </div>
    </header>

    <section class="HowToOrder-content">
        <h1>วิธีการสั่งซื้อสินค้า</h1>
        <div class="Step-HowToOrder">
            <div class="block-HowToOrder">
                <label><img src="../image/icon/login.png"/>เข้าสู่ระบบ</label>
                <p>ลูกค้าต้องทำการเข้าสู่ระบบเพื่อสั่งซื้อสินค้า</p>
            </div>
            <div >
                <label><img src="../image/icon/shopping-cart 1.png"/>หยิบสินค้าใส่ในรถเข็น</label>
                <p>เมื่อท่านค้นพบสินค้าที่ต้องการแล้ว เพียงแค่คลิกที่ ราคาสินค้า หรือ ปุ่มซื้อ ท่านก็สามารถเลือกรายการสินค้าที่ต้องการลงในรถเข็นของท่านได้</p>
            </div>
            <div>
                <label><img src="../image/icon/list.png"/>จัดการรายการสินค้าที่สั่งซื้อในรถเข็น</label>
                <p>ในหน้ารายการสินค้าที่สั่งซื้อของท่าน จะแสดงรายการ, จำนวน และราคาของสินค้าที่ท่านเลือก พร้อมทั้งราคารวมของสินค้าทั้งหมดที่อยู่ในรถเข็น ท่านสามารถแก้ไขรายการสินค้าในรถเข็นนี้ได้เมื่อคลิกที่ปุ่มต่างๆ ในหน้ารถเข็น</p>
            </div>
            <div>
                <label><img src="../image/icon/Group.png"/>กำหนดที่อยู่สำหรับจัดส่งสินค้า วิธีการจัดส่งสินค้า และบริการอื่นๆ</label>
                <p>ตามปกติระบบจะขึ้นข้อมูลที่อยู่ที่ท่านได้สมัครสมาชิกไว้เป็นที่อยู่สำหรับจัดส่งสินค้า ในกรณีที่ท่านต้องการจัดส่งไปยังบุคคลอื่นหรือสถานที่อื่น ท่านสามารถเลือก “กรอกที่อยู่ที่ต้องการให้จัดส่ง” เพิ่มเติมได้ (โดยระบบจะบันทึกที่อยู่ดังกล่าวไว้ เพื่อความสะดวกของท่านในการสั่งซื้อครั้งต่อไปด้วย) จากนั้น เลือกวิธีการจัดส่งที่ต้องการ</p>
            </div>
            <div>
                <label><img src="../image/icon/credit.png"/>เลือกวิธีการชำระเงิน</label>
                <p>ระบบจะทำการคำนวณค่าขนส่งอัตโนมัติ เมื่อรวมกับค่าสินค้าก็จะเป็นยอดชำระเงินทั้งหมด ท่านสามารถเลือกวิธีการชำระเงินที่ท่านสะดวกได้</p>
            </div>
            <div>
                <label><img src="../image/icon/document.png"/>สรุปรายละเอียดการสั่งซื้อ</label>
                <p>ทุกครั้งที่ท่านสั่งซื้อสินค้า โปรแกรมจะสรุปรายละเอียดรายการสั่งซื้อของท่าน กรุณาตรวจสอบข้อมูลดังกล่าวก่อนคลิกที่ปุ่ม เพื่อบันทึกรายการเข้าระบบ ในกรณีที่ท่านต้องการแก้ไขรายละเอียด ท่านสามารถกด “back” ที่ browser ของท่านไปยังหน้านั้นๆ ได้ แต่ หากท่านยืนยันการสั่งซื้อแล้ว ท่านจะไม่สามารถแก้ไขรายละเอียดใดๆ ได้อีก</p>
            </div>
        </div>

    </section>





    <footer>
        <p>Copyright © N2clothing</p>
    </footer>
</body>

</html>