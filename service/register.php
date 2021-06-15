<?php
$conn = new mysqli("localhost", "root", "5643789thanapat" ,"n2clothing");
    // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//Define Value
$user = $_POST['username'];
$pass = $_POST['password'];


mysqli_set_charset($conn, "utf8");
//Check Email is exist
    $sql = "SELECT * FROM customer WHERE Username = '$user'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
            $conn->close();
            echo "<script> alert('มีชื่อผู้ใช้งานแล้ว'); </script>";
            echo "<script> window.history.back(); </script>";
            exit;
    }else{
        //Insert
        $sql = "INSERT INTO customer (Username,Password) VALUES('$user', '$pass')";
        if($conn->query($sql) === FALSE){
            echo "<script> alert('erorr account'); </script>";
        }
        $conn->close();
        echo "<script> alert('ลงทะเบียนสำเร็จ!!'); location.href='../html/Login.html'; </script>";
    }
?>