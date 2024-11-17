
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Login Form</h2>
        <form id="loginForm">
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
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script src="assets/js/login_js/script.js"></script>

</body>
</html>


