<?php      
      //Define Value
    session_start();
    $userID = $_SESSION["UserID"];
    $bank = $_POST["bank"];
    if($bank == "SCB"){
        $accountname = 'Kanchana Don';
        $accountnumber = '407-240-0244';
    }else{
        $accountname = 'Thanapat Tan';
        $accountnumber = '826-523-8850';
    }
    $tname = $_POST["t-name"];
    $tac = $_POST["t-ac"];
    $tnumber = $_POST["t-number"];
    $ID_order = $_POST["id-order"];
    $Totalprice = $_POST["totalprice"];
      
       // Create connection
    $conn = new mysqli("localhost", "root", "5643789thanapat" ,"n2clothing");
       // Check connection
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    }
    //    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT * FROM transfer WHERE ID_user = '$userID' AND ID_order='$ID_order' ";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
            session_write_close();
            $conn->close();
            echo "<script> alert('แจ้งโอนเงินแล้ว'); </script>";
            echo "<script> window.history.back(); </script>";
    }else{
        $sql = "SELECT * FROM ordering WHERE ID_order='$ID_order' AND ID_user='$userID'";
        $result2 = $conn->query($sql);
        if($result2->num_rows > 0){
            $row = $result2->fetch_assoc();
            if($Totalprice == $row["TotalPrice"]){
                $sql = "INSERT INTO transfer (ID_user,Bank_name,Account_name,Account_number,Transferor_name,Transferor_Anumber,Transferor_number,ID_order,TotalPrice) 
                VALUES('$userID', '$bank', '$accountname ', '$accountnumber', '$tname', '$tac', '$tnumber', '$ID_order', '$Totalprice')";
                if ($conn->query($sql) === TRUE) {
                    session_write_close();
                    $conn->close();
                    echo "<script> alert('บันทึกการแจ้งโอนเงินสำเร็จ'); </script>";
                    echo "<script> location.href='../page/Home.php'; </script>";
                }
            }else{
                session_write_close();
                $conn->close();
                echo "<script> alert('จำนวนเงินไม่ถูกต้อง'); </script>";
                echo "<script> window.history.back(); </script>";
            }
            
            
        }else{
            session_write_close();
            $conn->close();
            echo "<script> alert('ไม่มีเลขที่สั่งซื้อ'); </script>";
            echo "<script> window.history.back(); </script>";
        }

    }  

    if(isset($_POST["btn-save-address"])){
        
       if ($conn->query($sql) === TRUE) {
        session_write_close();
        $conn->close();
        echo "<script> alert('บันทึกที่อยู่สำเร็จ'); </script>";
        echo "<script> location.href='../page/ProfileAddress.php'; </script>";
        }
       
    }else if(isset($_POST["btn-save-edit-address"])){
        $sql = "UPDATE address_customer SET Address='$Editaddress' WHERE ID_user='$userID'";
        if ($conn->query($sql) === TRUE) {
            session_write_close();
            $conn->close();
            echo "<script> alert('บันทึกการแก้ไขที่อยู่สำเร็จ'); </script>";
            echo "<script> location.href='../page/ProfileAddress.php'; </script>";
        }
    }
       

?>