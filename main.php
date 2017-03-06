<?php
include_once 'setting.php';
session_start();
$CONNECT=mysqli_connect(HOST,USER,PASS, DB);
//проверка подключения с серверами

/*if ($CONNECT) echo 'ok';
else echo "error";     */
/*
//проверка подключения с серверами
if ($CONNECT) include ('page/login.php');
else echo "error";
*/
/*$mysql = @new mysqli('localhost','qwerty1415','qwerty1415', 'referat');
if (!$mysql){
    echo'lalalalala';
}*/
//для обмен передачи информации с файлами setting.php

if($_SERVER['REQUEST_URL'=='']){
    $Page='index';
    $Module='index';
}else{
    $URL_Path=parse_url($_SERVER['REQUEST_URL'=='/'], PHP_URL_PATH);
    $URL_Parts=explode('/', trim($URL_Path, '/'));
    $Page=array_shift($URL_Parts);
    $Module=array_shift($URL_Parts);
    
    
    if(!empty($Module)){
        $Param=array();
        for($i=0; $i<count($URL_Parts); $i++){
            $Param[$URL_Parts[$i]]=$URL_Parts[++$i];
        }
    }
}
 
if($Page=='index' and $Module=='index')  include 'index.php';
else if ($Page=='knig') include 'page/knig.php';
else if ($Page=='prez') include 'page/prez.php';
else if ($Page=='otch') include 'page/otch.php';
else if ($Page=='samo') include 'page/samo.php';
else if ($Page=='register') include 'page/register.php';
else if ($Page=='login') include 'page/login.php ';
else if ($Page=='account') include 'form/account.php ';




?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html: charset=utf-8" />
<meta name="keyword" content="referat, отчет, самоучител, книга,продажа рефератов"/>
<meta name="description" content="Здесь вы можете найти все рефераты"/>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="image/1.ico" rel="shortcut icon" type="image/x-icon"/>
<title>referat.kg</title>
<body >
<div id="page-wrap">
<header>
<a href="index.php" title="На главную" id="logo">Referat.kg</a>
<span class="contact" ><a href="page/about_as.php" title="Информация о нас">О нас</a></span>
<input  type="text" class="field" placeholder="Давай помогу найти"/>

<span class="right">
<span class="contact" ><a href="page/register.php" title="Регистрация">Регистрация</a></span>
<span class="contact" ><a href="page/login.php" title="Вход">Вход</a></span>
</span>
</header>
    <div class="clear"><br/></div>
    <center>
        <div id="menu">Разделы<hr/></div>
        <div id="menuHrefs">
            <a href="page/refe.php">Рефераты</a>
            <a href="page/prez.php">Презентации</a>
            <a href="page/otch.php">Отчеты</a>
            <a href="page/knig.php">Книги</a>
            <a href="page/samo.php">Самоучители</a>
        </div>
        <div id="wrapper">
                <div id="articles">
                <article>
                    <img src="image/1.jpg" alt="Изображение" title="Изображение"/>
                    <p><b>NEWS
              </b>
                    </p>
                </article>
                <article>
                    <img src="image/2.jpg" alt="Изображение" title="Изображение"/>
                    <p><b>
                            NEWS
                        </b></p>
                </article>
                <article>

                    <img src="image/3.jpg" alt="Изображение" title="Изображение"/>
                    <p><b>NEWS
                        </b></p>
                </article>
        </div>
        </div>
</div>
<footer>
<span class="left">Все правы защищены &copy 2016</span>
<span class="right">Социальные кнопки <img src="image/vk.png"  alt="группа в VK.COM" title="В контакте.ком"/></span>
</footer>
</body>
</head>
</html>
