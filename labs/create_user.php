<?php
//Создать соединение с сервером
$link = mysqli_connect ("localhost", "root", "");
if ($link) {
	echo "Соединение с сервером установлено", "<br>";
} else {
	echo "Нет соединения с сервером";         }
$query = "CREATE USER 'admin1'@'localhost' IDENTIFIED BY 'admin1';
GRANT ALL PRIVILEGES ON *.* TO 'admin1'@'localhost' IDENTIFIED BY 'admin1'
WITH GRANT OPTION";
if($query){echo "Пользователь создано!";}
else{echo "Пользователь не создано!";}

?>
