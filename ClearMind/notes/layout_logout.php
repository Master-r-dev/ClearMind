<?php 
	require_once 'form_fns.php';
	require_once '../controller/logout.php';
		display_html_header("Выйти");
			if(!empty($old_username)){
				if($result_dest ){
					echo '<div class="alert alert-info">Вышел.</div>';
				}else{
					echo "<div class='alert alert-danger'>Не выйти тебе сегодня видимо. </div>";
				}
			}else{

				 echo '<div class="alert alert-danger">Ты не заходил,вот и не вышел. </div>';
			}
		display_html_footer();
 ?>