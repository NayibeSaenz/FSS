<?php


class Roles {

    public function __construct() {
        
    }

    public function index() {
        require_once 'views/roles/admin/header.php';
        require_once 'views/modules/2_mod_main/0_crud_roles/1_read_roles.view.php';
        require_once 'views/roles/admin/footer.php';
    }
}

    /*require_once 'models/User.php';

    class Roles { 

        private $model;

        public function __construct() {
            $this->model = new Rol();
        }
        

        //CREAR O REGISTRAR
        public function crear(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET'){
                require_once 'views/roles/admin/header.php';
                require_once 'views/modules/2_mod_main/0_crud_roles/0_create_roles.view.php';
                require_once 'views/roles/admin/footer.php';
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $usuario = new Rol();
                $usuario->setIdRol($_POST['rol']);
                $usuario->setNombreRol($_POST['nombre']);
                $this->model->registrar($usuario);
                header('Location: ?c=Users&a=consultar');	
            }
        }

        // Consultar
        public function consultar(){
            $users = $this->model->listar();
            require_once 'views/roles/admin/header.php';
            require_once 'views/modules/2_mod_main/0_crud_roles/1_read_roles.view.php';
            require_once 'views/roles/admin/footer.php';
        }

         // Actualizar
        public function actualizar(){
        #$valUsuario = unserialize($_SESSION['usuario']);
        #if (isset($_SESSION['usuario']) && ($valUsuario->getIdRol() == 1 || $valUsuario->getIdRol() == 4)) {
            # POR GET
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $user = $this->model->getById($_GET['rol']);
                require_once 'views/roles/admin/header.php';
                require_once 'views/modules/1_users/2_update_users.view.php';
                require_once 'views/roles/admin/footer.php';
            }   
            # POR POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $usuario = new Rol();
                $usuario->setIdRol($_POST['rol']);
                $usuario->setNombreRol($_POST['nombre']);
                $this->model->actualizar($usuario);
                header('Location: ?c=Users&a=consultar');
            }# else {
               # header('Location: ?c=Dashboard');
           # }
        }
        // Eliminar
        public function eliminar(){
            #$valUsuario = unserialize($_SESSION['usuario']);
            #if (isset($_SESSION['usuario']) && $valUsuario->getIdRol() == 1) {
                $this->model->eliminar($_GET['rol']);
                header('Location: ?c=Users&a=consultar');
            } #else {
                #header('Location: ?c=Dashboard');
           # }
        #}
                
    }*/
?>