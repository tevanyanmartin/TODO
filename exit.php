<?php
session_start();
if (isset($_SESSION['inname'])) {
    session_unset($_SESSION['inname']);
} elseif (isset($_SESSION['inname'])) {
    session_unset($_SESSION['upname']);
}

header("location:index.php");
session_destroy();
