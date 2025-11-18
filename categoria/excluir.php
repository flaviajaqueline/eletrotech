<?php
include("../conexao.php");
$id = (int)($_GET['id'] ?? 0);
if ($id) {

    mysqli_query($con, "UPDATE produto SET id_categoria = NULL WHERE id_categoria = $id");
    mysqli_query($con, "DELETE FROM categoria WHERE id_categoria = $id");
}
header("Location: index.php");
exit;
?>
