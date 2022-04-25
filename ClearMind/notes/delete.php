<?php
session_start();
// подключаю бд
include '../config/database.php';
    try {
        // получаем  ID записи
        // isset() проверяет есть значение или нет
		$i=isset($_GET['note_id']) ? $_GET['note_id'] : die('Ошибка:  id не найден.');
		$id=$_SESSION['note_arr'][$i];
		$user_idd=isset($_SESSION['valid_id']) ? $_SESSION['valid_id'] : die('Ошибка:  user не найден.');
        // удаление
        $query = "DELETE FROM notes WHERE user_idd= '$user_idd' and id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $id);
        if($stmt->execute()){
            // перенаправить к странице записей и оповестить об удалении записи 
			header('Location: notes.php?action=deleted');
        }else{
            die('не получается удалить запись');
        }
    }
    // показать ошибку
    catch(PDOException $exception){
        die('Ошибка: ' . $exception->getMessage());
    }
?>