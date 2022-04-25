<?php
session_start();
                $title = "Создать заметку";
                // html
                include '../display_html.php';
                // подключить бд
                include '../config/database.php';
                display_html_header($title,$conn);
                // ссылка для доступа к записи
				$user_idd=isset($_SESSION['valid_id']) ? $_SESSION['valid_id'] : die('Ошибка:  user не найден.');
                // переменная для ошибки
				
                $nameErr = $desErr = "";
				echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>";
               if($_POST){
					if(empty($_POST['name'])){
						$nameErr = "Без заголовка нельзя";
					}
						else if(empty($_POST['description'])){
							$desErr = "Без содержания нельзя";
						}
								else{
						
						try{
                           // запрос вставки 
                           $query = "INSERT INTO notes
                                       SET user_idd=:user_idd,name=:name, description=:description,
                                           created_at=:created";
                           // подготовка запроса к выполнению 
                           $stmt = $conn->prepare($query);
                           $name=htmlspecialchars(strip_tags($_POST['name']));
                           $description=htmlspecialchars(strip_tags($_POST['description']));
                           // привязать параметры
                           $stmt->bindParam(':name', $name);
                           $stmt->bindParam(':description', $description);
                           // указываем время
                           $created=date('Y-m-d H:i:s');
                           $stmt->bindParam(':created', $created);
						   $user_idd=$_SESSION['valid_id'];
						   $stmt->bindParam(':user_idd', $user_idd,PDO::PARAM_INT);
                            // выполнить запрос
                            if($stmt->execute()){
                                echo "<div class='alert alert-success alert-dismissible  '>получилось сохранить</div>";
                            }else{
                                echo "<div class='alert alert-danger'>не получилось сохранить</div>";
                            }
                        }
                        // показать ошибку
                        catch(PDOException $exception){
							echo "<div class='alert alert-success'>user_idd={$user_idd}</div>";
                            die('ошибка: ' . $exception->getMessage());
                        }
                    }
                }
                display_html_create_form_notes($nameErr, $desErr);
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
	  