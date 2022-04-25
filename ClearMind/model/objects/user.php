<?php 
	class User{
		private $conn;
		private $id;
		private $firstname;
		private $lastname;
		private $email;
		private $contact_number; 
		private $password;
		private $created;
		public function __construct($db){
			$this->conn = $db;

		}

		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}

		public function getFirstname(){
			return $this->firstname;
		}
		public function setFirstname($firstname){
			$this->firstname = $firstname;
		}

		public function getLastname(){
			return $this->lastname;
		}
		public function setName($lastname){
			$this->lastname = $lastname;
		}

		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}

		public function getContact(){
			return $this->contact_number;
		}
		public function setContact($contact_number){
			$this->contact_number = $contact_number;
		}

		public function getPassword(){
			return $this->password;
		}
		public function setPassword($password){
			$this->password = $password;
		}

		public function getCreated(){
			return $this->created;
		}
		public function setCreated($password){
			$this->created = $created;
		}


//проверка эл. почты
		public function emailExist($email){

			$query = "SELECT email FROM users WHERE email=:email";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':email',$email);
			$stmt->execute();

			if($stmt->rowCount()>0){
				
				return true;
			}else{

				return false;

			}

		}
		public function readUser($email,$password){
			$pass = md5($password);

			$query = "SELECT email,password FROM users WHERE (email=:email AND password=:password)";

			$stmt = $this->conn->prepare($query);

			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':password',$pass);

			$stmt->execute();

			if($stmt->rowCount()>0){
				return true;
			}else{
				return false;
			}
		}
//создаем пользователя
		public function createUser($firstname,$lastname,$email,$contact_number,$password){
			  $this->created=date('Y-m-d H:i:s');
			  $pass = md5($password);
			$query = "INSERT INTO users SET firstname=:firstname,lastname=:lastname,email=:email,contact_number=:contact_number,password=:password,created=:created";

			$stmt = $this->conn->prepare($query);

			$stmt->bindParam(':firstname',$firstname);
			$stmt->bindParam(':lastname',$lastname);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':contact_number',$contact_number);
			$stmt->bindParam(':password',$pass);
			$stmt->bindParam(':created',$this->created);

			if($stmt->execute()){
				return true;
			}else{
				return false;
			}

		}
	}
 ?>