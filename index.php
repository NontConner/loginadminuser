<?php 

    session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

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

    <?php if (isset($_SESSION['success'])) : ?>
    <div class="success">
        <?php 
                echo $_SESSION['success'];
            ?>
    </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['error'])) : ?>
    <div>
        <?php 
                echo $_SESSION['error'];
            ?>
    </div>
    <?php endif; ?>

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
                                <form class="text-center" style="color: #757575;" action="login.php" method="post">

                                    <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text" for="username">เข้าสู่ระบบ</h3>
                                    <input type="text" class="form-control mb-4" name="username" placeholder="Username" required>

                                    <input type="password" class="form-control" name="password" placeholder="Password" required>

                               
                                    <div class="text-center mt-3">
                                    <input type="submit" name="submit" value="เข้าสู่ระบบ" class="btn btn-primary">
                                    </div>

                                </form>

                                <a href="register.php">ลงทะเบียน</a>


                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


    </div>



</body>

</html>

<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>
