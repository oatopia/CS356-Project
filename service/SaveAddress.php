<?php      
      //Define Value
    session_start();
    $userID = $_SESSION["UserID"];
    $address = $_POST['textarea-address'];
    $Editaddress = $_POST['textarea-edit-address'];
      
       // Create connection
    $conn = new mysqli("localhost", "root", "5643789thanapat" ,"n2clothing");
       // Check connection
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    }
    //    mysqli_set_charset($conn, "utf8");
    if(isset($_POST["btn-save-address"])){
        $sql = "INSERT INTO address_customer (ID_user,Address) VALUES('$userID', '$address')";
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