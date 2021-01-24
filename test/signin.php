<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
<div class="signin">
    <div class="form-content">
        <h1> SIGN IN</h1>
        <div class="signin-div">
            <form action="validation.php" method="post">
                <input type="text" name="inname" value="<?php echo $_SESSION['name'];?>" placeholder="Username">
                <input type="password" name="inpass" placeholder="Password">
                <input type="submit" name="signin" value="Sign In">
            </form>
        </div>
        <a href="signup.php" target="_blank" class="signup-link">Also we can <span>Sign Up</span> here</a>
    </div>
    <?php if (count($_SESSION['error']) > 0) : ?>
        <div class="error">
            <?php foreach ($_SESSION['error'] as $error) : ?>
                <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
    <?php endif; unset($_SESSION['error']);?>
    <div class="close-form"><a href="index.php">x</a></div>
</div>
