<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IRON MAN - Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <?php

    include("common/connection.php");



    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check = "SELECT * FROM admin WHERE email = '$email';";
        $check_result = mysqli_query($conn, $check);
        if (mysqli_num_rows($check_result)) {
            $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password';";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)) {
                header("Location: index.php");
            } else {
                echo "Incorrect password.";
            }
        }
        
    }


    ?>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5" >
                            <h3 class="card-title text-center mb-3">Iron Man Login</h3>
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <label>Email </label>
                                    <input type="text" name="email" class="form-control p_input">
                                </div>
                                <div class="form-group">
                                    <label>Password </label>
                                    <input type="password" name="password" class="form-control p_input">
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    
                                    <a href="#" class="forgot-pass">Forgot password</a>
                                </div>
                                <div class="text-center d-grid gap-2">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>