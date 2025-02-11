<?php
    spl_autoload_register(function ($class_name) {
        include 'Classes/' . $class_name . '.php';
    });

    class logIn{
        private $conn;
        private $session = false;

        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function selectUser($username, $password){
            $stmt = $this->conn->prepare("SELECT * FROM user_login WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();


            // Rowcount kijk hoeveelste row terug gegeven word. Als dit groter is dan 0 bestaat het username
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                // Kijkt of the password hetzelfde is als de password die met de username is opgeslagen
                if (password_verify($password, $user['password'])) {
                    $session = true;
                    
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "Invalid username";
            }
        }

        public function getSession() {
            return $this->session;
        }
    }
?>