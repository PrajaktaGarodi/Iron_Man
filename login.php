<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRON MAN - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<style>
    .main {
        width: 100%;
        height: 100vh;
        background-image: url(assets/images/login-img.jpeg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<body>
    <div class="main">
        <div class="container">
            <?php

            include("common/connection.php");


                
                if(isset($_POST['submit'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $check = "SELECT * FROM admin WHERE email = '$email';";
                    $check_result = mysqli_query($conn, $check);
                    if(mysqli_num_rows($check_result)){
                        $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password';";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result)){
                            header("Location: index.php");
                        }else{
                            echo "Incorrect password.";
                        }

                    }

                }


            ?>
            <h2 class="text-center text-white">Iron Man Login</h2>
            <form action="login.php" method="post">
                <div class="row mt-3  d-flex justify-content-center">
                    <div class="col-md-4 bg-white m-5 p-4 rounded-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                            <small class="text-danger d-none" id="emailError">Please enter a valid email.</small>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            <small class="text-danger d-none" id="passwordError">Password must be at least 6 characters.</small>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-primary" name="submit">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <script src="assets/js/login_js/script.js"></script>

</body>

</html>