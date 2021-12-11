<?php session_start();

    class Dashboard {

        private $modulo;

        public function __construct() {
            $this->modulo = $_SESSION['modulo'];
        }

        public function index() {
            $usuario = unserialize($_SESSION['usuario']);
                if (isset($_SESSION['usuario'])) {	
                require_once 'views/roles/'.$this->modulo.'/header.php';
                require_once 'views/modules/0_mains/'.$this->modulo.'_main.view.php';
                //require_once 'views/modules/2_mod_main/0_crud_roles/1_read_roles.view.php';
                require_once 'views/roles/'.$this->modulo.'/footer.php';
            } else {
             header('Location: ?');
            }
        }
    }

?>
<!--public function index(){
			$usuario = unserialize($_SESSION['usuario']);
			if (isset($_SESSION['usuario'])) {				
				require_once 'view/roles/'.$this->modulo.'/header.php';
				require_once 'view/modules/0_mains/'.$this->modulo.'.main.view.php';
				require_once 'view/roles/'.$this->modulo.'/footer.php';
			} else {
				header('Location: ?');
			}
		}-->