<?php 

    class DashboardController {
        public function index(){
            session_start();
            if (!isset($_SESSION['usuario_id'])) {
                header('Location: index.php');
                exit;
            }
            include 'views/dashboard.php';
        }
    }

?>