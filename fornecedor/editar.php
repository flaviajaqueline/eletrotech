<?php
include("../conexao.php");
    $cnpj = $_GET['cnpj'] ?? '';
    if (!$cnpj) { header("Location: index.php"); exit; }
    $sql = mysqli_query($con, "SELECT * FROM fornecedor WHERE cnpj='$cnpj'");
    $f = mysqli_fetch_assoc($sql);
?>
<!doctype html>
<meta charset="utf-8">
<h1>Editar Fornecedor</h1>
<form method="post">
    Nome Fantasia:<br><input type="text" name="nome" value="<?php echo ($f['nome_fantasia']); ?>"><br><br>
    Categoria:<br><input type="text" name="cat" value="<?php echo ($f['categoria']); ?>"><br><br>
    Endereço:<br><input type="text" name="end" value="<?php echo ($f['endereco']); ?>"><br><br>
    Telefone:<br><input type="text" name="tel" value="<?php echo ($f['telefone']); ?>"><br><br>
    Email:<br><input type="email" name="email" value="<?php echo ($f['email']); ?>"><br><br>
<input type="submit" value="Salvar">
</form>
<br><a href="index.php">Voltar</a>
<?php
if ($_POST) {
    $n = $_POST['nome'];
    $cat = $_POST['cat'];
    $e = $_POST['end'];
    $t = $_POST['tel'];
    $em = $_POST['email'];

    mysqli_query($con, "UPDATE fornecedor SET
         nome_fantasia='$n',
         categoria='$cat',
         endereco='$e',
         telefone='$t',
         email='$em'
         WHERE cnpj='$cnpj'");

    echo "<p>Fornecedor atualizado!</p>";
}
?>
