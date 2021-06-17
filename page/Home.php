<?php
    session_start();
    if(!isset($_SESSION['Username'])){
        echo "NOT LOGIN";
        header("Location: ../page/LoginPage.php");
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
    <link rel="stylesheet" href="./css/Home-php.css?v=<?php echo time(); ?>">
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
                                <li><a href="./TransferMoney.php">แจ้งชำระเงิน</a></li>
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

    <section class="slide-image">
            <img class="image-slide" src="../image/showimage.jpg" style="width: 100%;"/>
    </section>

    <section class="collection-image">
        <div id="first-collection" class="collection-contain" onclick="window.location.href='./AllOrder-shirt.php'">
            <label>เสื้อ</label>
            <img src="../image/shirt.jpg"/>
        </div>
        
        <div class="collection-contain" onclick="window.location.href='./AllOrder-dress.php'">
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
            <?php echo'<button class="btn-choose" onclick=\'window.location.href="./DetailOrder.php?collection_name=Two-Tone&amp;collection_price=410&amp;collection_type=Dress&amp;"\'>เลือกรูปแบบ</button>' ?>
        </div>
        
        <div id="center-best" class="best-seller-contain">
            <div  class="best-seller-contain-inner">
                <img src="../image/best-2.jpg"/>
            </div>
            <p>Macaron</p>
            <h4>฿420</h4>
            <?php echo'<button class="btn-choose" onclick=\'window.location.href="./DetailOrder.php?collection_name=Macaron&amp;collection_price=420&amp;collection_type=Dress&amp;"\'>เลือกรูปแบบ</button>' ?>
        </div>
        
        <div class="best-seller-contain">
            <div class="best-seller-contain-inner">
                <img src="../image/best-3.jpg"/>
            </div>
            <p>Cake</p>
            <h4>฿250</h4>
            <?php echo'<button class="btn-choose" onclick=\'window.location.href="./DetailOrder.php?collection_name=Cake&amp;collection_price=420&amp;collection_type=Dress&amp;"\'>เลือกรูปแบบ</button>' ?>
        </div>
    </section>

    <section class="btn-all-item-contain">
        <button class="btn-all-item" onclick="window.location.href='./AllOrder.php'">ดูสินค้าทั้งหมด</button>
    </section>
    
    <footer>
        <p>Copyright © N2clothing</p>
    </footer>
</body>
</html>