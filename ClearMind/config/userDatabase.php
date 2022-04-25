<?php 	
	class Database{
		// сделал через класс ибо захотел
		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		private $dbname = "exam_solobuto";
		private $conn;

		//  конструктор
		public function getConn(){
			return $this->conn;
		}
		// подключить get connect
		public function getDatabase(){
			try {

				$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);

			} catch (PDOException $e) {
				echo "Error : " .$e->getMessage();
			}
		}

	}
	

?>
