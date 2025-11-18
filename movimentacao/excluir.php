<?php
include("../conexao.php");
$id = (int)($_GET['id'] ?? 0);
if ($id) {
    
    mysqli_query($con, "DELETE FROM movimentacao_estoque WHERE id_movimentacao = $id");
}
header("Location: index.php");
exit;
?>
