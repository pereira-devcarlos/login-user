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

        // Função para buscar o id do usuario
        public static function find($id){
            $conn = Database::getConnection();

            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
            $stmt->execute(['id' => $id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // Função para atualizar o banco de dados
        public static function update($id, $data){
            $conn = Database::getConnection();
            $stmt = $conn->prepare("UPDATE usuarios SET nome = :nome, email = :email, perfil = :perfil, senha = :senha WHERE id = :id");

            $data['id'] = $id;

            $stmt->execute($data);
        }

        public static function all(){
            $conn = Database::getConnection();
            $stmt = $conn->query("SELECT * FROM usuarios");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function delete($id){
            $conn = Database::getConnection();
            $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
            $stmt->execute(['id' => $id]);
        }
    }

?>