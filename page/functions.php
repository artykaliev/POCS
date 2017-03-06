<?php
              function Download(){}
function HeaderHead($Title){
    echo '
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html: charset=utf-8" />
<meta name="keyword" content="referat, отчет, самоучител, книга,продажа рефератов"/>
<meta name="description" content="Здесь вы можете найти все рефераты"/>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../image/1.ico" rel="shortcut icon" type="image/x-icon"/>
<title>'.$Title.'</title>
<body >
<div id="page-wrap">
<header>
<a href="../index.php" title="На главную" id="logo">Referat.kg</a>
<span class="contact" ><a href="about_as.php" title="Информация о нас">О нас</a></span>
<input  type="text" class="field" placeholder="Давай помогу найти"/>
<span class="right">
<span class="contact" ><a href="register.php" title="Регистрация">Регистрация</a></span>
<span class="contact" ><a href="login.php" title="Вход">Вход</a></span>
</span>
</header>
';
}
function CenterMenu($Title){
    echo '
 <div class="clear"><br/></div>
    <center>
        <div id="menu">'.$Title.'<hr/></div>
        <div id="menuHrefs">
            <a href="refe.php">Рефераты</a>
            <a href="prez.php">Презентации</a>
            <a href="otch.php">Отчеты</a>
            <a href="knig.php">Книги</a>
            <a href="samo.php">Самоучители</a>
        </div>
    </center>';
}

function FooterFoot(){
    echo'
<footer>
<span class="left">Все правы защищены &copy 2016</span>
<span class="right">Социальные кнопки <img src="../image/vk.png"  alt="группа в VK.COM" title="В контакте.ком"/></span>
</footer>
</body>
</head>
</html>';
}
//шифрование пароля
function GenPass($a,$b){
    return md5('baha'.md5('321'.$a.'123').md5('989'.$b.'564'));
}
//для лишных пробелов и знаков
function FormChars($qwer){
    return n12br(htmlspecialchars(trim($qwer),ENT_QUOTES),false);
}
?>
