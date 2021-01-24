<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="bootstrap-css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-css/bootstrap.min.css.map">
    <link rel="stylesheet" href="bootstrap-css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="bootstrap-css/bootstrap-grid.min.css.map">
    <link rel="stylesheet" href="bootstrap-css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="bootstrap-css/bootstrap-reboot.min.css.map">
    <title>homeWork 9</title>
</head>
<body>
<?php
if (!isset($_SESSION['inname']) && !isset($_SESSION['upname'])) {
    echo '<a href="signin.php"  class="signin-button"  >Sign In</a>';
}
?>
<div class="username">
    <?php
    if (isset($_SESSION['inname'])) {
        echo '<a href="exit.php" class="logout" id="logout">Logout</a>';
        echo '<p>Hi ' . $_SESSION['inname'] . ' !</p>';
    } elseif (isset($_SESSION['upname'])) {
        echo '<a href="exit.php" class="logout" id="logout">Logout</a>';
        echo '<p>Welcome' . $_SESSION['upname'] . '!</p>';
    }
    ?>
</div>

<div class="container">
    <div class="task">
        <?php
        if (isset($_SESSION['inname']) || isset($_SESSION['upname'])) {
            require_once('task.php');
        }
        ?>
    </div>
    <div class="table">
        <?php
        require('table.php');
        ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="bootstrap-js/bundle.min.js"></script>
<script src="bootstrap-js/bundle.min.js.map"></script>
<script src="bootstrap-js/bootstrap.min.js"></script>
<script src="bootstrap-js/bootstrap.min.js.map"></script>


