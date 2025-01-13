<?php
class database{
    private $servername="localhost";
    private $dbname="youdemy";
    private $password="";
    private $username="root";
    private $pdo;
    
    public function getConn($pdo){
        try{
            $dsn = "mysql:host=$this->servername;dbname=$this->dbname";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            echo 'good';
        }catch(PDOException $e){
            echo "error".$e;
        }
        return $this->pdo;
    }
}
?>