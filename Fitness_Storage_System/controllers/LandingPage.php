<?php session_start();

    class LandingPage {

        public function __construct() {
            
        }

        public function index() {
			$_SESSION['modulo'] = 'usuario';
            require_once 'views/roles/business/header.php';
            require_once 'views/business/index.view.php';
            require_once 'views/roles/business/footer.php';
        }
    }

?>