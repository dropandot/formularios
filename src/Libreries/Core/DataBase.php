<?php
class DataBase
{
    private $conect;

    public function __construct()
    {
        try {
            $this->conect = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . '', DB_USER, DB_PASSWORD);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conect->exec("SET NAMES 'utf8'");
            return $this->conect;
        } catch (PDOException $e) {
            die('Error:' . $e->getMessage());
        } 
    }
    public function conect()
    {
        return $this->conect;
    }
}