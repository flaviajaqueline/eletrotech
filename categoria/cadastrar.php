<?php include("../conexao.php"); ?>
<!doctype html><meta charset="utf-8">
<h1>Nova Categoria</h1>
<form method="post">
    Nome da Categoria:<br><input type="text" name="nome" required><br><br>
<input type="submit" value="Salvar">
</form>
<br><a href="index.php">Voltar</a>
<?php
if ($_POST) {
    $n = $_POST['nome'];
    mysqli_query($con, "INSERT INTO categoria (nome_categoria) VALUES ('$n')");
    echo "<p>Categoria adicionada!</p>";
}
?>
