<?php
include("../conexao.php");
$sku = $_GET['sku'] ?? '';
if ($sku) {
    
    mysqli_query($con, "DELETE FROM produto WHERE sku='$sku'");
}
header("Location: index.php");
exit;
?>
