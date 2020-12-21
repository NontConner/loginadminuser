<?php 

    session_start();

    require_once "connection.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
             echo "<script> alert('มีชื่อผู้ใช้อยู่แล้ว กรุณาสมัครใหม่อีกครั้ง');</script>";
        
        } else {
            $passwordenc = md5($password);

            $query = "INSERT INTO user (username, password, firstname, lastname, userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', 'm')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "ลงทะเบียนผู้ใช้สำเร็จ";
                header("Location: index.php");
            } else {
                $_SESSION['error'] = "อะไรบางอย่างผิดปกติ";
                header("Location: index.php");
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
    <title>Register Page</title>

    <link rel="stylesheet" href="style.css">

    <link rel="icon" type="image/png"
        href="https://scontent.fkkc3-1.fna.fbcdn.net/v/t1.0-9/119980752_337785307574954_1757152202764221432_o.jpg?_nc_cat=105&ccb=2&_nc_sid=09cbfe&_nc_eui2=AeEdQ3uuMUpSNsKpHfjvpUDro1XX0a4IIyujVdfRrggjKx0oaTlnEEJRQqIYyg0KJMUxDMwjlPd-dN2hT7EGYqeo&_nc_ohc=0bT4uczorNcAX96yl_4&_nc_ht=scontent.fkkc3-1.fna&oh=6b8d05997d7e1dd2078a3062bc4a3886&oe=5FBB4911" />
    <!-- การลิ้ง css bootstrap เเบบ cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- การลิ้ง javascript ของ bootstrap เเบบ cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- การลิ้ง css ของ data table เเบบ cdn -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <!-- การลิ้ง sweetalert2 เเบบ cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body
    style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background.jpg); background-size: cover; background-position: center center;">

    <!--Section: Content-->
    <div class="container my-5 px-0 z-depth-1 ">

        <section class="p-5 my-md-5 text-center">

            <div class="my-5 mx-md-5" action="">

                <div class="row">

                    <div class="col-md-6 mx-auto">

                        <!-- Material form login -->
                        <div class="card">

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Form -->

                                <form class="text-center" style="color: #757575;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                                    <!-- <label for="username">ชื่อผู้ใช้</label> -->
                                    <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">ลงทะเบียน</h3>
                                    <input type="text" class="form-control mb-4" name="username" placeholder="ชื่อผู้ใช้" required>
                                    <!-- <label for="password">รหัสผ่าน</label> -->
                                    <input type="password" class="form-control mb-4" name="password" placeholder="รหัสผ่าน" required>
                                    <!-- <label for="firstname">ชื่อ</label> -->
                                    <input type="text" class="form-control mb-4" name="firstname" placeholder="ชื่อ" required>
                                    <!-- <label for="lastname">นามสกุล</label> -->
                                    <input type="text" class="form-control mb-4" name="lastname" placeholder="นามสกุล" required>
                                    <div class="text-center mt-3">
                                    <input type="submit" name="submit" value="ลงทะเบียน" class="btn btn-primary">
                                    </div>
                                </form>

                                <a href="index.php">เข้าสู่ระบบ</a>



                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


    </div>


</body>

</html>