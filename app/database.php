<?php


class Database {
    private $servername = "mysql";
    private $username = "root";
    private $password = "root";
    private $dbname = "database";
    private $conn;

    //in een class, heb je vaak bovenin een __construct function
    //deze functie hoef je niet zelf op te roepen
    //deze wordt namelijk direct uitgevoerd als je een object aanmaakt
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>