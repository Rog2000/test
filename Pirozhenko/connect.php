<?php
	$mysqli = new mysqli('localhost', 'root', '', 'rog20921_test');
	if (mysqli_connect_errno()) { 
		printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error()); 
		exit; 
	}
	$mysqli->set_charset('utf8');
?>
