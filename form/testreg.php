<?php
session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password); //удаляем лишние пробелы
$login = trim($login);
$password = trim($password);

// заменяем новым********************************************
// подключаемся к базе
include ("bd.php");// файл bd.php должен быть в той    же папке, что и все остальные, если это не так, то просто измените путь
// минипроверка на подбор паролей

$ip=getenv("HTTP_X_FORWARDED_FOR");
if (empty($ip) || $ip=='unknown') {    $ip=getenv("REMOTE_ADDR"); }//извлекаем ip
mysqli_query ("DELETE FROM oshibka WHERE UNIX_TIMESTAMP() -    UNIX_TIMESTAMP(date) > 900");//удаляем ip-адреса ошибавшихся при входе пользователей через 15 минут.
$result = mysqli_query("SELECT col FROM oshibka WHERE    ip='$ip'",$db);// извлекаем из базы количество неудачных попыток входа за    последние 15 у пользователя с данным ip
$myrow = mysqli_fetch_array($result);

if ($myrow['col'] > 2) {
    //если ошибок больше двух, т.е три, то выдаем сообщение.
    exit("Вы набрали логин или пароль неверно 3 раз. Подождите    15 минут до следующей попытки.");
}
$password    = md5($password);//шифруем пароль
$password    = strrev($password);// для надежности добавим реверс
$password    = $password."b3p6f";

//можно добавить несколько своих символов по вкусу, например,    вписав "b3p6f". Если этот пароль будут взламывать методом подбора у    себя на сервере этой же md5,то явно ничего хорошего не    выйдет. Но советую ставить другие символы, можно в начале строки или в    середине.
//При этом необходимо увеличить длину поля password в базе. Зашифрованный пароль может получится гораздо большего    размера.


$result = mysqli_query("SELECT * FROM    users WHERE login='$login' AND    password='$password'",$db); //извлекаем из базы все данные о пользователе с    введенным логином и паролем
$myrow    = mysqli_fetch_array($result);
if (empty($myrow['id']))
{
    //если пользователя с введенным логином и паролем не    существует
    //Делаем запись о том, что данный ip не смог войти.
    $select = mysqli_query ("SELECT ip FROM oshibka WHERE    ip='$ip'");
    $tmp = mysqli_fetch_row ($select);
    if ($ip == $tmp[0]) {//проверяем, есть ли пользователь в таблице "oshibka"
        $result52 = mysqli_query("SELECT col FROM oshibka WHERE    ip='$ip'",$db);
        $myrow52 = mysqli_fetch_array($result52);
        $col = $myrow52[0] + 1;//прибавляем    еще одну попытку неудачного входа
        mysqli_query ("UPDATE oshibka SET col=$col,date=NOW() WHERE    ip='$ip'");
    }
    else {
        mysqli_query ("INSERT INTO oshibka (ip,date,col) VALUES    ('$ip',NOW(),'1')");
        //если за последние 15 минут ошибок не было, то вставляем    новую запись в таблицу "oshibka"
    }

    exit ("Извините, введённый    вами логин или пароль неверный.");
}
else {
    nbsp;         //если пароли    совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['password']=$myrow['password'];
    $_SESSION['login']=$myrow['login'];

    $_SESSION['id']=$myrow['id'];//эти    данные очень часто используются, вот их и будет "носить с собой"    вошедший пользователь

    //Далее мы запоминаем данные в куки, для последующего входа.
    //ВНИМАНИЕ!!! ДЕЛАЙТЕ ЭТО НА ВАШЕ УСМОТРЕНИЕ, ТАК КАК ДАННЫЕ ХРАНЯТСЯ    В КУКАХ БЕЗ ШИФРОВКИ

    if ($_POST['save'] == 1) {
        //Если пользователь хочет, чтобы его данные сохранились для    последующего входа, то сохраняем в куках его браузера
        setcookie("login",    $_POST["login"], time()+9999999);
        setcookie("password",    $_POST["password"], time()+9999999);
    }}
echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=index.php'></head></html>";
//перенаправляем пользователя на главную страничку, там    ему и сообщим об удачном входе
?>