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
    <title>TransferMoney</title>
    <link rel="icon" href="../image/LogoN2clothing.jpg" type="image/icon type">
    <link rel="stylesheet" href="./css/TransferMoney-php.css">
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
                                <li><a href="./ProfileOrder.php">คำสั่งซื้อ</a></li>
                                <li><a href="./ProfileAddress">ที่อยู่</a></li>
                                <li><a href="../service/Logout.php">ออกจากระบบ</a></li>
                            </ul>
                    </div>
                </li>
                <div class="line-vertical"></div>
                <img class="cart-icon" src="../image/icon/shopping-cart 1.png" />
            </div>

        </div>
    </header>

    <section class="TransferMoney-content">
        <h1>แจ้งโอนเงิน</h1>
        <div class="chooseAccount-content">
            <h2>เลือกบัญชีที่โอนเข้า</h2>
            <table class="table-Account">
                <thead>
                    <tr>
                        <th>
                            ธนาคาร
                        </th>
                        <th>
                            ชื่อธนาคาร
                        </th>
                        <th>
                            ชื่อบัญชี
                        </th> 
                        <th>
                            เลขบัญชี
                        </th>  
                    </tr>
                    <tr class="SCB-Account">
                        <td>
                            <input type="radio"/>
                            <img src="../image/scb.png">
                        </td>
                        <td>
                            <p>ธนาคารไทยพาณิชย์</p>
                        </td>
                        <td>
                            <p>Kanchana Don</p>
                        </td> 
                        <td>
                            <p>407-240-0244</p>
                        </td>  
                    </tr>
                    <tr class="BBL-Account">
                        <td>
                            <input type="radio"/>
                            <img src="../image/BBl.png">
                        </td>
                        <td>
                            <p>ธนาคารกรุงเทพ</p>
                        </td>
                        <td>
                            <p>Thanapat Tan</p>
                        </td> 
                        <td>
                            <p>826-523-8850</p>
                        </td>  
                    </tr>
                                   
                </thead>
            </table>
            <div class="Account-table">

            </div>
        </div>

        <div class="customer-detail">
            <h2>ข้อมูลลูกค้า</h2>
            <div class="detail">
                <p>ชื่อผู้โอน*</p>
                <input type="text"/>
                <p>เบอร์โทร*</p>
                <input type="text"/>
            </div>
        </div>

        <div class="payment-detail">
            <h2>ข้อมูลการชำระเงิน</h2>
            <div class="payment">
                <p>เลขที่สั่งซื้อ#</p>
                <input type="text" placeholder="xxx"/>
                <p>จำนวนเงิน</p>
                <input type="text" placeholder="0.00"/>
                <p>อัปโหลดสลิป</p>
                <input type="file"/>
            </div>
        </div>

        <div class="block-btn-payment">
            <button class="btn-save-payment">แจ้งการชำระเงิน</button>
        </div>
        
    </section>





    <footer>
        <p>Copyright © N2clothing</p>
    </footer>
</body>

</html>