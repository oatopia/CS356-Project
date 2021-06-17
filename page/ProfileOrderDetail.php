<?php
    session_start();
    if(!isset($_SESSION['Username'])){
        echo "NOT LOGIN";
        header("Location: ../page/LoginPage.php");
    }
    $ID_order = $_GET['ID_order'];

    $user = $_SESSION['Username'];
      // Create connection
      $conn = new mysqli("localhost", "root", "5643789thanapat" ,"n2clothing");
      // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM ordering_product WHERE ID_order = '$ID_order'";
    $result = $conn->query($sql);
    $Array = array();
   while($row = $result->fetch_assoc()){
       $Array[] = array("ID_op"=>$row['ID_op'],"ID_order"=>$row['ID_order'],"OrderProduct_image"=>$row['OrderProduct_image']
       ,"OrderProduct_name"=>$row['OrderProduct_name'],"OrderProduct_type"=>$row['OrderProduct_type']
       ,"OrderProduct_color"=>$row['OrderProduct_color'],"OrderProduct_size"=>$row['OrderProduct_size']
       ,"OrderProduct_num"=>$row['OrderProduct_num'],"OrderProduct_price"=>$row['OrderProduct_price']);
   }


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ProfileOrderDetail</title>
    <link rel="icon" href="../image/LogoN2clothing.jpg" type="image/icon type">
    <link rel="stylesheet" href="./css/ProfileOrderDetail-php.css?v=<?php echo time(); ?>">
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
                                <li><a id="transferMoney-link" href="./TransferMoney.php">แจ้งชำระเงิน</a></li>
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

    <section class="Cart-container">
        <div class="header-Order">
            <h1>คำสั่งซื้อของลูกค้า</h1>
        </div>
        <div class="Cart-inner-container">
        <table class="Cart-table">
            <tr>
                <th>สินค้า</th>
                <th>คอลเลคชั่น</th>
                <th>ประเภท</th>
                <th>สี</th>
                <th>ไซส์</th>
                <th>จำนวน</th>
                <th>ราคาต่อชิ้น</th>
            </tr>
            <?php
                $Total = 0;
                
            
            foreach($Array as $Array){
                $qty = $Array["OrderProduct_num"];
                $Eachprice = $Array["OrderProduct_price"];
                $price = $qty * $Eachprice;
                $Total = $Total + $price;
            ?>
            <tr>
                <td class="TD-image"><img class="Image-cart-table" src="../image/product/<?php echo $Array["OrderProduct_image"];?>"></td>
                <td><?php echo $Array["OrderProduct_name"];?></td>
                <td><?php echo $Array["OrderProduct_type"];?></td>
                <td><?php echo $Array["OrderProduct_color"];?></td>
                <td><?php echo $Array["OrderProduct_size"];?></td>
                <td><?php echo $Array["OrderProduct_num"];?></td>
                <td id="TD-price">฿<?php echo $Array["OrderProduct_price"];?></td>
                </tr>
                    <?php
                            }
                        
                    ?>

        </table>
        <div class="Total-price">
            <a class="btn-return" href="./ProfileOrder.php">ย้อนกลับ</a>
            <h1>รวมราคาทั้งหมด<span>฿<?php echo $Total;?></span> </h1>
        </div>
        
        </div>
        <footer>
        <p>Copyright © N2clothing</p>
        </footer>
    </section>

    
    
</body>

</html>