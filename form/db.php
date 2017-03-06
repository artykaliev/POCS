<?php
include_once 'setting.php';
session_start();
$CONNECT=mysqli_connect(HOST,USER,PASS, DB);

        $db = mysqli_connect ("HOST","USER","PASS");
        mysqli_select_db ("DB",$db);
        ?>
?>