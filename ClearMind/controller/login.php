<?php 
	
	require_once '../config/userDatabase.php';
	require_once '../model/objects/user.php';
	require_once '../model/objects/error.php';
	
	

	$db = new Database();
	$db->getDatabase();

	// создать нового пользователя
	$user = new User($db->getConn());
    
	// объект под ошибку create a object to get error
	$error = new Displayerror();

	// получить данные из заполненной формы get data from form login
	if(isset($_POST['submit'])){
		// get data
		$email = $_POST['email'];
		$password = $_POST['password'];
		

		// проверить введенные данные check validate data
		if(empty($email)){

			$error->setEmailErr("Нужна эл. почта!");
			

		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      		
      		$error->setEmailErr("не подходящий формат эл. почты");
    	}


		if(empty($password)){

			$error->setPassErr("нужен пароль");
		}
		
		
		if(empty($error->getEmailErr()) && empty($error->getPassErr())){


			if($user->readUser($email,$password)){
				$_SESSION['valid_user'] = $email;
				$query = "SELECT id FROM users WHERE email = '$email' ";
				$stmt =$db->getConn()->prepare($query);
			   $stmt->execute();
			   $row = $stmt->fetch(PDO::FETCH_ASSOC);
			   extract($row);
			   $_SESSION['valid_id']=$row['id'];
			}else{

				$error->setErr("Эл. почта или пароль не правильные");
			}

		}


		
	}
	

 ?>