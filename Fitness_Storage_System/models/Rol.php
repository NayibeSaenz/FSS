<?php 

	class Rol {
		// 1era Parte - POO: Programación Orientada a Objetos
        private $idRol;
    	private $estadoUsuario;

    	private $pdo;

    	// Sobrecarga de Constructores
		public function __construct(){
			$a = func_get_args();
			$i = func_num_args();
			if (method_exists($this, $f='__construct'.$i)) {
				call_user_func_array(array($this, $f), $a);
			}
		}
		public function __construct0(){
			try {
				$this->pdo = Database::conexion();
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function __construct2($rol, $nombre){
			$this->idRol = $rol;
			$this->nombreRol = $nombre;
		}

		// // Métodos Getters y Setters
        # idRol
		public function getIdRol(){
			return $this->idRol;
		}   
		public function setIdRol($idRol){
			$this->idRol = $idRol;
		}
		# nombreRol
		public function getNombreRol(){
			return $this->nombreRol;
		}
		public function setNombreRol($nombreRol){
			$this->nombreRol = $nombreRol;
		}
/*----------------------------------------------------------------------------------------*/
/*----------------------------------------------------------------------------------------*/
		// 2da Parte - Lógica de Negocio (Casos de Uso -> Interactúan con la BBDD)
		
		# Registar (Crear) ROL
		public function registrar($usuario){
			try {
				# Consulta: SQL
				$sql = 'INSERT INTO rol VALUES (
							:id_rol,
							:nombre
						)';

				# Prepara la consulta en la BBDD
				$dbh = $this->pdo->prepare($sql);

				# Vincula datos a la Consulta
				$dbh->bindValue('id_rol', $usuario->getIdRol());
				$dbh->bindValue('nombre', $usuario->getNombreRol());

				# Ejecutar la Consulta
				$dbh->execute();

			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		# Consultar Usuarios
		public function listar(){
			try {
				# Crear Arreglo
				$userList = [];

				# Consulta
				$sql = 'SELECT * FROM rol';

				# Prepara la consulta
				$dbh = $this->pdo->query($sql);

				# Recorre el objeto
				foreach ($dbh->fetchAll() as $user) {
					$userList[] = new Rol(
						$user['id_rol'],
						$user['nombre']
					);
				}

				# Devolver un Arreglo de Objetos
				return $userList;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		# Actualizar Parte I: Conseguir el Usuario
		public function getById($rol){
			try {
				# Consulta
				$sql = 'SELECT * FROM rol WHERE id_rol=:id_rol';

				# Prepara la BBDD
				$dbh = $this->pdo->prepare($sql);

				# Vincula Datos
				$dbh->bindValue('id_rol', $rol);

				# Ejecuta la Consulta
				$dbh->execute();

				# Crea el objeto de la BBDD
				$userDb = $dbh->fetch();

				# Crea el objeto del modelo
				$user = new Rol(
					$userDb['id_rol'],
					$userDb['nombre']			
				);

				# Retorna el objeto con los datos
				return $user;

			} catch (Exception $e) {
				die($e->getMessage());	
			}
		}
		# Actualizar Parte II: Registrar el Usuario
		public function actualizar($rol){
			try {
				# Consulta
				$sql = 'UPDATE usuario SET 
							doc_identidad=:doc_identidad,
							tipo_doc=:tipo_doc,
							nombres=:nombres,
							apellidos=:apellidos,
							tel_contacto=:tel_contacto,
							cel_contacto=:cel_contacto,
							email=:email,
							direccion=:direccion,
							id_rol=:id_rol,
							password=:password,
							estado=:estado 
						WHERE doc_identidad=:doc_identidad';

				# Prepara la BBDD
				$dbh = $this->pdo->prepare($sql);

				# Vincula datos
				$dbh->bindValue('id_rol', $rol->getIdRol());
				$dbh->bindValue('nombre', $rol->getPassUsuario());

				# Ejecuta la Consulta
				$dbh->execute();

			} catch (Exception $e) {
				die($e->getMessage());	
			}
		}
		# Eliminar Usuario
		public function eliminar($rol){
			try {
				# Consulta
				$sql = 'DELETE FROM rol WHERE id_rol=:id_rol';

				# Prepara la BBDD
				$dbh = $this->pdo->prepare($sql);

				# Vincula datos
				$dbh->bindValue('id_rol', $rol);

				# Ejecuta la Consulta
				$dbh->execute();

			} catch (Exception $e) {
				die($e->getMessage());		
			}
		}
		# Cerrar Sesión
		public function cerrarSesión(){}

	}

?>