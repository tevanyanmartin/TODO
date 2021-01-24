<?php
session_start();
require_once('config.php');
if (isset($_POST['signup'])) {
    $username = "";
    $email = "";
    $errors = array();
    $username = mysqli_real_escape_string($conn, $_POST['upname']);
    $email = mysqli_real_escape_string($conn, $_POST['mail']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['pass1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['pass2']);
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    $user_check_query = "SELECT * FROM users WHERE Name='$username' OR Email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        if ($user['Name'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($user['Email'] === $email) {
            array_push($errors, "email already exists");
        }
    }
    if (count($errors) == 0) {
        $password = md5($password_1);
        $query = "INSERT INTO users (Name, Email, Password) VALUES ('$username', '$email', '$password')";
        mysqli_query($conn, $query);
        $_SESSION['upname'] = $username;
        $_SESSION['inemail'] = $email;
        $_SESSION['name'] = $_SESSION['upname'];
        header('location: index.php');
    } else {
        $_SESSION['upname'] = $username;
        $_SESSION['inemail'] = $email;
        $_SESSION['errors'] = $errors;
        unset($errors);
        header('location:signup.php');
    }
}
if (isset($_POST['signin'])) {
    $error = array();
    $inname = mysqli_real_escape_string($conn, $_POST['inname']);
    $passin = mysqli_real_escape_string($conn, $_POST['inpass']);
    $pass = md5($passin);
    if (empty($inname)) {
        array_push($error, "Username is required");
    }
    if (empty($passin)) {
        array_push($error, "Password is required");
    }
    if (count($error) == 0) {
        $user_query = "SELECT * FROM users WHERE Name = '$inname' AND Password = '$pass'";
        $results = mysqli_query($conn, $user_query);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
//        $users = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['inname'] = $row['Name'];
            $_SESSION['inemail'] = $row['Email'];
            $_SESSION['name'] = $_SESSION['inname'];
            header('location: index.php');
        } else {
            array_push($error, "Wrong username/password combination");
            $_SESSION['error'] = $error;
            unset($error);
            header('location: signin.php');
        }
    } else {
        $_SESSION['name'] = $inname;
        $_SESSION['error'] = $error;
        unset($error);
        header('location: signin.php');
    }
}

$conn->close();