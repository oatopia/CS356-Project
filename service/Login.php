<?php      
      //Define Value
    $user = $_POST['username'];
    $pass = $_POST['password'];
      
      
       // Create connection
    $conn = new mysqli("localhost", "root", "5643789thanapat" ,"n2clothing");
       // Check connection
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    }
    //    mysqli_set_charset($conn, "utf8");
       $sql = "SELECT * FROM customer WHERE Username = '$user'";
       $result = $conn->query($sql);
    //    $row = $result->fetch_assoc();
    //    printf ("%s (%s)\n", $row["Email"], $row["Password"]);
    //    echo ".$row["Email"].";w
    //    print $row["Email"];
    //    print $password;
    //    echo "<script> window.history.back(); </script>";


       if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if($row["Username"]==$user && $row["Password"]==$pass){
                session_start();
                $_SESSION["Username"] = $row["Username"];
                session_write_close();
                $conn->close();
                echo "<script> alert('Login Success'); </script>";
                echo "<script> location.href='../page/Home.php'; </script>";
                
            }else{
                $conn->close();
                echo "<script> alert('Wrong Email or Password'); </script>";
                echo "<script> window.history.back(); </script>";
            }
        }else{
            echo "<script> alert('Not found Username'); </script>";
            echo "<script> window.history.back(); </script>";
        }

       

?>