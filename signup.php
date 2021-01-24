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
    <title>Sign Up</title>
</head>
<body>
<div class="show-signup-form">
    <h1> SIGN UP</h1>
    <div class="signup-div">
        <form action="validation.php" method="post">
        <input type="text" name="upname" id="upname" value="<?php echo $_SESSION['upname']; ?>" placeholder="Username">
        <input type="email" name="mail" id="mail" value="<?php echo $_SESSION['inemail']; ?>" placeholder="Email">
        <input type="password" name="pass1" id="pass1" placeholder="Password">
        <input type="password" name="pass2" id="pass2" placeholder="Repeat Password">
    </div>
    <input type="submit" id="signup" name="signup" value="Sign Up">
    </form>
    <?php if (count($_SESSION['errors']) > 0) : ?>
        <div class="error">
            <?php foreach ($_SESSION['errors'] as $error) : ?>
                <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
        <?php endif; unset($_SESSION['errors']);?>
</div>







