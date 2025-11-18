<?php
include("../conexao.php");
$cnpj = $_GET['cnpj'] ?? '';
if ($cnpj) {

    mysqli_query($con, "DELETE FROM fornecedor WHERE cnpj='$cnpj'");
}
header("Location: index.php");
exit;
?>
