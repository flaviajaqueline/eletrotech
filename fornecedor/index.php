<?php
include("../conexao.php");
?>
<!doctype html>
<meta charset="utf-8">
<h1>Fornecedores</h1>
<a href="cadastrar.php">Novo Fornecedor</a><br><br>

<table border="1" cellpadding="5">
<tr><th>CNPJ</th><th>Nome</th><th>Categoria</th><th>Telefone</th><th>Email</th><th>Ações</th></tr>
<?php
$sql = mysqli_query($con, "SELECT * FROM fornecedor ORDER BY nome_fantasia ASC");
while ($f = mysqli_fetch_assoc($sql)) {
    echo "<tr>
      <td>".$f['cnpj']."</td>
      <td>".$f['nome_fantasia']."</td>
      <td>".$f['categoria']."</td>
      <td>".$f['telefone']."</td>
      <td>".$f['email']."</td>
      <td>
        <a href='editar.php?cnpj=".$f['cnpj']."'>Editar</a> |
        <a href='excluir.php?cnpj=".$f['cnpj']."' onclick=\"return confirm('Excluir fornecedor?')\">Excluir</a>
      </td>
    </tr>";
}
?>
</table>
<br><a href="../index.php">Voltar ao Menu</a>
