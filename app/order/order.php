<?php
require_once dirname(dirname(__FILE__)) .'/init.php';
session_start();
$order = new Order();
if (isset($_GET['detailpesanan'])) {
    $orderid = htmlspecialchars($_POST['orderid']);
    $pesanan = $order->detailpesanan($orderid);
    return print_r($pesanan);
}
if (isset($_GET['tampilupdate'])) {
    $orderid = htmlspecialchars($_POST['orderid']);
    $pesanan = $order->tampilupdate($orderid);
    return print_r($pesanan);
}
if (isset($_GET['updateOrder'])) {
    $orderid = htmlspecialchars($_POST['orderid']);
    $status = htmlspecialchars($_POST['status']);
    $resi = htmlspecialchars($_POST['resi']);
    $pesanan = $order->updatepesanan($orderid, $status, $resi);
    if ($pesanan == 0) {
        flash::setFlash('Data anda berhasil di update', 'success');
        return print_r(0);
    }else {
        flash::setFlash('Data anda gagal di update', 'danger');
        return print_r(1);
    }
}
if (isset($_GET['caritransaksi'])) {
    $order->TRUNCATEmining();
    $tanggal_mulai = htmlspecialchars($_POST['tanggal_mulai']);
    $tanggal_akhir = htmlspecialchars($_POST['tanggal_akhir']);
    $cari = $order->caritransaksi($tanggal_mulai, $tanggal_akhir);
    return print_r($cari);
}