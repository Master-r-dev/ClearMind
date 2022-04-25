<?php
session_start();
                // подключить бд
                include '../config/database.php';
                //  html
                include_once "../display_html.php";
				$user_idd=isset($_SESSION['valid_id']) ? $_SESSION['valid_id'] : die('Ошибка:  user не найден.');
                $title = "Вы искали " .$_GET['key'];
                display_html_header($title,$conn);
                 // данная страница текущая и если ничего не назначено то по умолчанию страница первая 
                 $page = isset($_GET['page']) ? $_GET['page'] : 1;
                  
                 //сколько записей отобразиться на странице
                 $records_per_page = 5;
                  
                 // посчитать для запроса предел
                 $from_record_num = ($records_per_page * $page) - $records_per_page;
				echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>";
                if($_GET['key']){
					$query = "SELECT name FROM notes  WHERE ( user_idd= '$user_idd' ) AND (name LIKE :key1 OR description LIKE :key2 )";
						$stmt = $conn->prepare($query);
						$keywords=htmlspecialchars(strip_tags($_GET['key']));
						$keywords = "%{$keywords}%";
						$stmt->bindParam(":key1", $keywords);
						$stmt->bindParam(":key2", $keywords);
						$stmt->execute();
                     // считаем для формирования страниц
						$total_rows = $stmt->rowCount();
						
						if ($total_rows>0 and $page==1 ) echo "<div class='alert alert-info'>Нашлось $total_rows шт</div>";
									
                    // выбрать все данные
                   // выбрать теперь для данной страницы
                   $query = "SELECT id,name, description,created_at,updated_at FROM notes  WHERE ( user_idd= '$user_idd' ) AND (name LIKE :key1 OR description LIKE :key2 ) ORDER BY name 
                       LIMIT :from_record_num, :records_per_page";
                          
                   $stmt = $conn->prepare($query);
                   // обработать
                   $keywords=htmlspecialchars(strip_tags($_GET['key']));
                   $keywords = "%{$keywords}%";
                   //связать данные
                   $stmt->bindParam(":key1", $keywords);
                   $stmt->bindParam(":key2", $keywords);
                   $stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INT);
                   $stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
                 
                   $stmt->execute();

                    // получим кол-во строк
                    $num = $stmt->rowCount();
                     
                    
                    display_html_search_form();
					echo "<a href='export_notes.php' class='btn btn-success pull-right m-b-1em m-r-1em'><span class='glyphicon glyphicon-save-file'></span> Экспортировать все заметки</a>";
                    echo "<a href='notes.php' class='btn btn-primary pull-right m-b-1em'><span class='glyphicon glyphicon-home'></span>Вернуться к Заметкам</a>";
                    echo "<div class='clearfix'></div>";

                    // проверить что нашлось больше 0 записей
                    if($num>0){
                        echo "<table class='table table-responsive table-bordered'>";
                        
                            //создаю таблицу
                            echo "<tr>";
                                echo "<th>Заголовок</th>";
                                echo "<th>Содержание</th>";
								echo "<th>Изменен</th>";
								echo "<th>Создан</th>";
                                echo "<th>Опции</th>";
                            echo "</tr>";
                            //получаю содержимое таблицы
							$i=1;
							$_SESSION['note_arr']= array();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                //  извлекаю строку
                                extract($row);
                                // создаю в таблице для каждой записи новую строку 
								echo "<tr>";
									$name= strlen($name) > 10 ? substr($name,0,10)."..." : $name;
                                    $descr= strlen($description) > 25 ? substr($description,0,25)."..." : $description;
                                    echo "<td>{$name}</td>";
                                    echo "<td>{$descr}</td>";
									echo "<td>{$updated_at}</td>";
									echo "<td>{$created_at}</td>";
                                    echo "<td>";
									$_SESSION['note_arr'][$i]= $id;
                                        //изменить/прочитать
                                        echo "<a href='update.php?note_id={$i}' class='btn btn-primary m-r-1em'><span class='glyphicon glyphicon-edit'></span> Изменить/прочитать</a>";
										//удалить 
                                        echo "<a href='#' onclick='delete_note({$i});'  class='btn btn-danger'><span class='glyphicon glyphicon-fire'></span> ИСПЕПЕЛИТЬ</a>";
									echo "</td>";
								echo "</tr>";
							  $i++;
                           }
                         
                        // заканчиваем таблицу
                        echo "</table>";
						$keywords=htmlspecialchars(strip_tags($_GET['key']));
                         $page_url="search.php?key={$keywords}&";
						 // делаем страницы
                         include_once "paging.php";
					
						}
						// не найдено записей
                    else{
                        echo "<div class='alert alert-danger'>ничего не найдено </div>";
						}
                    }
					else{
                        echo "<div class='alert alert-danger'>ничего не найдено </div>";
						echo "<a href='export_notes.php' class='btn btn-success pull-right m-b-1em m-r-1em'><span class='glyphicon glyphicon-save-file'></span> Экспортировать все заметки</a>";
						echo "<a href='notes.php' class='btn btn-primary pull-right m-b-1em'><span class='glyphicon glyphicon-home'></span>Вернуться к Заметкам</a>";
						echo "<div class='clearfix'></div>";
						}
					
            ?>
             
          <script type='text/javascript'>
		  $(document).ready(function () {
						window.setTimeout(function() {
							$(".alert").fadeTo(1000, 0).slideUp(1000, function(){
								$(this).remove(); 
							});
						}, 2000);
						 
						});
        // подтвердить удаление записи 
        function delete_note( i ){
             
            var answer = confirm('Вы в своем уме?');
            if (answer){
                // если да, передать id в delete.php и выполнить запрос
                window.location = 'delete.php?note_id=' + i;
            } 
        }
		 </script>
    <?php
        display_html_footer();
     ?>