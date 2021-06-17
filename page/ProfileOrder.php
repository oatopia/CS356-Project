
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
    <link rel="stylesheet" href="./css/ProfileOrder-php.css?v=<?php echo time(); ?>">
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
                <h2>คำสั่งซื้อ</h2>
                <div class="list-Order">
                    <?php
                       $sql = "SELECT * FROM ordering WHERE ID_user='{$_SESSION['UserID']}' ";
                       $result = $conn->query($sql);
                       $Array = array();
                       while($row = $result->fetch_assoc()){
                        $Array[] = array("ID_order"=>$row['ID_order'],"ID_user"=>$row['ID_user']
                        ,"Quantity"=>$row['Quantity'],"TotalPrice"=>$row['TotalPrice']);
                       }

                       foreach($Array as $Array){
                           ?>
                        <div onclick="window.location='./ProfileOrderDetail.php?ID_order=<?php echo $Array['ID_order'];?>'" class="order-block">
                         <h1>เลขที่สั่งซื้อ<span>#<?php echo $Array['ID_order'];?></span></h1>
                         <h2>รายการสินค้า <?php echo $Array['Quantity'];?></h2>
                         <h2>ราคาทั้งหมด ฿<span class="Totalprice"><?php echo $Array['TotalPrice'];?></span></h2>
                         <?php
                         $sql = "SELECT * FROM transfer WHERE ID_order='{$Array['ID_order']}'";
                         $result = $conn->query($sql);
                         if($result->num_rows > 0){
                             ?>
                             <h2 id="transfer-complete">แจ้งชำระเงินแล้ว</h2>
                             <?php
                             
                         }else{
                             ?>
                        <h2 id="transfer-waiting">รอแจ้งชำระเงิน</h2>
                        <?php
                         }
                         ?>
                        </div>

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