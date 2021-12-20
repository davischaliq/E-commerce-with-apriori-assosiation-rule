<?php

Class authModel 
{
    private $db;
    
    Public function __construct() 
    {
        $this->db = new Database;
    }
    Public function Login($data) 
    {
        $this->db->query("SELECT COUNT(*) AS founduser FROM users WHERE username=:username AND password=:password");
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', sha1($data['password']));
        // $this->db->bind('valid', 1);
        return $this->db->single();
    }
    Public function Loginadmin($data) 
    {
        $this->db->query("SELECT COUNT(*) AS founduser FROM admin WHERE username=:username AND password=:password");
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', sha1($data['password']));
        // $this->db->bind('valid', 1);
        return $this->db->single();
    }
    Public function Inputregist($data){
        $this->db->query("INSERT INTO users (username, password) VALUES(:username, :password)");
        $this->db->bind('password', sha1($data['password']));
        $this->db->bind('username', $data['username']);
        // $this->db->bind('status', 0);
        $this->db->execute();
        return $this->db->countRow();
    }
    Public function InputDetailuser($data)
    {
        $this->db->query("INSERT INTO user_detail (firstname, lastname, email, alamat, provinsi, city, postal, country, img, username) VALUES(:firstname, :lastname, :email, :alamat, :provinsi, :city, :postal, :country, :img, :username)");
        $this->db->bind('username', $data['username']);
        $this->db->bind('firstname', $data['firstname']);
        $this->db->bind('lastname', $data['lastname']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('alamat', 'NULL');
        $this->db->bind('provinsi', 0);
        $this->db->bind('city', 0);
        $this->db->bind('postal', 0);
        $this->db->bind('country', 'indonesia');
        $this->db->bind('img', 'NULL');
        $this->db->execute();
        return $this->db->countRow();
    }
    Public function registered($data) 
    {
        $this->db->query("SELECT COUNT(*) AS found FROM users INNER JOIN user_detail ON users.username=user_detail.username WHERE users.username=:username AND user_detail.email=:email");
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        return $this->db->single();
    }
}