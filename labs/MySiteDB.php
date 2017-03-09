<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$localhost = "localhost";
$db = "MySiteDB1";
$user = "admin1";
$password = "admin1";


$link = mysqli_connect($localhost, $user, $password) or trigger_error(mysql_error(),E_USER_ERROR);
//trigger_error выводит на страницу сообщение об ошибке. Первый параметр
- сообщение об ошибке
//в строковом виде, в данном случае возвращается функция  mysql_error(), второй - числовой код //ошибки(почти всегда используется значение константы E_USER_ERROR, равное 256)


//Следующие строки необходимы для того, чтобы MySQL воспринимал кириллицу.
//Параметры функции mysqli_query(): идентификатор соединения с сервером и запрос SQL


mysqli_query($link, "SET NAMES cp1251;") or die(mysql_error());
mysqli_query($link, "SET CHARACTER SET cp1251;") or die(mysql_error());

echo"Operation is successful"
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
