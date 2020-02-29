<?php 

	class Database {
		private $host = DB_HOST;
		private $user = DB_USER;
		private $password = DB_PASS;
		private $db_name = DB_NAME;

		private $db;
		private $stmt;
		private $error;

		public function __construct() {
			$dsn = 'mysql:host='. $this->host .';dbname='. $this->db_name;
			$options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);

			try {
				$this->db = new PDO($dsn, $this->user, $this->password, $options);
			} catch (PDOException $e) {
				$this->error = $e->getMessage();
				echo $this->error;
			}
		}

		public function query($sql) {
			$this->stmt = $this->db->prepare($sql);
		}

		public function bind($param, $value, $type = null) {
			// odabiremo koji je tip
			if(is_null($type)) {
				switch (true) {
					case is_int($value):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = PDO::PARAM_NULL;
						break;
					default:
						$type = PDO::PARAM_STR;
				}
			}
			$this->stmt->bindValue($param, $value, $type);
		}

		public function execute() {
			return $this->stmt->execute();
		}

		// Vraca single row
		public function single() {
			$this->execute();
			return $this->stmt->fetch(PDO::FETCH_OBJ);
		}

		// Vraca all rows
		public function fetchAll() {
			$this->execute();
			return $this->stmt->fetchAll(PDO::FETCH_OBJ);
		}

		// racuna koliko ima rows
		public function rowCount() {
			return $this->stmt->rowCount();
		}
		
	}