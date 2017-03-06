<?php
//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
session_start();

include ('functions.php');
HeaderHead('Вход');
CenterMenu('Вход');
?>

<b>Заполните форму </b>
<br>
<br>
<form  action="../form/testreg.php" method="post">

    <input type="text" name="login" id="input" placeholder="Логин:" >
    <input type="password" name="password"  id="input" placeholder="Пароль:">
    <br><br><input type="submit" name="enter" value="Вход">
    <input type="reset" value="Oчистить">
</form>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br><br>
<br><br>





<?php

// Проверяем, пусты ли переменные логина и id пользователя
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
    // Если пусты, то мы не выводим ссылку
    echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
}
else
{

    // Если не пусты, то мы выводим ссылку
    echo "Вы вошли на сайт, как ".$_SESSION['login']."<br><a  href='http://tvpavlovsk.sk6.ru/'>Эта ссылка доступна только  зарегистрированным пользователям</a>";
}
?>
FooterFoot();
?>

