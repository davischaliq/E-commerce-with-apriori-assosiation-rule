<?php
session_start();
require_once '../../../app/lib/FPDF/fpdf.php';
require_once '../../../app/init.php';


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../../../assets/img/logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Line break
    $this->Ln(20);
}
}

// Instanciation of inherited class
if (isset($_GET['order_id']) && $_GET['order_id'] != '') {
    $pdf = new PDF('P', 'mm', array(100,150));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',11);
    $order_id = htmlspecialchars($_GET['order_id']);
    $order = getOrderspecifik($order_id);
    $pdf->Cell(0,10,'Order Id : '.$order['orderid'],0,1);
    $pdf->Cell(0,10,'Jenis layanan : '.$order['servis'],0,1);
    $pdf->Cell(0,10,'Harga jasa : '.$order['harga'],0,1);
    $pdf->Cell(0,10,'Nama pelanggan : '.$order['nama'],0,1);
    $pdf->Cell(0,10,'No Telp: '.$order['phone'],0,1);
    $pdf->Cell(0,10,'Tanggal pemesanan : '.$order['tgl'],0,1);
    $pdf->Cell(0,10,'Catatan : '.$order['note'],0,1);
    $pdf->Output();
}else {
    header('Location :' . BASEURL . 'Dashboard/admin/order.php');
}
?>