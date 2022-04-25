<?php
	echo "<ul class='pagination pull-left margin-zero mt0'>";
	// prev_ кнопка к 1 странице next_ кнопка к последней
	if($page>1){
	 
	    $prev_page =1;
	    echo "<li>";
	        echo "<a href='{$page_url}page={$prev_page}'>";
	            echo "<span style='margin:0 .5em;'>&laquo;</span>";
	        echo "</a>";
	    echo "</li>";
	}
	// гиперссыльные номера страниц
	// узнать общее кол-во страниц
	$total_pages = ceil($total_rows / $records_per_page);
	// сколько ссылок показывается range of num links to show
	$range = 1;
	//отобразить ссылки(кнопки) на другие страницы напротив текущей страницы 
	$initial_num = $page - $range;
	$condition_limit_num = ($page + $range)  + 1;
	for ($x=$initial_num; $x<$condition_limit_num; $x++) {
	    if (($x > 0) && ($x <= $total_pages)) {
	 
	        // текущая страница
	        if ($x == $page) {
	            echo "<li class='active'>";
	                echo "<a href='javascript::void();'>{$x}</a>";
	            echo "</li>";
	        }
	        // не текущая страница
	        else {
	            echo "<li>";
	                echo " <a href='{$page_url}page={$x}'>{$x}</a> ";
	            echo "</li>";
	        }
	    }
	}
	// кнопка-последняя страница
	if($page<$total_pages){
	    $next_page =$total_pages;
	    echo "<li>";
	        echo "<a href='{$page_url}page={$next_page}'>";
	            echo "<span style='margin:0 .5em;'>&raquo;</span>";
	        echo "</a>";
	    echo "</li>";
	}
	echo "</ul>";
?>