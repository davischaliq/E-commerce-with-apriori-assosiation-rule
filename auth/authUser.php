<?php
    session_start();
    require_once dirname(dirname(__FILE__)) ."/app/init.php";
    $auth = new authentikasi();
if (isset($_GET['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $login = $auth->signin($username, $password);
    return print_r($login);
}

if (isset($_GET['regist'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $regist = $auth->regist($firstname, $lastname, $email, $password, $username);
    return print_r($regist);
}

if (isset($_GET['keluar']) && isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    // session_destroy();
    header('Location: '. BASEURL);
}