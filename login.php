<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
session_start();
require './checkDangNhap.php';
require './login_log.php';
require './User.php';

//validate

$email = $pass = $error = '';

$regEx = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/";

if (isset($_POST['submit'])) {
    // validate email va password
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        $error = 'vui long dien du email va mat khau';
    }
    if (preg_match($regEx, $_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $error = 'khong dung dinh dang email';
    }
    if (strlen($_POST['password']) <= 20) {
        $pass = $_POST['password'];
    } else {
        $error = 'mat khau chi toi da 20 ky tu';
    }
    // neu khong co loi thi gi lai lich su vao userHisory

    if (checkDangNhap($email, $pass) != null) {
        //ghi lai lich su dang nhap
        login_log($email, $pass);
        $user = new User($email, $pass);
        $_SESSION['email'] = $user->getEmail();
        setcookie("email", $user->getEmail(), time() + 3600, '/');
        // setcookie("pass",$pass,time() +3600,'/');
        header('location:home.php');
    }
}
if (isset($_COOKIE['email'])) {
    $_SESSION['email'] = $_COOKIE['email'];
    echo $_COOKIE["email"];
    header('location:home.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>

<body>
    <div class="login">

        <div class="bg-img">
            <img src="./image/cover-login-page.png" alt="">
        </div>
        <div class="bg-dark">&nbsp</div>
        <div class="form-login">
            <div class="des">
                <h2>Login Form</h2>
                <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
            </div>
            <?php
            if ($error !== '') {
                echo '<p style="background-color: red; color:white;">' . $error . '</p>';
            }
            ?>
            <form action="" method="post">
                <div class="form-row">
                    <label for="">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="form-row">
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="form-bottom">
                    <button type="submit" name="submit"> Login </button>
                    <a href="">Sign up</a>
                    <a href="">Forgot pass</a>
                </div>

            </form>

        </div>
    </div>

</body>

</html>