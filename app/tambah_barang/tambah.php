<?php
require_once dirname(dirname(__FILE__)) .'/init.php';
session_start();
$product = new product();
if (isset($_GET['tambah'])) {
    $nama = htmlspecialchars($_POST['judul']);
    $hargajual = htmlspecialchars($_POST['hargajual']);
    $hargabeli = htmlspecialchars($_POST['hargabeli']);
    $kategori = htmlspecialchars($_POST['kategori']);
    if ($_POST['color'] != '') {
        $warna = htmlspecialchars($_POST['color']);
    }else {
        $warna = 'NULL';
    }
    if ($_POST['ukuran'] != '') {
        $ukuran = htmlspecialchars($_POST['ukuran']);
    }else {
        $ukuran = 'NULL';

    }
    $berat = htmlspecialchars($_POST['berat']);
    $desc = htmlspecialchars($_POST['deskripsi']);
    $stock = htmlspecialchars($_POST['stock']);
    $pptype = $_FILES['img']['type'];
    $pptmp = $_FILES['img']['tmp_name'];
    $ppsize = $_FILES['img']['size'];
    $pperr = $_FILES['img']['error'];
    $extfile = strtolower(pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION));
    $dataFILES = array('type'=>$pptype, 'tmp'=>$pptmp, 'size'=>$ppsize, 'ext'=>$extfile, 'err'=>$pperr);
    $dataPOST = array('judul'=>$nama, 'hargajual'=>$hargajual, 'hargabeli'=>$hargabeli, 'kategori'=>$kategori, 'warna'=>$warna, 'ukuran'=>$ukuran, 'desc'=>$desc, 'berat'=>$berat, 'stock'=>$stock);

    $tambah = $product->tambahproduct($dataPOST, $dataFILES);
    flash::setFlash($tambah['pesan'], $tambah['tipe']);
    header('Location: '. BASEURL .'admin/Dashboard/admin/product.php');
}
if (isset($_GET['showproduct'])) {
    $list = $product->list();
    return print_r($list);
}
if (isset($_GET['update'])) { 
    // var_dump($_POST);
    // die;
    $id = htmlspecialchars($_POST['productid']);
    $nama = htmlspecialchars($_POST['judul']);
    $harga = htmlspecialchars($_POST['harga']);
    // $kategori = htmlspecialchars($_POST['kategori']);
    if ($_POST['color'] != '') {
        $warna = htmlspecialchars($_POST['color']);
    }else {
        $warna = 'NULL';
    }
    if ($_POST['ukuran'] != '') {
        $ukuran = htmlspecialchars($_POST['ukuran']);
    }else {
        $ukuran = 'NULL';

    }
    $berat = htmlspecialchars($_POST['berat']);
    $desc = htmlspecialchars($_POST['deskripsi']);
    $pptype = $_FILES['img']['type'];
    $pptmp = $_FILES['img']['tmp_name'];
    $ppsize = $_FILES['img']['size'];
    $pperr = $_FILES['img']['error'];
    $extfile = strtolower(pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION));
    $dataFILES = array('type'=>$pptype, 'tmp'=>$pptmp, 'size'=>$ppsize, 'ext'=>$extfile, 'err'=>$pperr);
    $dataPOST = array('judul'=>$nama, 'harga'=>$harga, 'warna'=>$warna, 'ukuran'=>$ukuran, 'desc'=>$desc, 'berat'=>$berat, 'id'=>$id);
    
    // var_dump($dataPOST);
    // var_dump($dataFILES);
    // die;
    $tambah = $product->updateproduct($dataPOST, $dataFILES);
    flash::setFlash($tambah['pesan'], $tambah['tipe']);
    header('Location: '. BASEURL .'admin/Dashboard/admin/update_product.php');
}
if (isset($_GET['tampilupdate'])) {
    $id = htmlspecialchars($_POST['id']);
    // $id = base64_decode($id); 
    $list = $product->listdetail($id);
    return print_r($list); 
}
if (isset($_GET['hapusproduct'])) {
    $id = htmlspecialchars($_POST['id']);
    $hapus = $product->hapusproduct($id);
    return print_r($hapus);
}
// if (isset($_GET['caristock'])) {
//    $id = htmlspecialchars($_POST['id']);
//    $cari = $product->caristock($id);
//    return print_r($cari);
// }
if (isset($_GET['updatestock'])) {
    $id = htmlspecialchars($_POST['id']);
    $harga = htmlspecialchars($_POST['harga']);
    $stock = htmlspecialchars($_POST['stock']);
    $update = $product->updatestock($id, $stock, $harga);
    flash::setFlash($update['pesan'], $update['tipe']);
    header('Location: '. BASEURL .'admin/Dashboard/admin/update_stock.php');
}