<?php

include ('functions.php');
HeaderHead('Регистрация');
CenterMenu('Регистрация');
?>
    <b>Заполните форму </b>
    <form  action="../page/account.php" method="post" id="form" enctype="multipart/form-data">
        <br><input type="text" name="login" id="input" placeholder="Логин:" >
        <br>
        <input type="password" name="password" id="input" placeholder="Пароль:" required>
        <br>
        <input type="password" name="password1" id="input" placeholder="Пароль:" required>
        <br>
        <input type="text" name="name" id="input" placeholder="Имя:" required>
        <br>
        <input type="text" name="surname" id="input"  placeholder="Фамилия:" required>
        <br>День рождения:</br>
        <input type="date" name="birthday" id="input"  required>
        <br>
        <input type="email" name="email" id="input" placeholder="Эл-почта:" required>
        <br>
        <input type="tel" name="phone"  id="input" placeholder="Телефон:" required>
        <br>Фото:</br>
       <input type="file" name="fupload" id="input"  >
        <br><br>
        <input type="submit" name="enter" value="Регистрация">
        <input type="reset" value="Очистить">
</form>
<?php
    FooterFoot();
?>

