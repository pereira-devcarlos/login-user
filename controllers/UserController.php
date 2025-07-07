<?php 

    class UserController {
        public function register(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
                    'perfil' => $_POST['perfil']
                ];

                User::create($data);

                header('Location: index.php');
            } else {
                include 'views/register.php';
            }
        }
        
        public function edit($id){
            session_start();
            if($_SESSION['perfil'] == 'admin' || $_SESSION['perfil'] == 'gestor'){
                $user = User::find($id);
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $data = [
                        'nome' => $_POST['nome'],
                        'email' => $_POST['email'],
                        'perfil' => $_POST['perfil']
                    ];
                }

                User::update($id, $data);
                header('Location: indedx.php?action=list');
            } else {
                include 'views/editUser.php';
            }
        }
    }

?>