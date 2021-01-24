<?php
session_start();
include('config.php');

$name = $_SESSION['name'];
$task = $_POST['task'];
if (isset($_SESSION['inname']) && isset($_POST['add-task']) && strlen($task) >= 2 || isset($_SESSION['upname']) && isset($_POST['add-task']) && strlen($task) >= 2) {
    $username = $_POST['username'];
    $email = $_SESSION['inemail'];
    $time = time();
    $date = date('Y-m-d H:i:s', $time);
    if($_SESSION['inname']=='admin' && strlen($username) >= 1){
        $check_username = mysqli_query($conn, "SELECT * FROM `users` WHERE `Name`='$username'");
        $row = mysqli_fetch_array($check_username,MYSQLI_ASSOC);
        $usemail = $row['Email'];
        $conn->query("INSERT INTO `task` (`Name`,`Email`,`Task`,`Date`) VALUES ('$username','$usemail','$task','$date')");
    }elseif ($_SESSION['inname']!='admin' || $_SESSION['upname']) {
        $conn->query("INSERT INTO `task` (`Name`,`Email`,`Task`,`Date`) VALUES ('$name','$email','$task','$date')");
    }
    header('location:index.php');
} else {
    header('location:index.php');
}

if (isset($_POST['update'])) {
    $query_update = " UPDATE `task` SET 
					`Task` ='$_POST[taskUpdate]'
					WHERE id = '$_POST[id]' ";
    mysqli_query($conn, $query_update);
    header('location:index.php');
}
if (isset($_POST['confirm'])) {
    $query_update = " UPDATE `task` SET 
					`Status` ='1'
					WHERE id = '$_POST[id]' ";
    mysqli_query($conn, $query_update);
    header('location:index.php');
}
if (isset($_POST['delete'])) {
    $query_delete = "DELETE FROM `task` WHERE `Id`= '$_POST[id]' ";

    mysqli_query($conn, $query_delete);
    header('location:index.php');
}