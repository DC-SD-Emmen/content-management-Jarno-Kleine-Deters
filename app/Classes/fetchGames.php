<?php
    require 'Classes/Database.php';
    class fetchGames {
        
        public function getGamesByUser() {
            $database = new Database();
            $conn = $database->getConnection();

            $username = $_SESSION['username'];
            $stmt = $conn->prepare("SELECT games.* FROM games 
                                    JOIN user_games ON games.id = user_games.game_id 
                                    JOIN user_login ON user_games.user_id = user_login.id 
                                    WHERE user_login.username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $games;
        }
    }
?>