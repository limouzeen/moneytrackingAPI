<?php
class ConnectDB{

    //ตัวแปรหลักใช้ติดต่อ database
    public $connDB;

    //ตัวแปรที่ใช้เก็บข้อมูลของ database ที่จะทำงานด้วย
    private $host = "localhost"; //หรือ 127.0.0.1 หรือ IP Address หรือ Domain name หรือ ชื่อเครื่อง server
    private $username = "root";
    private $password = "";
    private $dbname = "money_tracking_db";

    //function ติดต่อ DB
    public function getConnectionDB(){
        
        try{
            $this->connDB = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username,$this->password);
        $this->connDB->exec("set names utf8");
        }catch(PDOException $e){
            echo "Connection error: " . $e->getMessage();
    
    }
    return $this->connDB;
    }
}
?>