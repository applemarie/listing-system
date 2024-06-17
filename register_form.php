<?php
include('config.php');
include('register_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="register-form">
            <div class="container">
                <h2>Register</h2>
                <div class="input-group">
                    <label for="image">Upload Profile</label>
                    <input type="file" name="image" id="image" required>
                </div>
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label>
                        <input type="radio" name="role" value="user" checked> User
                    </label>
                    <label>
                        <input type="radio" name="role" value="admin"> Admin
                    </label>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Register</button>
                <p class="login-link">Already have an account? <a href="login_form.php">Login here</a>.</p>
            </div>
        </div>
    </form>
</body>
</html>