<?php
include("../conexao.php");
    $id = (int)($_GET['id'] ?? 0);
    if (!$id) { header("Location: index.php"); exit; }
    $r = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM categoria WHERE id_categoria=$id"));
?>
<!doctype html><meta charset="utf-8">
<h1>Editar Categoria</h1>
<form method="post">
    Nome:<br><input type="text" name="nome" value="<?php echo ($r['nome_categoria']); ?>"><br><br>
<input type="submit" value="Salvar">
</form>
<br><a href="index.php">Voltar</a>
<?php
if ($_POST) {
    $n = $_POST['nome'];
    mysqli_query($con, "UPDATE categoria SET nome_categoria='$n' WHERE id_categoria=$id");
    echo "<p>Categoria atualizada!</p>";
}
?>