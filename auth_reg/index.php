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
</head>
<body>
<div class="container">
    <div class="inner_container">
        <form action="includes/signin.php" class="form" method="post">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" placeholder="enter login">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="enter password">

            <button>Enter</button>

            <p class="p_reg">
                <?php
                if (isset($_SESSION['msg'])) {
                    $msg = $_SESSION['msg'];
                    echo '<br><b>' . $msg . '</b>';
                    unset($_SESSION['msg']);
                }
                else {
                    echo "Don't have an account?&nbsp; - &nbsp;<a href=\"registration.php\"> registration!</a>";
                }
                ?>
            </p>
        </form>
    </div>
</div>
</body>
</html>
