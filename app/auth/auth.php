<?php
session_start();
require_once dirname(dirname(__FILE__)) ."/init.php";
$auth = new Authentikasi();

if (isset($_GET['login'])) {  
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $login = $auth->loginadmin($username, $password);
    if ($login == 0) {
        header('Location: '.BASEURL.'admin/Dashboard/admin/');
    }else {
        flash::setFlash('Username atau password yang anda masukan salah', 'danger');
        header('Location: '.BASEURL . 'admin/');
    }
}
if (isset($_GET['logout'])) {
    if (isset($_SESSION)) {
       $logout = $auth->logoutadmin();
       if ($logout == 0) {
            header('Location: '.BASEURL . 'admin/');
       }
    }
}