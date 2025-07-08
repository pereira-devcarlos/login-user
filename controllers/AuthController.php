<?php 
    require_once 'models/user.php';


    class AuthController {

        public function login(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                $user = User::findByEmail($email);

                if ($user && password_verify($senha, $user['senha'])) {
                    session_start();

                    $_SESSION['usuario_id'] = $user['id'];
                    $_SESSION['perfil'] = $user['perfil'];

                    header('Location: index.php?action=dashboard');
                } else {
                    // Passar mensagem de erro para a view
                    $error = 'Email ou senha inválidos. Por favor, tente novamente.';
                    include 'views/login.php';
                }
            } else {
                include 'views/login.php';
            }
        }

        public function logout(){
            session_start();
            session_destroy();
            header('location: index.php');
        }
    }

?>