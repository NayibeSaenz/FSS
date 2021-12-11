<?php session_start();
    
require_once 'models/User.php';

	class Login {

		private $model;

		public function __construct(){
			$this->model = new User();
		}
        public function index(){
            if (($_SERVER['REQUEST_METHOD']) == 'POST') {
                $usuario = new User($_POST['documento'], sha1($_POST['pass']));
                $usuario = $this->model->iniciarSesion($usuario);
                if ($usuario) {
                    if ($usuario->getEstadoUsuario() == 1) {
                        if ($usuario->getIdRol() == 1) {
                            $_SESSION['modulo'] = 'admin';
                        } elseif ($usuario->getIdRol() == 2) {
                            $_SESSION['modulo'] = 'entrenador';
                        } elseif ($usuario->getIdRol() == 3) {
                            $_SESSION['modulo'] = 'cliente';
                        }
                        $usuario = serialize($usuario);
							$_SESSION['usuario'] = $usuario;
							header('Location: ?c=Dashboard');
                    } else {
                        header('Location: ?');
                    }
                } else {
                    header('Location: ?');
                   //echo "<script>alert('El usuario no existe')</script>";
                }
            } 
        }

	}
?>
<!--$usuario = new User($user, $pass);
					$usuario = $this->model->iniciarSesion($usuario);
					if ($usuario) {
						if ($usuario->getEstadoUsuario() == 1){
							if ($usuario->getIdRol() == 1) {
								$_SESSION['modulo'] = 'admin';
							} elseif ($usuario->getIdRol() == 3) {
								$_SESSION['modulo'] = 'cliente';
							} elseif ($usuario->getIdRol() == 4) {
								$_SESSION['modulo'] = 'vendedor';
							}
							$usuario = serialize($usuario);
							$_SESSION['usuario'] = $usuario;
							header('Location: ?c=Dashboard');
						} else {
							$mensaje = "El usuario no está activo";
						} 
					} else {
						$mensaje = "Usuario y/o Contraseña Incorrectos";
					}-->