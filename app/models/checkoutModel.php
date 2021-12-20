<?php

class checkoutModel
{   
    private $db;
    Public function __construct()
    {
        $this->db = new Database();
    }
    Public function inputcheckouttmp($data)
    {
        $this->db->query("INSERT INTO tmp_checkout(product_id, ukuran, warna, qty, username) VALUES(:id, :ukuran, :warna, :qty, :username)");
        $this->db->bind('id', $data['id']);
        $this->db->bind('ukuran', $data['ukuran']);
        $this->db->bind('warna', $data['warna']);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('username', $data['username']);
        $this->db->execute();
        return $this->db->countRow();
    }
     Public function GetcheckoutUser($data) 
     {
         $this->db->query("SELECT * FROM tmp_checkout WHERE username=:username");
         $this->db->bind('username', $data);
         return $this->db->resultSet();
     }
     Public function CountcheckoutUser($data) 
     {
         $this->db->query("SELECT count(*) AS jumlah FROM tmp_checkout WHERE username=:username");
         $this->db->bind('username', $data);
         return $this->db->single();
     }
     Public function getDetails($data)
     {
        $this->db->query("SELECT judul, gambar, harga, category, berat FROM product WHERE id=:username");
        $this->db->bind('username', $data);
        return $this->db->single();
     }
     Public function hapusTMP($data)
     {
        $this->db->query("DELETE FROM tmp_checkout WHERE product_id=:username");
        $this->db->bind('username', $data);
        $this->db->execute();
        return 1; 
     }
     Public function hapusTMPsetelahpesan($productid, $username)
     {
        $this->db->query("DELETE FROM tmp_checkout WHERE product_id=:product AND username=:username");
        $this->db->bind('username', $username);
        $this->db->bind('product', $productid);
        $this->db->execute();
        return 1;
     }
     Public function cariCityUser($data)
     {
         $this->db->query("SELECT city FROM user_detail WHERE username=:user");
         $this->db->bind('user', $data);
         return $this->db->single();
     }
     Public function InputDataCheckout($data)
     {
         $this->db->query("INSERT INTO usert(order_id, penerima, alamat, provinsi, city, postal, phone, jasa_pengiriman, total_harga, payment, valid, username) VALUES(:orderid, :penerima, :alamat, :provinsi, :city, :postal, :phone, :jasa, :total, :bank, :valid, :username)");
         $this->db->bind('orderid', $data['order_id']);
         $this->db->bind('penerima', $data['penerima']);
         $this->db->bind('alamat', $data['address']);
         $this->db->bind('provinsi', $data['provinsi']);
         $this->db->bind('city', $data['kota']);
         $this->db->bind('postal', $data['postal']);
         $this->db->bind('phone', $data['phone']);
         $this->db->bind('jasa', $data['pengiriman']);
         $this->db->bind('total', $data['total']);
         if ($data['payment'] != "COD") {
            $this->db->bind('bank', 'NULL');
         }else {
            $this->db->bind('bank', $data['payment']);
         }
         $this->db->bind('valid', '0');
         $this->db->bind('username', $data['username']);
         $this->db->execute();
         return $this->db->countRow();

     }
     Public function inputpesanan($data)
     {
         $this->db->query("INSERT INTO pesanan(order_id, product_id, ukuran, warna, qty, status, username) VALUES(:order, :product, :ukuran, :warna, :qty, :status, :username)");
         $this->db->bind('order', $data['order_id']);
         $this->db->bind('product', $data['productid']);
         $this->db->bind('ukuran', $data['ukuran']);
         $this->db->bind('warna', $data['warna']);
         $this->db->bind('qty', $data['qty']);
         $this->db->bind('status', 'Pending');
         $this->db->bind('username', $data['username']);
         $this->db->execute();
         return $this->db->countRow();
     }
     Public function rekomendasi($data) 
     {
         $this->db->query("SELECT id, judul, gambar, harga, category FROM product WHERE category=:category LIMIT 1");
         $this->db->bind('category', $data);
         return $this->db->single(); 
     }
     
}
