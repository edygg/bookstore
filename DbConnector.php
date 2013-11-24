<?php
	
	class DbConnector {

		public $connection = array(
			'host' 		=> 'localhost',
			'user' 		=> 'root',
			'password' 	=> 'computacion1.',
			'database'	=> 'bookstore'
		);

		public $link; 

		function __construct() {
			$this->connect();
		}

		function __destruct() {
			$this->disconnect();
		}

		public function connect() {
			$this->link = new mysqli(
									$this->connection['host'], 
									$this->connection['user'], 
									$this->connection['password'], 
									$this->connection['database']
								);
			return $this->link;
		}

		public function disconnect() {
			$this->link->close();
		}

		public function error() {
			return mysqli_connect_errno();
		}
	}
?>