<?php session_start();

    class LoginForm {

        public function __construct() {
            
        }

        public function index() {
            require_once 'views/business/login.php';
        }
    }

?>