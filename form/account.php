<?php
include ('../setting.php');
include ('../page/functions.php');
if ($Module=='page/register.php' or $Page=='register.php'and $_POST['enter']) {
    $_POST['login'] = FormChars($_POST['login']);
    $_POST['password'] = GenPass(FormChars($_POST['password']),$_POST['login']);
   // $_POST['password'] = FormChars($_POST['password1']);
    $_POST['name'] = FormChars($_POST['name']);
    $_POST['surname'] = FormChars($_POST['surname']);
    $_POST['birtday'] = FormChars($_POST['birtday']);
    $_POST['email'] = FormChars($_POST['email']);
    $_POST['phone'] = FormChars($_POST['phone']);
    $_POST['avatar'] = FormChars($_POST['avatar']);
    $_POST['avatar']=0;

    if (!$_POST['login'] or !$_POST['password'] or !$_POST['name'] or !$_POST['surname'] or !$_POST['birthday'] or !$_POST['email'] or !$_POST['phone']){
        exit("Ощибка валидации формы");
    }
        $Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT 'login' FROM 'users' WHERE 'login'='$_POST[login]'"));
        if ($Row['login']) {
            exit('Логин <b>'.$_POST['login'].'</b>уже мспользуеться');
        }
        $Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT 'email' FROM 'users' WHERE 'email'='$_POST[email]'"));
        if ($Row['email']) {
            exit('E-mail <b>' . $_POST['email'] . '</b>уже мспользуеться');
        }

        mysqli_query($CONNECT,"INSERT INTO 'users' VALUES('', '$_POST[login]','$_POST[password]','$_POST[name]','$_POST[surname]','$_POST[birthday]','$_POST[email]','$_POST[phone]',NOV(),'$_POST[avatar]')");
echo "okerer";
}


/*
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
// подключаемся к базе
include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
// проверка на существование пользователя с таким же логином
$result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}
// если такого нет, то сохраняем данные
$result2 = mysql_query ("INSERT INTO users (login,password) VALUES('$login','$password')");
// Проверяем, есть ли ошибки
if ($result2=='TRUE')
{
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
}
else {
    echo "Ошибка! Вы не зарегистрированы.";
}*/
?>