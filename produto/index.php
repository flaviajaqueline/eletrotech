<?php include("../conexao.php"); ?>
<!doctype html><meta charset="utf-8">
<h1>Produtos</h1>
<a href="cadastrar.php">Novo Produto</a><br><br>

<table border="1" cellpadding="5">
<tr><th>SKU</th><th>Nome</th><th>Preço Venda</th><th>Estoque</th><th>Categoria</th><th>Fornecedor</th><th>Ações</th></tr>
<?php
$sql = "SELECT p.*, c.nome_categoria, f.nome_fantasia
        FROM produto p
        LEFT JOIN categoria c ON p.id_categoria = c.id_categoria
        LEFT JOIN fornecedor f ON p.cnpj_fornecedor = f.cnpj
        ORDER BY p.nome_produto ASC";
$res = mysqli_query($con, $sql);
while ($p = mysqli_fetch_assoc($res)) {
    echo "<tr>
      <td>".$p['sku']."</td>
      <td>".$p['nome_produto']."</td>
      <td>".$p['preco_venda']."</td>
      <td>".$p['estoque_atual']."</td>
      <td>".($p['nome_categoria'] ?? '')."</td>
      <td>".($p['nome_fantasia'] ?? '')."</td>
      <td>
        <a href='editar.php?sku=".$p['sku']."'>Editar</a> |
        <a href='excluir.php?sku=".$p['sku']."' onclick=\"return confirm('Excluir produto?')\">Excluir</a>
      </td>
    </tr>";
}
?>
</table>
<br><a href="../index.php">Voltar ao Menu</a>
