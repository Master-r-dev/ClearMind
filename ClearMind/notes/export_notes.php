<?php 
	session_start();
	header('Content-Type: text/csv; charset=utf8_general_mysql500_ci');  
    header('Content-Disposition: attachment; filename=notes.csv');  
     // соеденение к бд
     include_once '../config/database.php';
	 $user_idd=isset($_SESSION['valid_id']) ? $_SESSION['valid_id'] : die('Ошибка:  user не найден.');
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Заголовок', 'Содержание'));  
	try {
		$query = "SELECT name, description FROM notes WHERE user_idd= '$user_idd' ORDER BY name DESC";  
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$num  = $stmt->rowCount();

		if($num>0)  {
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))  
			{  
			     fputcsv($output, $row);  
			}  
		}
		
	} catch (Exception $e) {

		echo "Ошибка : " .$e->getMessage();
	}
	  fclose($output);  
 ?>