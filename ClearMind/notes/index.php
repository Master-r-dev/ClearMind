<?php 
	session_start();
	include '../config/userDatabase.php';
	require_once 'form_fns.php';
	require_once '../controller/login.php';
	require_once '../model/objects/error.php';
	
	// Если пользователь не вошел то будет вход иначе страница приветствия 

	if(!isset($_SESSION['valid_user'])){
		display_html_header("Войти");
		// дисплей
		display_login_form($error);
		$error = null;
		display_html_footer();
	}else  {
		display_html_header("Bless you");
		if(isset($_SESSION['valid_id'])){display_html_index();}
		else{echo 'Войдите если не заходили или Перезагрузите страницу пожалуйста';}
		display_html_footer();
	}
 ?>