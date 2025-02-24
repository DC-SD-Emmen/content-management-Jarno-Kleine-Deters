<?php
session_start();

spl_autoload_register(function ($class_name) {
    include 'Classes/' . $class_name . '.php';
});

class logIn {
    private $conn;
    private $session = false;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function selectUser($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM user_login WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                $this->session = true;
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;

            } else {
                $_SESSION['logged_in'] = false;
                echo "Invalid password.";
            }
        } else {
            $_SESSION['logged_in'] = false;
            echo "Invalid username.";
        }
    }

    public function getSession() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
    }
}
?>