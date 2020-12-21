<?php 

    session_start();
    // unset($_SESSION['username']);

    if (isset($_POST['username'])) {

        include('connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$passwordenc'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['id'];
            $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
            $_SESSION['userlevel'] = $row['userlevel'];

            if ($_SESSION['userlevel'] == 'a') {
                header("Location: admin_page.php");
            }

            if ($_SESSION['userlevel'] == 'm') {
                header("Location: user_page.php");
            }
        } else {
            array_push($result, "<script>
            Swal.fire({
            icon: 'error',
            title: 'รหัสผ่านไม่ถูกต้อง',
            text: 'กรุณาตรวจสอบ รหัสผ่านหรือไอดีผู้ใช้ถูกต้องหรือไม่!', 
            })
            </script>");
            
            $_SESSION['error'] = "<script>
            Swal.fire({
            icon: 'error',
            title: 'รหัสผ่านไม่ถูกต้อง',
            text: 'กรุณาตรวจสอบ รหัสผ่านหรือไอดีผู้ใช้ถูกต้องหรือไม่!', 
            })
            </script>";

            header("location: login.php");
        }

    } else {
        header("Location: index.php");
    }


?>