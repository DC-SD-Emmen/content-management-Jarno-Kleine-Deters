<?php
    session_start();

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
        
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    $this->session = true;  // Now updates the class variable
                    $_SESSION['logged_in'] = true;  // Store in session
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "Invalid username";
            }
        }
        

        public function getSession() {
            return isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
        }
        
    }
?>