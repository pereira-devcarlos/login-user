<?php 

    class UserController {
        public function register(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $from = isset($_GET['from']) ? $_GET['from'] : '';
                $data = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
                    'perfil' => $_POST['perfil'] ?? 'colaborador' // Define 'colaborador' como padrão se não for enviado
                ];

                User::create($data);
                // Redireciona para a lista de usuários se veio da página de lista, ou para o login
                if ($from === 'list') {
                    header('Location: index.php?action=list');
                } else {
                    header('Location: index.php?action=login');
                }
            } else {
                include 'views/register.php';
            }
        }
        
        public function edit($id){
            session_start();
            if($_SESSION['perfil'] == 'admin'){
                $user = User::find($id);
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Admin pode editar todos os campos
                    $data = [
                        'nome' => $_POST['nome'],
                        'email' => $_POST['email'],
                        'perfil' => $_POST['perfil'],
                        'senha' => !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : $user['senha'] // Mantém a senha original se não for alterada
                    ];
                    User::update($id, $data);
                    header('Location: index.php?action=list');
                } else {
                    include 'views/editUser.php';
                }
            } else if($_SESSION['perfil'] == 'gestor'){
                $user = User::find($id);
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Gestor pode editar apenas nome e email
                    $data = [
                        'nome' => $_POST['nome'],
                        'email' => $_POST['email'],
                        'perfil' => $user['perfil'], // Mantém o perfil original
                        'senha' => !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : $user['senha'] // Mantém a senha original se não for alterada
                    ];
                    User::update($id, $data);
                    header('Location: index.php?action=list');
                } else {
                    include 'views/editUser.php';
                }
            } else {
                echo 'Você não tem permissão para editar usuários';
            }
        }

        public function list(){
            $users = User::all();
            include 'views/listUser.php';
        }

        public function delete($id){
            User::delete($id);
            header('Location: index.php?action=list');
        }
    }

?>