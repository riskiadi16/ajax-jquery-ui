<?php
/* Dengan asumsi Anda menggunakan pengaturan default server MySQL Anda yang sedang
berjalan di mana pengguna db adalah 'root' tanpa kata sandi */
define('DB_SERVER', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD', '');
define('DB_NAME', 'crud_jqueryajax');
/* connect to database */
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//to check connection
if($connection === false){
 die("ERROR : can not connect to database. Check error here" . mysqli_connect_error());
}
?>