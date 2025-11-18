<?php include("../conexao.php"); ?>
<!doctype html><meta charset="utf-8">
<h1>Movimentações de Estoque</h1>
<a href="cadastrar.php">Registrar Movimentação</a><br><br>

<table border="1" cellpadding="5">
<tr><th>ID</th><th>SKU</th><th>Tipo</th><th>Quantidade</th><th>Data</th><th>Ações</th></tr>
<?php
$res = mysqli_query($con, "SELECT * FROM movimentacao_estoque ORDER BY data_movimentacao DESC, id_movimentacao DESC");
while ($m = mysqli_fetch_assoc($res)) {
    echo "<tr>
      <td>".$m['id_movimentacao']."</td>
      <td>".$m['sku_produto']."</td>
      <td>".$m['tipo_movimentacao']."</td>
      <td>".$m['quantidade']."</td>
      <td>".$m['data_movimentacao']."</td>
      <td><a href='excluir.php?id=".$m['id_movimentacao']."' onclick=\"return confirm('Remover movimentação?')\">Excluir</a></td>
    </tr>";
}
?>
</table>
<br><a href="../index.php">Voltar ao Menu</a>
