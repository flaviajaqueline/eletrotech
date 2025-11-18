<?php include("../conexao.php"); ?>
<!doctype html><meta charset="utf-8">
<h1>Categorias</h1>
<a href="cadastrar.php">Nova Categoria</a><br><br>

<table border="1" cellpadding="5">
<tr><th>ID</th><th>Nome</th><th>Ações</th></tr>
<?php
$res = mysqli_query($con, "SELECT * FROM categoria ORDER BY nome_categoria ASC");
while ($r = mysqli_fetch_assoc($res)) {
    echo "<tr>
      <td>".$r['id_categoria']."</td>
      <td>".$r['nome_categoria']."</td>
      <td>
        <a href='editar.php?id=".$r['id_categoria']."'>Editar</a> |
        <a href='excluir.php?id=".$r['id_categoria']."' onclick=\"return confirm('Excluir categoria?')\">Excluir</a>
      </td>
    </tr>";
}
?>
</table>
<br><a href="../index.php">Voltar</a>
