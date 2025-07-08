<?php 
    require 'controllers/AuthController.php';
    require 'controllers/UserController.php';
    require 'controllers/DashboardController.php';


    // Cria instância de controlador
    $authController = new AuthController();
    $userController = new UserController();
    $dashController = new DashboardController();

    $action = $_GET['action'] ?? 'login';

    switch ($action) {
        case 'login':
            $authController->login();
            break;
        case 'logout':
            $authController->logout();
            break;
        case 'register':
            $userController->register();
            break;
        case 'list':
            $userController->list();
            break;
        case 'dashboard':
            $dashController->index();
            break;
        case 'edit':
            $id = $_GET['id'];
            $userController->edit($id);
            break;
        case 'create':
            // Ação para criar um novo usuário
            $userController->register();
            break;
        case 'delete':
            $id = $_GET['id'];
            $userController->delete($id);
            break;
        default:
            $authController->login();
            break;
    }
?>