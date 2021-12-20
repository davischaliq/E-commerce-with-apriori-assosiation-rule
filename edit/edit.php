<?php
require_once dirname(dirname(__FILE__)).'/app/init.php';
session_start();
$dashboard = new dashboard();
if (isset($_GET['PPusers'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $address = htmlspecialchars($_POST['address']);
    $provinsi = htmlspecialchars($_POST['provinsi']);
    $kota = htmlspecialchars($_POST['kota']);
    $postal = htmlspecialchars($_POST['postal']);

    $pptype = $_FILES['pp']['type'];
    $pptmp = $_FILES['pp']['tmp_name']; 
    $ppsize = $_FILES['pp']['size'];
    $pperr = $_FILES['pp']['error'];
    $extfile = strtolower(pathinfo($_FILES['pp']['name'],PATHINFO_EXTENSION));

    $dataPOST = array('firstname' => $firstname, 'lastname' => $lastname, 'address' => $address, 'provinsi'=>$provinsi, 'kota'=>$kota, 'postal'=>$postal);
    $dataFILES = array('type'=>$pptype, 'tmp'=>$pptmp, 'size'=>$ppsize, 'ext'=>$extfile, 'err'=>$pperr);
    $editUser = $dashboard->editProfile($dataPOST, $dataFILES);
    
    flash::setFlash($editUser['pesan'], $editUser['tipe']);
    header('Location:' . BASEURL .'Dashboard/profile.php');
}
if (isset($_GET['loadcity'])) {
    $id_provinsi = htmlspecialchars($_POST['id_provinsi']);
    $loadcity = $dashboard->loadkota($id_provinsi);
    return $loadcity;
}
if (isset($_GET['orderuser'])) {
    $username = htmlspecialchars($_POST['sending']);
    $getOrderuser = $dashboard->orderusers($username);
    return $getOrderuser;
}
if (isset($_GET['orderdetail'])) {
    $orderid = htmlspecialchars($_POST['orderid']);
    $getOrderuser = $dashboard->GetDetailsOrders($orderid);
    return $getOrderuser;
}
if (isset($_GET['SentRate'])) {
    $id = htmlspecialchars($_POST['id']);
    $fullname = htmlspecialchars($_POST['fullname']);
    $comment = htmlspecialchars($_POST['comment']);
    $rating = htmlspecialchars($_POST['rating_data']);

    $data = array('id'=>$id, 'fullname'=>$fullname, 'comment'=>$comment, 'rating'=>$rating);
    $rate = $dashboard->SentRate($data);
    return $rate;
}