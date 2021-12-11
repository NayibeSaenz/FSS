<?php 

	class User {
		// 1era Parte - POO: Programación Orientada a Objetos
		private $docUsuario;
		private $tipoDocUsuario;
	    private $nombresUsuario;
    	private $apellidosUsuario;
    	private $telUsuario;
        private $celUsuario;
        private $emailUsuario;
    	private $dirUsuario;
        private $idRol;
    	private $passUsuario;
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

		function __construct2($documento, $pass){			
	    	$this->docUsuario = $documento;			
	    	$this->passUsuario = $pass;	    	
		}

		public function __construct11($documento, $tipodoc, $nombres, $apellidos, $telefono, $celular, 
										$correo, $direccion, $perfil, $pass, $estado){
			$this->docUsuario = $documento;
			$this->tipoDocUsuario = $tipodoc;
			$this->nombresUsuario = $nombres;
			$this->apellidosUsuario = $apellidos;  
			$this->telUsuario = $telefono;
			$this->celUsuario = $celular;
			$this->emailUsuario = $correo;
			$this->dirUsuario = $direccion;
			$this->idRol = $perfil;
			$this->passUsuario = $pass;
			$this->estadoUsuario = $estado;
		}
		
		public function __construct9($documento, $tipodoc, $nombres, $apellidos, $telefono, $celular, 
										$correo, $direccion, $estado){
			$this->docUsuario = $documento;
			$this->tipoDocUsuario = $tipodoc;
			$this->nombresUsuario = $nombres;
			$this->apellidosUsuario = $apellidos;  
			$this->telUsuario = $telefono;
			$this->celUsuario = $celular;
			$this->emailUsuario = $correo;
			$this->dirUsuario = $direccion;
			$this->estadoUsuario = $estado;
		}

		// // Métodos Getters y Setters
        # docUsuario
		public function getDocUsuario(){
			return $this->docUsuario;
		}
		public function setDocUsuario($docUsuario){
			$this->docUsuario = $docUsuario;
		}
        # $tipoDocUsuario
		public function getTipoDocUsuario(){
			return $this->tipoDocUsuario;
		}
		public function setTipoDocUsuario($tipoDocUsuario){
			$this->tipoDocUsuario = $tipoDocUsuario;
		}
        # nombresUsuario
		public function getNombresUsuario(){
			return $this->nombresUsuario;
		}
		public function setNombresUsuario($nombresUsuario){
			$this->nombresUsuario = $nombresUsuario;
		}
		# apellidosUsuario
		public function getApellidosUsuario(){
			return $this->apellidosUsuario;
		}
		public function setApellidosUsuario($apellidosUsuario){
			$this->apellidosUsuario = $apellidosUsuario;
		}
		# telUsuario
		public function getTelUsuario(){
			return $this->telUsuario;
		}   
		public function setTelUsuario($telUsuario){
			$this->telUsuario = $telUsuario;
		}
        # celUsuario
		public function getCelUsuario(){
			return $this->celUsuario;
		}   
		public function setCelUsuario($celUsuario){
			$this->celUsuario = $celUsuario;
		}
        # emailUsuario
		public function getEmailUsuario(){
			return $this->emailUsuario;
		}
		public function setEmailUsuario($emailUsuario){
			$this->emailUsuario = $emailUsuario;
		}
		# dirUsuario
		public function getDirUsuario(){
			return $this->dirUsuario;
		}
		public function setDirUsuario($dirUsuario){
			$this->dirUsuario = $dirUsuario;
		}
        # idRol
		public function getIdRol(){
			return $this->idRol;
		}   
		public function setIdRol($idRol){
			$this->idRol = $idRol;
		}
		# passUsuario
		public function getPassUsuario(){
			return $this->passUsuario;
		}
		public function setPassUsuario($passUsuario){
			$this->passUsuario = $passUsuario;
		}
		# estadoUsuario
		public function getEstadoUsuario(){
			return $this->estadoUsuario;
		}
		public function setEstadoUsuario($estadoUsuario){
			$this->estadoUsuario = boolval($estadoUsuario);
		} 
/*----------------------------------------------------------------------------------------*/
/*----------------------------------------------------------------------------------------*/
		// 2da Parte - Lógica de Negocio (Casos de Uso -> Interactúan con la BBDD)
		// Iniciar Sesión
		public function iniciarSesion($usuario){
			try {
				# Consulta SQL
				$sql = 'SELECT * FROM usuario WHERE 
						doc_identidad=:doc_identidad AND 
						password=:password';

				# Prepara la BBDD
				$dbh = $this->pdo->prepare($sql);

				// # Vincula Datos
				$dbh->bindValue('doc_identidad', $usuario->getDocUsuario());
				$dbh->bindValue('password', $usuario->getPassUsuario());

				// # Ejecuta la Consulta
				$dbh->execute();

				// # Encontrar en la BBDD
				$userDb = $dbh->fetch();

				if ($userDb) {					
					# Crear Objeto
					$user = new User(
						$userDb['doc_identidad'],
						$userDb['tipo_doc'],
						$userDb['nombres'],
						$userDb['apellidos'],
						$userDb['tel_contacto'],
						$userDb['cel_contacto'],
						$userDb['email'],
						$userDb['direccion'],
						$userDb['id_rol'],
						$userDb['password'],
						$userDb['estado']	
					);
					return $user;
				} else {
					return false;
				}

			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		# Registar (Crear) Usuario
		public function registrar($usuario){
			try {
				# Consulta: SQL
				$sql = 'INSERT INTO usuario VALUES (
							:doc_identidad,
							:tipo_doc,
							:nombres,
							:apellidos,
							:tel_contacto,
							:cel_contacto,
							:email,
							:direccion,
							:id_rol,
							:password,
							:estado
						)';

				# Prepara la consulta en la BBDD
				$dbh = $this->pdo->prepare($sql);

				# Vincula datos a la Consulta
				$dbh->bindValue('doc_identidad', $usuario->getDocUsuario());
				$dbh->bindValue('tipo_doc', $usuario->getTipoDocUsuario());
				$dbh->bindValue('nombres', $usuario->getNombresUsuario());
				$dbh->bindValue('apellidos', $usuario->getApellidosUsuario());
				$dbh->bindValue('tel_contacto', $usuario->getTelUsuario());			
				$dbh->bindValue('cel_contacto', $usuario->getCelUsuario());			
				$dbh->bindValue('email', $usuario->getEmailUsuario());
				$dbh->bindValue('direccion', $usuario->getDirUsuario());
				$dbh->bindValue('id_rol', $usuario->getIdRol());
				$dbh->bindValue('password', $usuario->getPassUsuario());
				$dbh->bindValue('estado', $usuario->getEstadoUsuario());

				# Ejecutar la Consulta
				$dbh->execute();

			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		# Consultar USUARIOS
		public function listar(){
			try {
				# Crear Arreglo
				$userList = [];

				# Consulta
				$sql = 'SELECT * FROM usuario';

				# Prepara la consulta
				$dbh = $this->pdo->query($sql);

				# Recorre el objeto
				foreach ($dbh->fetchAll() as $user) {
					$userList[] = new User(
						$user['doc_identidad'],
						$user['tipo_doc'],
						$user['nombres'],
						$user['apellidos'],
						$user['tel_contacto'],
						$user['cel_contacto'],
						$user['email'],
						$user['direccion'],
						$user['id_rol'],
						$user['password'],
						$user['estado']
					);
				}
				# Devolver un Arreglo de Objetos
				return $userList;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		# Consultar CLIENTES
		public function listarClientes(){
			try {
				# Crear Arreglo
				$userList = [];

				# Consulta
				$sql = 'SELECT usuario.doc_identidad, tipo_doc, nombres, apellidos, tel_contacto, cel_contacto, email, direccion, estado 
                FROM usuario WHERE id_rol = "3" ORDER BY usuario.doc_identidad';

				# Prepara la consulta
				$dbh = $this->pdo->query($sql);

				# Recorre el objeto
				foreach ($dbh->fetchAll() as $user) {
					$userList[] = new User(
						$user['doc_identidad'],
						$user['tipo_doc'],
						$user['nombres'],
						$user['apellidos'],
						$user['tel_contacto'],
						$user['cel_contacto'],
						$user['email'],
						$user['direccion'],
						$user['estado']
					);
				}

				# Devolver un Arreglo de Objetos
				return $userList;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		# Consultar CLIENTES
		public function listarEntrenadores(){
			try {
				# Crear Arreglo
				$userList = [];

				# Consulta
				$sql = 'SELECT usuario.doc_identidad, tipo_doc, nombres, apellidos, tel_contacto, cel_contacto, email, direccion, estado 
                FROM usuario WHERE id_rol = "2" ORDER BY usuario.doc_identidad';

				# Prepara la consulta
				$dbh = $this->pdo->query($sql);

				# Recorre el objeto
				foreach ($dbh->fetchAll() as $user) {
					$userList[] = new User(
						$user['doc_identidad'],
						$user['tipo_doc'],
						$user['nombres'],
						$user['apellidos'],
						$user['tel_contacto'],
						$user['cel_contacto'],
						$user['email'],
						$user['direccion'],
						$user['estado']
					);
				}

				# Devolver un Arreglo de Objetos
				return $userList;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		# Actualizar Parte I: Conseguir el Usuario
		public function getById($documento){
			try {
				# Consulta
				$sql = 'SELECT * FROM usuario WHERE doc_identidad=:doc_identidad';

				# Prepara la BBDD
				$dbh = $this->pdo->prepare($sql);

				# Vincula Datos
				$dbh->bindValue('doc_identidad', $documento);

				# Ejecuta la Consulta
				$dbh->execute();

				# Crea el objeto de la BBDD
				$userDb = $dbh->fetch();

				# Crea el objeto del modelo
				$user = new User(
					$userDb['doc_identidad'],
					$userDb['tipo_doc'],
					$userDb['nombres'],
					$userDb['apellidos'],
					$userDb['tel_contacto'],
					$userDb['cel_contacto'],
					$userDb['email'],
					$userDb['direccion'],
					$userDb['id_rol'],
					$userDb['password'],
					$userDb['estado']			
				);

				# Retorna el objeto con los datos
				return $user;

			} catch (Exception $e) {
				die($e->getMessage());	
			}
		}
		# Actualizar Parte II: Registrar el Usuario
		public function actualizar($usuario){
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
				$dbh->bindValue('doc_identidad', $usuario->getDocUsuario());
				$dbh->bindValue('tipo_doc', $usuario->getTipoDocUsuario());
				$dbh->bindValue('nombres', $usuario->getNombresUsuario());
				$dbh->bindValue('apellidos', $usuario->getApellidosUsuario());
				$dbh->bindValue('tel_contacto', $usuario->getTelUsuario());			
				$dbh->bindValue('cel_contacto', $usuario->getCelUsuario());			
				$dbh->bindValue('email', $usuario->getEmailUsuario());
				$dbh->bindValue('direccion', $usuario->getDirUsuario());
				$dbh->bindValue('id_rol', $usuario->getIdRol());
				$dbh->bindValue('password', $usuario->getPassUsuario());
				$dbh->bindValue('estado', $usuario->getEstadoUsuario());

				# Ejecuta la Consulta
				$dbh->execute();


			} catch (Exception $e) {
				die($e->getMessage());	
			}
		}
		# Eliminar Usuario
		public function eliminar($documento){
			try {
				# Consulta
				$sql = 'DELETE FROM usuario WHERE doc_identidad=:doc_identidad';

				# Prepara la BBDD
				$dbh = $this->pdo->prepare($sql);

				# Vincula datos
				$dbh->bindValue('doc_identidad', $documento);

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