<?php
 require_once dirname(dirname(__FILE__)).'/app/init.php';
 session_start();
 $checkout = new Checkout();
if (isset($_GET['pesanan'])) {
    $username = htmlspecialchars($_SESSION['user']);
    $id = htmlspecialchars($_POST['pesanan']);
    $qty = htmlspecialchars($_POST['qty']);
    $ukuran = htmlspecialchars($_POST['ukuran']);
    $warna = htmlspecialchars($_POST['color']);
    $datapost = array('id'=>base64_decode($id), 'warna'=>$warna, 'ukuran'=>$ukuran, 'qty'=>$qty, 'username'=>$username);
    $err = $checkout->tmpcheckout($datapost);

    return print_r($err);
   
}
if (isset($_GET['loadcity'])) {
    $id_province = htmlspecialchars($_POST['id_provinsi']);
    $city = $checkout->loadcity($id_province);
    return $city;
}
if (isset($_GET['ongkir'])) {
    $city = htmlspecialchars($_POST['id_city']);
    $berat = htmlspecialchars($_POST['weight']);
    $ongkir = $checkout->loadOngkir($city, $berat);
    return $ongkir;
}
if (isset($_GET['hapus'])) {
    $id = htmlspecialchars($_POST['id']);
    $hapus = $checkout->hapustmp($id);
    return print_r($hapus);
}
if (isset($_GET['start'])) {
    $username = htmlspecialchars($_SESSION['user']);
    $penerima = htmlspecialchars($_POST['penerima']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $provinsi = htmlspecialchars($_POST['provinsi']);
    $kota = htmlspecialchars($_POST['kota']);
    $postal = htmlspecialchars($_POST['postal']);
    $pengiriman = htmlspecialchars($_POST['pengiriman']);
    $totalharga = htmlspecialchars($_POST['total']);
    $payment = htmlspecialchars($_POST['payment']);
    $order_id = rand(); 
    $data = array('order_id'=>$order_id,'penerima'=> $penerima, 'address'=> $address, 'phone'=> $phone, 'provinsi'=> $provinsi, 'kota'=> $kota, 'postal'=> $postal, 'pengiriman'=> $pengiriman, 'total'=> $totalharga, 'payment'=>$payment, 'username'=> $username);
    $err = $checkout->inputDatacheckout($data);
    if ($err == 'COD') {
        return print_r($err = 1);   
    }
}