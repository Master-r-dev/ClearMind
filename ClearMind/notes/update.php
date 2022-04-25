<?php
session_start();
	 //html функции
            include_once "../display_html.php";
		//подключаем бд
        include '../config/database.php';
        // получим ID записи
        // isset() проверяет есть значение или нет
        $i=isset($_GET['note_id']) ? $_GET['note_id'] : die('Ошибка:  id не найден.');
		$id=$_SESSION['note_arr'][$i];
		$user_idd=isset($_SESSION['valid_id']) ? $_SESSION['valid_id'] : die('Ошибка:  user не найден.');
        $title = "Изменить заметку";
        display_html_header($title,$conn);
		//считать данные текущей записи
        try {
            // запрос select 
            $query = "SELECT id, name, description FROM notes WHERE id = '$id' and user_idd= '$user_idd' LIMIT 0,1";
            $stmt = $conn->prepare( $query );
            // выполнить запрос 
            $stmt->execute();
            // сохранить в переменную строку
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
        }
        // показать ошибку 
        catch(PDOException $exception){
            die('Ошибка: ' . $exception->getMessage());
        }
        //переменные чтобы сохранить ошибку 
        $nameErr = $desErr = "";
      // проверить отправлена ли форма
	  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>";
      if($_POST){
        if(empty($_POST['name'])){
            $nameErr = "Без заголовка нельзя";
        }else if(empty($_POST['description'])){
            $desErr = "Без содержания нельзя";
        }else{
            try{
			//	запрос на изменение данных
			// лучше именовать поля и не использовать вопросительные знаки 
                $query = "UPDATE notes 
                            SET name=:name, description=:description , updated_at=:updated_at
							WHERE id = :id AND user_idd = :user_idd";
                // подготовка запроса к выполнению 
                $stmt = $conn->prepare($query);
                // записанные значения( posted )
                $name=htmlspecialchars(strip_tags($_POST['name']));
                $description=htmlspecialchars(strip_tags($_POST['description']));
				$updated_at=date('Y-m-d H:i:s');
                // привязать параметры
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
				$stmt->bindParam(':updated_at', $updated_at);
                $stmt->bindParam(':id', $id);
				$stmt->bindParam(':user_idd', $user_idd,PDO::PARAM_INT);
                // выполнить запрос
				
                if($stmt->execute()){
                    echo "<div class='alert alert-success'>Запись изменена</div>";
						try {
							// запрос select 
							$query = "SELECT id, name, description FROM notes WHERE id = '$id' and user_idd= '$user_idd' LIMIT 0,1";
							$stmt = $conn->prepare( $query );
							// выполнить запрос 
							$stmt->execute();
							// сохранить в переменную строку
							$row = $stmt->fetch(PDO::FETCH_ASSOC); 
						}
						// показать ошибку 
						catch(PDOException $exception){
							die('Ошибка: ' . $exception->getMessage());
						}
                }else{
                    echo "<div class='alert alert-danger'>запись не получилось изменить</div>";
                }
                
            }
            
            // показать ошибку
            catch(PDOException $exception){
                die('Ошибка: ' . $exception->getMessage());
            }
        }
    }
        display_html_update_form_notes($row,$nameErr,$desErr);
		?>
		<script type='text/javascript'>
					$(document).ready(function () {
						window.setTimeout(function() {
							$(".alert").fadeTo(1000, 0).slideUp(1000, function(){
								$(this).remove(); 
							});
						}, 2000);
						 
						});
		</script>
	  <?php
        display_html_footer();
      ?>
	  