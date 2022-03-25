<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth and registration page</title>
    <link rel="stylesheet" href="assets/styles/main.css">
    <script src="assets/js/check_pass.js"></script>
</head>
<body>
<div class="container">
    <div class="inner_container">
        <form action="includes/signup.php" class="form" method="post" enctype="multipart/form-data">

            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="enter full name" required>

            <label for="email">Email(your login)</label>
            <input type="email" name="email" id="email" placeholder="enter email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="enter password"
                   onkeydown="checkPassword()" onkeyup="check()" required>

            <label for="re_password">Confirm password</label>
            <input type="password" name="re_password" id="re_password" placeholder="confirm password" onkeyup="check()" required>
            <div id='message'></div>
            <div id='password_strength'></div>

            <label for="photo">Profile image</label>
            <input type="file" name="photo" id="photo">
            
            <button id="submit">Enter</button>

            <p class="p_reg">
                Do you have an account?&nbsp; - &nbsp;<a href="index.php"> login!</a>
                <?php
                if (isset($_SESSION['msg'])) {
                    $msg = $_SESSION['msg'];
                    echo '<br><b>' . $msg . '</b>';
                    unset($_SESSION['msg']);
                }
                ?>
            </p>
        </form>
    </div>
</div>
</body>
</html>
