<?php 
    require_once 'models/database.php';

    class User {

        public static function findByEmail ($email){
            // Criando variável de conexão
            $conn = Database::getConnection();

            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->execute(['email'=> $email]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

?>