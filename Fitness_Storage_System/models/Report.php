<?php 

	class Report {

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

		public function repConsultarUsuarios(){
			try {
				# Crear Arreglo
				$userList = [];

				# Consulta
				$sql = 'SELECT * FROM usuario';

				# Prepara la consulta
				$dbh = $this->pdo->query($sql);

				# Almacena todos los registros en un arreglo Multidimensional
				$userList = $dbh->fetchAll();
				
				# Devuelve el arreglo
				return $userList;

			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
		public function repConsultarClientes(){
			try {
				# Crear Arreglo
				$userList = [];

				# Consulta
				$sql =  'SELECT usuario.doc_identidad, tipo_doc, nombres, apellidos, tel_contacto, cel_contacto, email, direccion, estado 
                FROM usuario WHERE id_rol = "3" ORDER BY usuario.doc_identidad';

				# Prepara la consulta
				$dbh = $this->pdo->query($sql);

				# Almacena todos los registros en un arreglo Multidimensional
				$userList = $dbh->fetchAll();
				
				# Devuelve el arreglo
				return $userList;

			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}

 ?>