<?php
		function display_html_header($title,$conn){
		?>
			<!DOCTYPE HTML>
			<html>
			    <head>
			        <title> <?php echo $title; ?> </title>
			        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />
			    </head>
			    <body>
				<style type="text/css">
				p { color: white; }
				h1 { color: white; }
				tr { color: white; }
				</style>
				<style>
				body{
				background-color: black ;
				background-image: url('http://clearmind/libs/images/11.jpg') ;
				background-attachment: fixed;
				background-size: cover;
				}
				</style>
			     	<?php 
			     		display_html_navigation($conn);
			     	 ?>
			        <!--контейнер -->
			        <div class="container">
			            <div class="page-header">
			                <h1><i><?php echo $title; ?></i></h1>
			            </div>
		<?php
	}
	function display_html_footer(){
		?>
			   </div> <!-- конец контейнера -->
			    <!-- нужно для java plugins-->
			    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
			    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			    </body>
			</html>
		<?php
	}
	function display_html_navigation($conn){
		?>
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul class="nav navbar-nav">
			       	 <li class="unactive"><a href='layout_logout.php'>Сменить пользователя</a></li>
					 <li class="active"><a href='notes.php'>Clear Mind</a></li>
			      </ul>
			    </div>
			  </div>
			</nav>
		<?php
	}
	function display_html_search_form(){
		// поиск
	?>
		<form class="navbar-form pull-left" action="search.php" method = "get">
		    <div class="input-group m-b-1em">
		        <input type="text" class="form-control" name="key" placeholder="Поиск">
		        <div class="input-group-btn">
		            <button class="btn btn-primary" type="submit">
		               <span class='glyphicon glyphicon-sunglasses'></span> Поиск </button>
		        </div>
		    </div>
		</form>
		<?php
	}
	function display_html_create_form_notes($nameErr,$desErr){
		?>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
			    <table class='table  table-responsive table-bordered'>
			        <tr>
			            <td>Заголовок</td>
			            <td><input type='text' name='name' class='form-control' />
			            	<span class ="has-error"><?php if ($nameErr!="") echo "<div class='alert alert-danger'> {$nameErr}</div>";  ?></span>
			            </td>
			        </tr>
			        <tr>
			            <td>Содержание</td>
			            <td><textarea name='description' class='form-control'></textarea>
			            	<span class ="has-error"><?php if ($desErr!="")   echo"<div class='alert alert-danger'> {$desErr}</div>" ; ?></span>
			            </td>
			        </tr>
			        <tr>
			            <td> 
							<a href='notes.php' class='btn btn-primary pull-right m-b-1em'><span class='glyphicon glyphicon-list'></span> Все заметки</a>
						</td>
			            <td>
			                <button type='submit'  class='btn btn-primary' > <span class='glyphicon glyphicon-thumbs-up'></span> Создать </button>
			            </td>
			        </tr>
			    </table>
			</form>
		<?php
	}
	function display_html_update_form_notes($row,$nameErr,$desErr){
		?>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?note_id={$_GET['note_id']}");?>" method="post">
				<table class='table  table-responsive table-bordered'>
					<tr>
						<td>Заголовок</td>
						<td><input type='text' name='name' value="<?php echo htmlspecialchars($row['name'], ENT_QUOTES);  ?>" class='form-control' /></td>
							<span class ="has-error"><?php  if ($nameErr!="") echo "<div class='alert alert-danger'> {$nameErr}</div>";  ?></span>
					</tr>
					<tr>
						<td>Содержание</td>
						<td><textarea name='description' class='form-control'><?php echo htmlspecialchars($row['description'], ENT_QUOTES);  ?></textarea>
							<span class ="has-error"><?php if ($desErr!="") echo"<div class='alert alert-danger'> {$desErr}</div>" ;?></span>
						</td>
					</tr>
					<tr>
						<td>
							<a href='notes.php' class='btn btn-primary pull-right m-b-1em'><span class='glyphicon glyphicon-list'></span> Все заметки</a>
						</td>
						<td>
							<button type='submit'  class='btn btn-primary' ><span class='glyphicon glyphicon-flash'> </span> Изменить </button>
							
						</td>
					</tr>
				</table>
			</form>
		<?php
	}

?>