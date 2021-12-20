<?php
class OrderModel
{

    Private $db;

    Public function __construct()
    {
        $this->db = new Database(); 
    }
 
    Public function jumlahpesanan()
    {
        $this->db->query("SELECT COUNT(usert.order_id) as total_order, SUM(usert.total_harga) as total FROM usert INNER JOIN pesanan ON usert.order_id=pesanan.order_id WHERE pesanan.status=:status");
        $this->db->bind('status', 'Sampai tujuan');
        return $this->db->single();
    }
    Public function showOrder()
    {
        $this->db->query("SELECT * FROM usert");
        return $this->db->resultSet();
    }
    Public function tampilfrequensi()
    {
        $this->db->query("SELECT * FROM frekuensi");
        return $this->db->resultSet();
    }
    Public function tampilkombinasi()
    {
        $this->db->query("SELECT * FROM kombinasi");
        return $this->db->resultSet();
    }
    Public function tampilaturan()
    {
        $this->db->query("SELECT item FROM kombinasi WHERE keterangan=:ket");
        $this->db->bind('ket', 'Lolos');
        return $this->db->resultSet();
    }
    Public Function cekstatus($data)
    {
        $this->db->query("SELECT status FROM pesanan WHERE order_id=:orderid");
        $this->db->bind('orderid', $data);
        // $this->db->bind('status', 'Sampai tujuan');
        // $this->db->bind('getstatus', 'Di batalkan');
        return $this->db->single();
    }
    Public function detailpesanan($orderid)
    {
        $this->db->query("SELECT pesanan.ukuran, pesanan.warna, pesanan.qty, pesanan.status, product.judul, product.harga, product.gambar FROM pesanan INNER JOIN product ON pesanan.product_id=product.id WHERE pesanan.order_id=:orderid");
        $this->db->bind('orderid', $orderid);
        return $this->db->resultSet();
    }
    Public function tampilupdate($orderid)
    {
        $this->db->query("SELECT * FROM usert WHERE order_id=:orderid");
        $this->db->bind('orderid', $orderid);
        return $this->db->single();
    }
    Public function updatepesanan($orderid, $resi)
    {
        $this->db->query("UPDATE usert SET resi=:resi WHERE order_id=:orderid");
        $this->db->bind('resi', $resi);
        $this->db->bind('orderid', $orderid);
        $this->db->execute();
        return 0;
    }
    Public Function updatestatus($orderid, $status)
    {
        $this->db->query("UPDATE pesanan SET status=:status WHERE order_id=:orderid");
        $this->db->bind('status', $status);
        $this->db->bind('orderid', $orderid);
        $this->db->execute();
        return 0;
    }
    Public Function cekpesanan($data)
    {
        $this->db->query("SELECT pesanan.order_id, pesanan.product_id, pesanan.qty, product.category FROM pesanan INNER JOIN product ON pesanan.product_id=product.id WHERE pesanan.order_id=:orderid");
        $this->db->bind('orderid', $data);
        return $this->db->resultSet();
    }
    Public function carikategori($data)
    {
        $this->db->query("SELECT category FROM product WHERE id=:id");
        $this->db->bind('id', $data);
        return $this->db->Single();
    }
    Public function updatebarangkeluar($orderid, $data, $qty, $category)
    {
        $this->db->query("SELECT jumlah_stock, judul, harga FROM product WHERE id=:id ");
        $this->db->bind('id', $data);
        $stockawal = $this->db->single();
        $update = $this->updatebarang($stockawal['jumlah_stock'], $data, $qty);
        $inputbarangkeluar = $this->barangkeluar($orderid, $stockawal['judul'], $stockawal['harga'], $qty, $category);
        return 0;

    }
    Public function updatebarang($stock, $data, $qty)
    {
        $this->db->query("UPDATE product SET jumlah_stock=:jumlah WHERE id=:id ");
        $jumlah = intval($stock) - intval($qty);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('id', $data);
        $this->db->execute();
        return 0;
    }
    Public function barangkeluar($order, $judul, $harga, $qty, $category)
    {
        $this->db->query("INSERT INTO reportbarangkeluar(order_id, nama_barang, category, harga_jual, qty, tgl) VALUES(:order, :judul, :category, :harga, :qty, :tgl)");
        $this->db->bind('order', $order);
        $this->db->bind('judul', $judul);
        $this->db->bind('category', $category);
        $this->db->bind('harga', $harga);
        $this->db->bind('qty', $qty);
        $this->db->bind('tgl', date('Y-m-d'));
        $this->db->execute();
        return $this->db->countRow();
    }
    Public function caritransaksi($param)
    {
        $this->db->query("SELECT order_id, GROUP_CONCAT(category) as barang FROM reportbarangkeluar WHERE tgl BETWEEN :mulai AND :akhir GROUP BY order_id");
        $this->db->bind('mulai', $param['mulai']);
        $this->db->bind('akhir', $param['akhir']);
        return $this->db->resultSet();
    }
    Public function truncatebelanjaan()
    {
        $this->db->query("TRUNCATE belanjaan");
        return $this->db->execute();
    }
    Public function belanjaan($data)
    {
        $this->db->query("INSERT INTO belanjaan(order_id, barang) VALUES(:order, :category)");
        $this->db->bind('order', $data['order_id']);
        $this->db->bind('category', $data['barang']);
        $this->db->execute();
        return $this->db->countRow();
    } 
    Public function tampilbelanjaan()
    {
        $this->db->query("SELECT * FROM belanjaan");
        return $this->db->resultSet();
    }
}
