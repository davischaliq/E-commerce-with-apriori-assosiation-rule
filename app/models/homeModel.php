<?php
Class homeModel 
{
    private $db;
    
    Public function __construct() 
    {
        $this->db = new Database;
    } 

    Public function tampilProduct() 
    {
        $this->db->query("SELECT id, judul, gambar, harga FROM product LIMIT 4");
        return $this->db->resultSet();
    }
}