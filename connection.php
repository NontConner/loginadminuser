<?php 

    $conn = mysqli_connect("localhost", "root", "", "loginadminuser");

    if (!$conn) {
        die("ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้ " . mysqli_error($conn));
    }

?>