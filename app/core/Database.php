<?php
Class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $DB = DB_CIPS;

    private $dbh;
    private $stmt;

    Public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->DB;

        $option = [
            PDO::ATTR_PERSISTENT=>true,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        ];
        try {
           $this->dbh = new PDO ($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    Public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    Public function bind($param, $value, $type=null){
        if(is_null($type)){
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    Public function execute()
    {
        $this->stmt->execute();
    }
    Public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    Public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    Public function countRow()
    {
        return $this->stmt->rowCount();
    }

}