<?php

class Order extends Controller
{
    Public function TRUNCATEmining()
    {
      $this->model('aprioriModel')->TRUNCATErules();
      $this->model('aprioriModel')->TRUNCATEfrequensi();
    }
    Public function hasilmining(){
        $itemset = $this->model('OrderModel')->tampilfrequensi();
        $kombinasi = $this->model('OrderModel')->tampilkombinasi();
        $aturan = $this->model('OrderModel')->tampilaturan(); 
        if ($itemset != '' AND $kombinasi != '') { 
           $return = array('itemset'=>$itemset, 'kombinasi'=>$kombinasi, 'aturan'=>$aturan);
        }else {
            $return = 0;
        }
        return $return;
    }
    Public function jumlahpesanan()
    {
        $report = $this->model('OrderModel')->jumlahpesanan();
        if ($report != '') { 
            $harga = array($report['total_order'], $report['total']);
            // for ($i=0; $i < count($report); $i++) { 
            //     $harga[$i] = array($report[$i]['total_order'], $report[$i]['total']);
            // }
        }else {
            $harga=0; 
        }
        return $harga; 
    } 
    Public function showOrder()
    {
        $report = $this->model('OrderModel')->showOrder();
        for ($i=0; $i < count($report); $i++) { 
            $cekstatus[$i] = $this->model('OrderModel')->cekstatus($report[$i]['order_id']);
            $data[$i] = array('order_id'=>$report[$i]['order_id'], 'penerima'=>$report[$i]['penerima'], 'alamat'=>$report[$i]['alamat'], 'provinsi'=>$report[$i]['provinsi'], 'city'=>$report[$i]['city'], 'postal'=>$report[$i]['postal'], 'phone'=>$report[$i]['phone'], 'jasa_pengiriman'=>$report[$i]['jasa_pengiriman'], 'resi'=>$report[$i]['resi'], 'total_harga'=>$report[$i]['total_harga'], 'payment'=>$report[$i]['payment'], 'status'=>$cekstatus[$i]['status']);
        }
        return $data;
    }
    Public function detailpesanan($orderid)
    {
        $orderid = base64_decode($orderid);
        $pesanan = $this->model('OrderModel')->detailpesanan($orderid);
        return json_encode($pesanan);
    }
    Public function tampilupdate($orderid)
    {
        $orderid = base64_decode($orderid);
        $pesanan = $this->model('OrderModel')->tampilupdate($orderid);
        if (is_null($pesanan['resi'])) {
           $resi = 0;
        }else{
            $resi = $pesanan['resi']; 
        }
        $data = array('order_id' => $pesanan['order_id'], 'penerima'=>$pesanan['penerima'], 'alamat'=>$pesanan['alamat'], 'provinsi'=>$pesanan['provinsi'], 'city'=>$pesanan['city'], 'postal'=>$pesanan['postal'], 'phone'=>$pesanan['phone'], 'jasa_pengiriman'=>$pesanan['jasa_pengiriman'],'resi'=>$resi);
        return json_encode($data);
    }
    Public function updatepesanan($orderid, $status, $resi)
    {
        $data = array('orderid'=>$orderid, 'status'=>$status, 'resi'=>$resi);
        if ($data['status'] == 'Sampai tujuan') { 
           $cekpesanan = $this->model('OrderModel')->cekpesanan($data['orderid']);
           for ($i=0; $i < count($cekpesanan); $i++) { 
               $updatebarang[$i] = $this->model('OrderModel')->updatebarangkeluar($cekpesanan[$i]['order_id'],$cekpesanan[$i]['product_id'], $cekpesanan[$i]['qty'], $cekpesanan[$i]['category']);
            }
        }
        $pesanan = $this->model('OrderModel')->updatepesanan($data['orderid'], $data['resi']);
        $err = $this->model('OrderModel')->updatestatus($data['orderid'], $data['status']);
        return $err;
    }
    Public function caritransaksi($tanggal_mulai, $tanggal_akhir)
    {
        $this->model('OrderModel')->truncatebelanjaan();
        $tgl_mulai = date("Y-m-d", strtotime($tanggal_mulai));
        $tgl_akhir = date("Y-m-d", strtotime($tanggal_akhir));
        $param = array('mulai'=>$tgl_mulai, 'akhir'=>$tgl_akhir);
        $databarang = $this->model('OrderModel')->caritransaksi($param);
        if ($databarang != '') {
            for ($i=0; $i < count($databarang); $i++) {
                $tobulus[$i] = $this->model('OrderModel')->belanjaan($databarang[$i]);
            }
            $belanjaan = $this->model('OrderModel')->tampilbelanjaan();
            return json_encode($belanjaan);
        }
    }

}
 