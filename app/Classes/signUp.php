<?php
    spl_autoload_register(function ($class_name) {
        include 'Classes/' . $class_name . '.php';
    });

    class signUp {
        private $conn;

        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function insertUser($username, $password) {
            try {
                // Sanitize is deprecated en dit doet hetzelfde
                $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
                $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

                $sql = "INSERT INTO user_login (username, password) VALUES (:username, :password)";
                $stmt = $this->conn->prepare($sql);

                //----------- Hash the password -----------\\ 
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                //-----------------------------------------\\

                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->execute();
                return "New record created successfully";
            } catch (PDOException $e) {
                throw new Exception("Insert failed: " . $e->getMessage());
            }
        }
    }
?>