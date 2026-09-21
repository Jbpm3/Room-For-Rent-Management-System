<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <?php include_once 'include/logoHeader.php'; ?>
    </div>

    <div class="login-part">
        <h2>LOGIN TO YOUR ACCOUNT</h2>
        <p class="register">
            <i>Don't have an account? <a href="signup.php">Book an appointment</a> <br>with us to have an account made.</i>
        </p>

        <form action="loginBackEnd.php" method="post">
            <input type="text" placeholder="Username" name="username" id="username" required>
            <p>Username</p>
            <input type="password" placeholder="Password" name="password" id="password" required>
            <p>Password</p>
            <button type="submit">Submit</button>

            <!-- Error Message -->
            <?php if (isset($_GET['error'])): ?>
                <p style="color: red; font-weight: bold;"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
