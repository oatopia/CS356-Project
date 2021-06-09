<?php
    session_start();
    session_destroy(); 
    header('Location: http://localhost/CS356-Finalpj/CS356-Project/html/Home.html');
?>