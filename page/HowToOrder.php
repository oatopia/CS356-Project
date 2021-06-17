<?php
    session_start();
    if(!isset($_SESSION['Username'])){
        echo "NOT LOGIN";
        header("../page/LoginPage.php");
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
    <link rel="stylesheet" href="./css/HowToOrder-php.css?v=<?php echo time(); ?>">
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
                <div class="cart-container">
                    <?php
                    if(isset($_SESSION["Order"])){
                        if($_SESSION["Order"] > -1){
                    ?>        
                        <h1 class="Number-cart"><?php echo$_SESSION["Order"]+1 ?></h1>
                    <?php        
                        }      
                    }
                        ?>
                    <img class="cart-icon" src="../image/icon/shopping-cart 1.png" />
                    <?php
                    if(isset($_SESSION["Order"])){
                        if($_SESSION["Order"] > -1){
                    ?> 
                    <div class="cart-detail">
                    <table class="table-cart">
                                        <tr>
                                            <th>รูปภาพ</th>
                                            <th>คอลเลคชั่น</th>
                                            <th>สี</th>
                                            <th>ไซส์</th>
                                            <th>จำนวน</th>
                                            <th>ราคา</th>
                                        </tr>
                    <?php
                        if(isset($_SESSION["Order"])){
                            for ($i=0; $i <= (int)$_SESSION["Order"] ; $i++) { 
                    ?>
                                        <tr>
                                            <td><img class="image-cart" src="../image/product/<?php echo $_SESSION["Product_image"][$i];?>"></td>
                                            <td><?php echo $_SESSION["Product_name"][$i];?></td>
                                            <td><?php echo $_SESSION["Product_color"][$i];?></td>
                                            <td><?php echo $_SESSION["Product_size"][$i];?></td>
                                            <td><?php echo $_SESSION["Product_num"][$i];?></td>
                                            <td>฿<?php echo $_SESSION["Product_price"][$i];?></td>
                                        </tr>
                    <?php
                            }
                        }
                    ?>
                    </table>
                        <a class="GoToBuy" href="./Cart.php">ดูรถเข็นของคุณ</a>
                    </div>
                    <?php        
                        }      
                    }
                        ?> 
                </div>
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
                <p>เมื่อท่านค้นพบสินค้าที่ต้องการแล้ว เพียงแค่ท่านเลือกสี,ไซส์ และจำนวนแล้วคลิกที่ เพิ่มไปยังรถเข็น 
                    <br>ท่านก็สามารถเลือกรายการสินค้าที่ต้องการลงในรถเข็นของท่านได้</p>
            </div>
            <div>
                <label><img src="../image/icon/list.png"/>จัดการรายการสินค้าที่สั่งซื้อในรถเข็น</label>
                <p>ในหน้ารายการสินค้าที่สั่งซื้อของท่าน จะแสดงรายการ, จำนวน และรายละเอียดของสินค้าที่ท่านเลือก พร้อมทั้งราคารวมของสินค้าทั้งหมดที่อยู่ในรถเข็น 
                    <br>ท่านสามารถแก้ไขรายการสินค้าในรถเข็นนี้ได้เมื่อคลิกที่ปุ่ม ลบสินค้า หากท่านต้องการสั่งซื้อสินค้าให้กดปุ่ม สั่งซื้อสินค้า</p>
            </div>
            <div>
                <label><img src="../image/icon/Group.png"/>กำหนดที่อยู่สำหรับจัดส่งสินค้า</label>
                <p>ท่านต้องกรอกที่อยู่ที่จัดส่งในหน้าที่อยู่ซึ่ง ท่านสามารถไปโดยชี้ที่ชื่อผู้ใช้ของท่านแล้วเลือกเมนูที่อยู่ เมื่อท่านเคยกรอกที่อยู่แล้วระบบจะแสดงบนหน้าจอ 
                    <br>ท่านสามารถแก้ไข้ที่อยู่ของท่านได้โดยการกดปุ่ม แก้ไขที่อยู่ หากท่านต้องการบันทึกที่อยู่ใหม่ที่พึ่งแก้ไขให้กดปุ่ม บันทึกที่อยู่ </p>
            </div>
            <div>
                <label><img src="../image/icon/credit.png"/>แจ้งการชำระเงิน</label>
                <p>หากท่านชำระเงินเรียบร้อยแล้ว ท่านสามารถแจ้งการชำระเงินได้ที่หน้าแจ้งการชำระเงิน ท่านสามารถไปโดยชี้ที่เมนูการสั่งซื้อสินค้าแล้วเลือกแจ้งโอนเงิน 
                    <br>ให้ท่านกรอกข้อมูลให้ครบทุกช่องเมื่อกรอกครบแล้วให้ท่านกดปุ่ม แจ้งการชำระเงินเป็นอันเรียบร้อย</p>
            </div>
        </div>

    </section>





    <footer>
        <p>Copyright © N2clothing</p>
    </footer>
</body>

</html>