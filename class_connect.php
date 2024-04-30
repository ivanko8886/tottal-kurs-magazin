<?php
$sqlhost='localhost';
$sqluser='root';
$sqlpass='';
$db='заводище'; // название созданной бд
$connection = @mysqli_connect( $sqlhost,$sqluser,$sqlpass,$db) or die("Нет соединения с БД");
mysqli_set_charset($connection, "utf8") or die("Не установлена кодировка соединения");



?>