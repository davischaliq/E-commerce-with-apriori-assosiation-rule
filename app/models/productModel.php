<?php

class productModel
{
    private $db;
    
    Public function __construct() 
    {
        $this->db = new Database;
    } 
    Public function AllProduct() 
    {
        $this->db->query("SELECT id, judul, gambar, harga FROM product");
        return $this->db->resultSet();
    }

    Public function tampilProduct($data) 
    {
        $this->db->query("SELECT id, judul, gambar, harga FROM product WHERE category=:category");
        $this->db->bind('category', $data);
        return $this->db->resultSet();
    }

    Public function getCari($cari)
    {
        $this->db->query("SELECT id, judul, gambar, harga FROM product WHERE judul LIKE :cari OR category LIKE :cari");
        $this->db->bind('cari', $cari);
        return $this->db->resultSet();
    }

    Public function Detailproduct($id) 
    {
        $this->db->query("SELECT * FROM product WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    Public function tambahproduct($data)
    {
        $this->db->query("INSERT INTO product(judul, harga, deskripsi, category, warna, ukuran, berat, gambar, jumlah_stock) VALUES(:judul, :harga, :deskripsi, :category, :warna, :ukuran, :berat, :gambar, :jumlah)");
        // $this->db->bind('id', '');
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('category', $data['kategori']);
        $this->db->bind('deskripsi', $data['desc']);
        $this->db->bind('warna', $data['warna']);
        $this->db->bind('ukuran', $data['ukuran']);
        $this->db->bind('berat', $data['berat']);
        $this->db->bind('gambar', $data['filename']);
        $this->db->bind('jumlah', $data['stock']);
        $this->db->execute();
        return $this->db->countRow();
    }
    Public function list()
    {
        $this->db->query("SELECT * FROM product");
        return $this->db->resultSet();
    }
    Public function listbarangmasuk()
    {
        $this->db->query("SELECT * FROM reportbarangmasuk");
        return $this->db->resultSet();
    }
    Public function listbarangkeluar()
    {
        $this->db->query("SELECT * FROM reportbarangkeluar");
        return $this->db->resultSet();
    }
    Public function listdetail($data)
    {
        $this->db->query("SELECT * FROM product WHERE id=:id");
        $this->db->bind('id', $data);
        return $this->db->single();
    }
    Public function review($data)
    {
        $this->db->query("SELECT * FROM rating_product WHERE id=:id");
        $this->db->bind('id', $data);
        return $this->db->ResultSet();
    }
    Public function callbintang($data)
    {
        $this->db->query("SELECT SUM(rating) as rate FROM rating_product WHERE id=:id");
        $this->db->bind('id', $data);
        return $this->db->single();
    }
    Public function updateproduct($data)
    {
        $this->db->query("UPDATE product SET judul=:judul, harga=:harga, deskripsi=:desc, warna=:warna, ukuran=:ukuran, berat=:berat, gambar=:gambar WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('desc', $data['desc']);
        // $this->db->bind('kateg', $data['kategori']);
        $this->db->bind('warna', $data['warna']);
        $this->db->bind('ukuran', $data['ukuran']);
        $this->db->bind('berat', $data['berat']);
        $this->db->bind('gambar', $data['filename']);
        $this->db->execute();
        return 0;
    }
    Public function carikategori($data)
    {
        $this->db->query("SELECT category FROM product WHERE id=:id");
        $this->db->bind('id', $data);
        return $this->db->single();
    }
    Public function callimg($data)
    {
        $this->db->query("SELECT gambar FROM product WHERE id=:id");
        $this->db->bind('id', $data);
        return $this->db->single();
    }
    Public function callimguser($data)
    {
        $this->db->query("SELECT img FROM user_detail WHERE username=:id");
        $this->db->bind('id', $data);
        return $this->db->single();
    }
    Public function hapusproduct($data)
    {
        $this->db->query("DELETE FROM product WHERE id=:id");
        $this->db->bind('id', $data);
        $this->db->execute();
        return 0;
    }
    Public function caristock($data)
    {
        $this->db->query("SELECT jumlah_stock, judul FROM product WHERE id=:id");
        $this->db->bind('id', $data);
        return $this->db->single();
    }
    Public function updatestock($id, $stock)
    {
        $this->db->query("UPDATE product SET jumlah_stock=:jumlah WHERE id=:id");
        $this->db->bind('jumlah', $stock);
        $this->db->bind('id', $id);
        $this->db->execute();
        return 0;
    }
    Public function inputbarangmasuk($data)
    {
        $this->db->query("INSERT INTO reportbarangmasuk(nama_barang, harga_beli, stock_beli, tgl) VALUES(:nama, :harga, :stock, :tgl)");
        $this->db->bind('nama', $data['judul']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stock', $data['stock']);
        $this->db->bind('tgl', $data['tgl']);
        $this->db->execute();
        return $this->db->countRow();
    }
}
