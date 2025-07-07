<?php 
    require 'controllers/AuthController.php';
    require 'controllers/UserController.php';


    // Cria instância de controlador
    $authController = new AuthController();
    $userController = new UserController();

    $action = $_GET['action'] ?? 'login';

    switch ($action) {
        case 'login':
            $authController->login();
            break;
        case 'register':
            $userController->register();
            break;
        case 'dashboard':
            // Directamente para o dashboard
                include 'views/dashboard.php';
        default:
            $authController->login();
            break;
    }
?>