<?php 
    require 'controllers/AuthController.php';


    // Cria instância ded controlador
    $authController = new AuthController();

    $action = $_GET['action'] ?? 'login';

    switch ($action) {
        case 'login':
            $authController->login();
            break;
        default:
            $authController->login();
            break;
    }
?>