<?php

class dashboardModel
{
    Public function __construct() 
    {
        $this->db = new Database;
    } 

    Public function getProfile($user)
    {
        $this->db->query("SELECT * FROM user_detail WHERE username=:user");
        $this->db->bind('user', $user);
        return $this->db->single(); 
    }
    Public function uploadGambar($data)
    { 
        $this->db->query("UPDATE user_detail SET img=:filename WHERE username=:username");
        $this->db->bind('filename', $data['filename']);
        $this->db->bind('username', $data['username']);

        $this->db->execute();   
    }
    Public function callimg($data)
    {
        $this->db->query("SELECT img FROM user_detail WHERE username=:username");
        $this->db->bind('username', $data);
        return $this->db->single();
    }
    Public function getUsers($data)
    {
        $this->db->query("SELECT * FROM user_detail WHERE username=:username");
        $this->db->bind('username', $data);
        return $this->db->single();

    }
    Public function UpdateUsers($data)
    {
        $this->db->query("UPDATE user_detail SET firstname=:firstname, lastname=:lastname, alamat=:alamat, provinsi=:provinsi, city=:city, postal=:postal WHERE username=:username");
        $this->db->bind('firstname', $data['firstname']);
        $this->db->bind('lastname', $data['lastname']);
        $this->db->bind('alamat', $data['address']);
        $this->db->bind('provinsi', $data['provinsi']);
        $this->db->bind('city', $data['kota']);
        $this->db->bind('postal', $data['postal']);
        $this->db->bind('username', $data['username']);

        $this->db->execute();  
    }
    Public function getOrderusers($username)
    {
        $this->db->query("SELECT usert.order_id, usert.total_harga, usert.payment, pesanan.product_id, pesanan.ukuran, pesanan.warna, pesanan.qty, pesanan.status, product.judul, product.gambar, product.harga FROM usert INNER JOIN pesanan ON usert.order_id=pesanan.order_id INNER JOIN product ON pesanan.product_id=product.id WHERE usert.username=:username");
        $this->db->bind('username', $username);
        return $this->db->resultSet();
    }
    Public function getOrders($data)
    {
        $this->db->query('SELECT order_id, penerima, alamat, provinsi, city, postal, phone, jasa_pengiriman, resi, total_harga, payment FROM userT WHERE order_id=:id');
        $this->db->bind('id', $data);
        return $this->db->single();
    }
    Public function InputRate($data)
    {
        $this->db->query("INSERT INTO rating_product (id, nama, rating, comment, tgl, username) VALUES(:id, :nama, :rating, :comment, :tgl, :username)");
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['fullname']);
        $this->db->bind('rating', $data['rating']);
        $this->db->bind('comment', $data['comment']);
        $this->db->bind('tgl', $data['date']);
        $this->db->bind('username', $data['username']);

        $this->db->execute();

        return $this->db->countRow();
    }
}
