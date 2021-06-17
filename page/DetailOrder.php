<?php
    session_start();
    if(!isset($_SESSION['Username'])){
        echo "NOT LOGIN";
        header("Location: ../page/LoginPage.php");
    }




    $user = $_SESSION['Username'];
    $c_name = $_GET['collection_name'];
    $c_price = $_GET['collection_price'];
    $c_type = $_GET['collection_type'];
    $conn = new mysqli("localhost", "root", "5643789thanapat" ,"n2clothing");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
   }
   //select all product
   $sql = "SELECT * FROM product WHERE Product_collection = '$c_name' ";
    $result = $conn->query($sql);
    $Arrayproduct = array();
    
   while($row = $result->fetch_assoc()){
       $Arrayproduct[] = array("ID_product"=>$row["ID_product"],"Product_color"=>$row["Product_color"]
       ,"Product_price"=>$row["Product_price"],"Product_image"=>$row["Product_image"]
       ,"Product_type"=>$row["Product_type"],"Product_collection"=>$row["Product_collection"]);
   }

   
   //check have item in cart
   if(isset($_POST["addtocart"])){
    $IndexArray = array_search($_POST["p_color"], array_column($Arrayproduct,"Product_color"));
    $image_product = $Arrayproduct[$IndexArray]["Product_image"];
    if(!isset($_SESSION["Order"])){

        $_SESSION["Order"] = 0;
        $_SESSION["Product_name"][0] = $c_name;
        $_SESSION["Product_image"][0] = $image_product;
        $_SESSION["Product_type"][0] = $c_type;
        $_SESSION["Product_price"][0] = $c_price;
        $_SESSION["Product_color"][0] = $_POST["p_color"];
        $_SESSION["Product_size"][0] = $_POST["p_size"];
        $_SESSION["Product_num"][0] = $_POST["p_number"];
    }else{
        $keyONE = array_search($c_name, $_SESSION["Product_name"]);
        $keyTWO = array_search($_POST["p_color"], $_SESSION["Product_color"]);
        $keyTHREE = array_search($_POST["p_size"], $_SESSION["Product_size"]);
        if((string)$keyONE != "" && (string)$keyTWO != "" && (string)$keyTHREE != ""){
            if($keyONE == $keyTWO && $keyTWO == $keyTHREE && $keyONE == $keyTHREE){   
                $_SESSION["Product_num"][$keyONE] = $_SESSION["Product_num"][$keyONE] + $_POST["p_number"];      
            }else{
            }
        }else{
            $_SESSION["Order"] = $_SESSION["Order"] + 1;
            $NewOrder = $_SESSION["Order"];
            $_SESSION["Product_name"][$NewOrder] = $c_name;
            $_SESSION["Product_image"][$NewOrder] = $image_product;
            $_SESSION["Product_type"][$NewOrder] = $c_type;
            $_SESSION["Product_price"][$NewOrder] = $c_price;
            $_SESSION["Product_color"][$NewOrder] = $_POST["p_color"];
            $_SESSION["Product_size"][$NewOrder] = $_POST["p_size"];
            $_SESSION["Product_num"][$NewOrder] = $_POST["p_number"];
        }
    }
   }
     
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DetailOrder</title>
    <link rel="icon" href="../image/LogoN2clothing.jpg" type="image/icon type">
    <link rel="stylesheet" href="./css/DetailOrder-php.css?v=<?php echo time(); ?>">
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

    <section class="detail-order">
        <div class="image-goods">
            <?php 
                foreach($Arrayproduct as $image){
                    echo'<div  class="Image-product-slide fade">';
                    echo'<img class="Image-product" src="../image/product/'.$image["Product_image"].' " />';
                    echo'</div>';
                }
            ?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div class="detail-goods">
            <div class="detail">
                <form method='post' action="">
                <h1 class="goods-collection" name="p_name"><?=$c_name;?></h1>
                <h1 class="goods-type" name="p_type"><?=$c_type;?></h1>
                <h1 class="goods-price" name="p_price">฿<?=$c_price;?></h1>
                
                <div class="select-container">
                    <div class="select-label">
                        <label>สี</label>
                    </div>
                    <div class="select-input">
                    <select class="select-tag" name="p_color">
                        <?php 
                        foreach($Arrayproduct as $color){
                            echo'<option value="'.$color["Product_color"].'">'.$color["Product_color"].'</h1>';
                        }  
                        ?>
                        </select>
                    </div>
                        
                    
                </div>
                <div class="select-container">
                    <div class="select-label">
                        <label>ไซส์</label>
                    </div>
                    <div class="select-input">
                    <select class="select-tag" name="p_size">
                        <option >XS</option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                        </select>
                    </div>
                        
                    
                </div>
                <div class="number-pick-container">
                    <div class="input-number">
                        <a class="btn-minus" onclick="decrement();">-</a>
                        <input id="input-number" name="p_number" class="input-text-number" type="number" value="1"/>
                        <a class="btn-plus" onclick="increment();">+</a>
                    </div>
                    <button class="btn-pickup" name="addtocart" type="submit" >เพิ่มไปยังรถเข็น</button>
                </div>
                </form>
            </div>
            
        </div>
    </section>

    <footer>
        <p>Copyright © N2clothing</p>
    </footer>
    <script>
        function increment(){
            var input = document.getElementById("input-number");
            input.value = parseInt(input.value) + 1;
        }

        function decrement(){
            var input = document.getElementById("input-number");
            if(input.value > 1){
                input.value = parseInt(input.value) - 1;
            }
            
        }
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("Image-product-slide");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
            }
            slides[slideIndex-1].style.display = "block";  
        }

    </script>
</body>

</html>