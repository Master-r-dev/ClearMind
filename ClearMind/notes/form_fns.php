<?php 
	function display_html_header($title){
		?>
		<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				 
				<title><?php echo $title; ?></title>
				<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />
				
				<link rel="stylesheet" href="../libs/css/custom/style.css">
			</head>
			<body>
				<style type="text/css">
				p { color: white; }
				h1 { color: white; }
				h2 { color: white; }
				tr { color: white; }
				</style>
				<style>
				body{
				background-color: #181a1b ;
				background-image: url('http://clearmind/libs/images/2.jpg') ;
				background-attachment: fixed;
				background-size: cover;
				}
				</style>
				<nav class="navbar navbar-inverse">
				  <div class="container-fluid">
				    <ul class="nav navbar-nav">
				      <li class="active"><a href="index.php">Bless you</a></li>
				    </ul>
				    <ul class="nav navbar-nav navbar-right">
				    	<?php
				    	if($title == "Bless you"){
				    		echo ' <li><a href="layout_logout.php" ><span class="glyphicon glyphicon-remove-sign"></span>Выйти </a></li>';
				    		
				    	}else{
		    				echo ' <li><a href="layout_register.php"><span class="glyphicon glyphicon-question-sign"></span> Регистрация </a></li>';
		    		  		echo '<li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Войти</a></li>';
		    	}
				     	
				      ?>
				    </ul>
				  </div>
				</nav>
				<div class="container">
					
						<h1><?php echo $title;?></h1>
					
					<div>
						
		<?php
	}

	function display_html_footer(){
		?>				
				</div>
				</div>
				</div>
				<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			</body>
			</html>
		<?php
	}

	function display_login_form($error){
		 
		?>
		<div class='col-sm-6 col-md-4 col-md-offset-4'>
			<?php
			
			if($error->getErr()){

		    	echo "<div class='alert alert-danger'> ";
		    		echo $error->getErr();
		    	echo "</div>";
			}
			?>
		   <div class='account-wall'>
		        <div class='tab-content'>
		            <div class='tab-pane active' >
		                <img class='profile-img' src='../libs/images/log_icon.png'>

		               
		               <form class='form-signin' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method='post' id="login_form">

		               		<span class="error"><?php echo $error->getEmailErr(); ?></span>
		                    <input type='text' name='email' class='form-control' placeholder='Email' autofocus />
		                    
							<span class="error"><?php echo $error->getPassErr(); ?></span>
		                   <input type='password' name='password' class='form-control' placeholder='пароль' />
		                   

		                   <input type='submit' name="submit" class='btn btn-lg btn-primary btn-block' value='войти' />

		                </form>

		            </div>
		        </div>
		        <p class="text-center">Новый пользователь?<a href="layout_register.php"> Делай аккаунт</a></p>
		    </div>
		 
		</div>

		<?php
		
	}

	function display_register_form ($error){
	 	
		?>
			
			<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method='post' id="register_form" >
			 
			    <table class='table table-responsive'>
			 
			        <tr>
			            <td class='width-30-percent'>Имя </td>
			            <td><input type='text' name='firstname' class='form-control'  value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : "";  ?>" /></td>
			            <td><span class="error"><?php echo $error->getFirstnameErr(); ?></span></td>
			        </tr>
			 
			        <tr>
			            <td>Фамилия</td>
			            <td><input type='text' name='lastname' class='form-control'  value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'], ENT_QUOTES) : "";  ?>" /></td>
			            <td><span class="error"><?php echo $error->getLastnameErr(); ?></span></td>
			        </tr>
			 
			        <tr>
			            <td>Телефон</td>
			            <td><input type='text' name='phonenum' class='form-control'  value="<?php echo isset($_POST['phonenum']) ? htmlspecialchars($_POST['phonenum'], ENT_QUOTES) : "";  ?>" /></td>
			              <td><span class="error"><?php echo $error->getPhoneErr(); ?></span></td>
			        </tr>
			 
			        <tr>
			            <td>Email</td>
			            <td><input type='email' name='email' class='form-control'  value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
			              <td><span class="error"><?php echo $error->getEmailErr(); ?></span></td>
			        </tr>
			 
			        <tr>
			            <td>Пароль</td>
			            <td><input type='password' name='password' class='form-control'></td>
			             <td><span class="error"><?php echo $error->getPassErr(); ?></span></td>
			        </tr>
			 
			        <tr>
			            <td></td>
			            <td>
			                <button type="submit" name = "submit" class="btn btn-primary">
			                    <span class="glyphicon glyphicon-send"></span> Зарегистрироваться
			                </button>
			            </td>
			        </tr>
			 
			    </table>
			</form>
		<?php
	}


	function display_html_index(){
		?>	 
	<h2>Спасибо за выбор,<?php echo $_SESSION['valid_user']; 
	echo "<a href='http://ClearMind/notes/notes.php' class='btn btn-primary text-center m-r-1em'><span class='glyphicon glyphicon-road'></span> в путь!</a>";?></h2>
		<?php
	}	
 ?>