<?php include("../conexao.php"); ?>
<!doctype html>
<meta charset="utf-8">
<h1>Novo Fornecedor</h1>
<form method="post">
    CNPJ:<br><input type="text" name="cnpj" required><br><br>
    Nome Fantasia:<br><input type="text" name="nome" required><br><br>
    Categoria:<br><input type="text" name="cat"><br><br>
    Endereço:<br><input type="text" name="end"><br><br>
    Telefone:<br><input type="text" name="tel"><br><br>
    Email:<br><input type="email" name="email"><br><br>
<input type="submit" value="Salvar">
</form>
<br><a href="index.php">Voltar</a>

<?php
if ($_POST) {
    $c = $_POST['cnpj'];
    $n = $_POST['nome'];
    $cat = $_POST['cat'];
    $e = $_POST['end'];
    $t = $_POST['tel'];
    $em = $_POST['email'];

    mysqli_query($con, "INSERT INTO fornecedor (cnpj,nome_fantasia,categoria,endereco,telefone,email)
        VALUES ('$c', '$n', '$cat', '$e', '$t', '$em')");

    echo "<p>Fornecedor cadastrado!</p>";
}
?>
