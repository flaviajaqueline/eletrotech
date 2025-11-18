<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "eletrotech";

$con = mysqli_connect($host, $user, $pass, $db);
if (!$con) {
    die("Erro ao conectar: " . mysqli_connect_error());
}
mysqli_set_charset($con, "utf8");
?>
