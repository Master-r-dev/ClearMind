<?php 
	require_once '../config/userDatabase.php';
	require_once '../model/objects/user.php';
	require_once '../model/objects/error.php';
	//  начинаем сессию
	session_start();
	$db = new Database();
	$db->getDatabase();
	$user = new User($db->getConn());
	$error = new Displayerror();
	// получаем заполненные данные из формы регистрации
	if(isset($_POST['submit'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$phonenum = $_POST['phonenum'];
		$password = $_POST['password'];
		// провепяем данные на корректность 
		if(empty($firstname)){
			$error->setFirstnameErr("нужно имя.");
		}elseif(!preg_match("/^[a-zA-Z ]*$/",$firstname)){
				$error->setFirstnameErr("только буквы и пробелы!");
		}
		if(empty($lastname)){
			$error->setLastnameErr("фамилия нужна!");
		}elseif(!preg_match("/^[a-zA-Z ]*$/",$lastname)){
				$error->setLastnameErr("только буквы и пробелы!");
		}
		if(empty($email)){
			$error->setEmailErr("эл. почта нужна!");
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {	
      		$error->setEmailErr("неправильный формат эл. почты ");
    	}
		else if($user->emailExist($email)){
			$error->setEmailErr("эл. почта уже существует.Вы регистрируетесь напоминаю....");
		}
		if(empty($phonenum)){
		}else if(!preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/',$phonenum)){
			$error->setPhoneErr("номер не подходит((");
		}
		if(empty($password)){
			$error->setPassErr("нельзя без пароля");
		}else if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z!@#$%]{8,}$/',$password)){
				$error->setPassErr("минимум 8 символов,1 заглавная буква,одна...не заглавная и цифру бахни");
		}
		if(empty($error->getFirstnameErr()) && empty($error->getLastnameErr()) && empty($error->getEmailErr()) && empty($error->getPhoneErr()) && empty($error->getPassErr())){
			if($user->createUser($firstname,$lastname,$email,$phonenum,$password)){
				//если удалось то харани пользователя 
				$_SESSION['valid_user'] = $email;
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "exam_solobuto";
				try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				} catch (PDOException $e) {
					echo "Ошибка : " .$e->getMessage();
				}
				$query = "SELECT id FROM users WHERE email = '$email' ";
				$stmt = $conn->prepare($query);
			   $stmt->execute();
			   $row = $stmt->fetch(PDO::FETCH_ASSOC);
			   extract($row);
			   $_SESSION['valid_id']=$row['id'];
				header('Location:index.php');
			}else{
				$error->setErr("Не получилась регистрация.Бывает(");
			}
		}
			
	}
	
 ?>