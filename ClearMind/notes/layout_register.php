<?php 
	require_once 'form_fns.php';
	require_once '../controller/register.php';
	require_once '../model/objects/error.php';
		display_html_header("Регистрация");
		display_register_form($error);
		display_html_footer();
 ?>