<?php
include("../conexao.php");
$sku = $_GET['sku'] ?? '';
if (!$sku) { header("Location: index.php"); exit; }
$p = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM produto WHERE sku='$sku'"));
?>
<!doctype html><meta charset="utf-8">
<h1>Editar Produto</h1>
<form method="post">
    Nome:<br><input type="text" name="nome" value="<?php echo ($p['nome_produto']); ?>"><br><br>
    Descrição:<br><textarea name="descricao"><?php echo ($p['descricao']); ?></textarea><br><br>
    Preço custo:<br><input type="number" step="0.01" name="pcusto" value="<?php echo $p['preco_custo']; ?>"><br><br>
    Preço venda:<br><input type="number" step="0.01" name="pvenda" value="<?php echo $p['preco_venda']; ?>"><br><br>
    Estoque atual:<br><input type="number" name="estoque" value="<?php echo $p['estoque_atual']; ?>"><br><br>
    Categoria:<br>
<select name="categoria">
  <option value="">-- nenhum --</option>
<?php
$cats = mysqli_query($con, "SELECT * FROM categoria ORDER BY nome_categoria");
while ($c = mysqli_fetch_assoc($cats)) {
    $sel = $p['id_categoria']==$c['id_categoria'] ? "selected" : "";
    echo "<option value='".$c['id_categoria']."' $sel>".$c['nome_categoria']."</option>";
}
?>
</select><br><br>
Fornecedor:<br>
<select name="fornecedor">
  <option value="">-- nenhum --</option>
<?php
$for = mysqli_query($con, "SELECT cnpj, nome_fantasia FROM fornecedor ORDER BY nome_fantasia");
while ($f = mysqli_fetch_assoc($for)) {
    $sel = $p['cnpj_fornecedor']==$f['cnpj'] ? "selected" : "";
    echo "<option value='".$f['cnpj']."' $sel>".$f['nome_fantasia']." (".$f['cnpj'].")</option>";
}
?>
</select><br><br>
<input type="submit" value="Salvar">
</form>
<br><a href="index.php">Voltar</a>
<?php
if ($_POST) {
    $nome =$_POST['nome'];
    $desc = $_POST['descricao'];
    $pc = (float)$_POST['pcusto'];
    $pv = (float)$_POST['pvenda'];
    $est = (int)$_POST['estoque'];
    $cat = $_POST['categoria'] !== '' ? (int)$_POST['categoria'] : "NULL";
    $forn = $_POST['fornecedor'] !== '' ? $_POST['fornecedor'] : "NULL";

    $cat_sql = $cat === "NULL" ? "NULL" : $cat;
    $forn_sql = $forn === "NULL" ? "NULL" : "'$forn'";

    mysqli_query($con, "UPDATE produto SET
        nome_produto='$nome',
        descricao='$desc',
        preco_custo=$pc,
        preco_venda=$pv,
        estoque_atual=$est,
        id_categoria=$cat_sql,
        cnpj_fornecedor=$forn_sql
        WHERE sku='$sku'");

    echo "<p>Produto atualizado!</p>";
}
?>
