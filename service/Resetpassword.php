<?php
$conn = new mysqli("localhost", "root", "5643789thanapat" ,"n2clothing");
    // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//Define Value
$user = $_POST['username'];
$pass = $_POST['password'];
$conpass = $_POST['confirmpassword'];


    mysqli_set_charset($conn, "utf8");
//Check Email is exist

    if($pass === $conpass){
        $sql = "UPDATE  customer SET Password='$pass' WHERE Username = '$user'";
        if ($conn->query($sql) === TRUE) {
            session_write_close();
            $conn->close();
            echo "<script> alert('บันทึกรหัสผ่านใหม่สำเร็จ'); </script>";
            echo "<script> location.href='../html/Login.html'; </script>";
        }
    }else{
        $conn->close();
        echo "<script> alert('รหัสผ่านไม่ตรงกัน'); </script>";
        echo "<script> window.history.back(); </script>";
    }
    
?>