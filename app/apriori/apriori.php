<?php
session_start();
require_once dirname(dirname(__FILE__)) ."/init.php";
if (isset($_GET['proses'])) {
    $min_support = htmlspecialchars($_POST['support']);
    $min_confi = htmlspecialchars($_POST['confidence']);
    $apriori = new mining($min_support, $min_confi);
    $data = $apriori->start($min_support, $min_confi);
    if ($data == 0) {
        flash::setFlash($data['pesan'], $data['type']);
        // return print_r(0);
        header('Location:'. BASEURL.'admin/Dashboard/admin/apriori.php');
    }else {
        flash::setFlash($data['pesan'], $data['type']);
        // return print_r(0);
        header('Location:'. BASEURL.'admin/Dashboard/admin/apriori.php');
    }
}