<?php 
    require_once 'models/database.php';

    class User {
        // Função para localizar o usuário pelo email
        public static function findByEmail ($email){
            // Criando variável de conexão
            $conn = Database::getConnection();

            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->execute(['email'=> $email]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // Função para criar usuário no Banco de Dados
        public static function create($data){
            $conn = Database::getConnection();
            
            $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, perfil) VALUES (:nome, :email, :senha, :perfil)");
            $stmt->execute($data);
        }
    }

?>