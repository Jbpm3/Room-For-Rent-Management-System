<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="include/logoHeader.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <?php include_once 'include/logoHeader.php'; ?>
    </div>

    <div class="login-part">
        <h2>BOOK AN APPOINTMENT</h2>

        <form action="signupBackEnd.php" method="post">
            <input type="text" placeholder="First Name" name="fName" id="fName" required>
            <p>First Name</p>
            <input type="text" placeholder="Last Name" name="lName" id="lName" required>
            <p>Last Name</p>
            <input type="email" placeholder="Email" name="email" id="email" required>
            <p>Email</p>
            <input type="text" placeholder="Contact No." name="contact" id="contact" required>
            <p>Contact No.</p>
            <button type="submit">Submit</button>
        </form>

        <p>Have an account? <a href="login.php"><i>Login here</i></a></p>
    </div>
</body>
</html>