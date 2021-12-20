<?php

class aprioriModel 
{
    private $db;
    Public function __construct()
    {
        $this->db = new Database();
    }
    Public function data()
    {
        $this->db->query("SELECT order_id as id, barang as item FROM belanjaan");
        return $this->db->resultSet(); 
    }

    Public function hitungsupportitem1($param)
    {
        $this->db->query("SELECT COUNT(*) as total, SUM(category='Perlengkapan') as perlengkapan, SUM(category='Pakaian gunung') as pakaian, SUM(category='Penerangan') as penerangan, SUM(category='Sepatu') as sepatu, SUM(category='Tas') as tas, SUM(category='Tenda') as tenda FROM belanjaan");
        // $this->db->bind('category', $param['']);
        return $this->db->single();
    }
    Public function TRUNCATEfrequensi()
    {
        $this->db->query("TRUNCATE frekuensi");
        return $this->db->execute();
    }
    Public function TRUNCATErules()
    {
        $this->db->query("TRUNCATE kombinasi");
        return $this->db->execute();
    }
    Public function inputfrekuensi($data) {
        $this->db->query("INSERT INTO frekuensi(item, support, keterangan) VALUES(:item, :support, :ket)");
        $this->db->bind('item', $data['item']);
        $this->db->bind('support', $data['support']);
        $this->db->bind('ket', $data['keterangan']);
        $this->db->execute();
        return $this->db->countRow();
    }
    Public function inputrules($data) {
        $this->db->query("INSERT INTO kombinasi(item, confidence, keterangan) VALUES(:item, :support, :ket)");
        $this->db->bind('item', $data['kombinasi']);
        $this->db->bind('support', $data['confidence']);
        $this->db->bind('ket', $data['keterangan']);
        $this->db->execute();
        return $this->db->countRow();
    }
    Public function carisemuatransaksi()
    {
        $this->db->query("SELECT order_id, GROUP_CONCAT(category) as barang FROM reportbarangkeluar GROUP BY order_id");
        return $this->db->resultSet();
    }
    Public function TRUNCATEbelanjaan()
    {
        $this->db->query("TRUNCATE belanjaan");
        return $this->db->execute();
    }
}
