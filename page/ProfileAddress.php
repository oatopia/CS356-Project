<?php
    session_start();
    if(!isset($_SESSION['Username'])){
        echo "NOT LOGIN";
        header("Location: ../page/LoginPage.php");
    }
    $user = $_SESSION['Username'];
    $conn = new mysqli("localhost", "root", "5643789thanapat" ,"n2clothing");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ProfileAddress</title>
    <link rel="icon" href="../image/LogoN2clothing.jpg" type="image/icon type">
    <link rel="stylesheet" href="./css/ProfileAddress-php.css?v=<?php echo time(); ?>">
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
                                <li class="address-link"><a href="./ProfileAddress.php" >ที่อยู่</a></li>
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


    <section class="ProfileAddress-container">
        <div class="header-Address">
            <h1>ที่อยู่ของลูกค้า</h1>
        </div>
        <div class="content-Address">
            <div class="left-menu">
                <div class="icon-username">
                    <img class="icon-user" src="../image/icon/profile-user.png"/>
                    <h2><?= $user; ?></h2>
                </div>
                <ul>
                    <li>
                        <a href="./ProfileOrder.php">คำสั่งซื้อ</a>
                    </li>
                    <li class="here">
                        <a href="./ProfileAddress.php">ที่อยู่</a>
                    </li>
                    <li>
                        <a href="../service/Logout.php">ออกจากระบบ</a>
                    </li>
                </ul>
            </div>
            <div class="right-content">
                <h2>ที่อยู่นี้จะถูกใช้ในหน้าการสั่งซื้อ</h2>
                <div class="Address-container">
                <?php
                    $sql = "SELECT * FROM address_customer WHERE ID_user='{$_SESSION['UserID']}' ";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        if(isset($_POST["btn-edit-address"])){
                ?>
                        <form method="post" action="../service/SaveAddress.php">
                        <textarea name="textarea-edit-address" class="textarea-address" ><?php echo$row['Address'];?></textarea>
                        <button name="btn-save-edit-address" type="submit" class="btn-save-address">บันทึกที่อยู่</button>
                        </form>
                <?php
                        }else{
                ?>
                        <form method="post">
                        <label class="address-label"><?php echo$row['Address'];?></label>
                        <button name="btn-edit-address" class="btn-edit-address">แก้ไขที่อยู่</button>
                        </form>
                <?php
                        }
                    }else{
                ?>  
                        <form method="post" action="../service/SaveAddress.php">
                        <textarea name="textarea-address" class="textarea-address" placeholder="กรอกที่อยู่..."></textarea>
                        <button name="btn-save-address" type="submit" class="btn-save-address">บันทึกที่อยู่</button>
                        </form>
                <?php  
                    }
                ?>
                    

                </div>
            </div>
        </div>
    </section>
    
    <footer>
        <p>Copyright © N2clothing</p>
    </footer>
</body>
</html>