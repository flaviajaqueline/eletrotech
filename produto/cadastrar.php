<?php include("../conexao.php"); ?>
<!doctype html><meta charset="utf-8">
<h1>Novo Produto</h1>
<form method="post">
    SKU:<br><input type="text" name="sku" required><br><br>
    Nome do produto:<br><input type="text" name="nome" required><br><br>
    Descrição:<br><textarea name="descricao"></textarea><br><br>
    Preço custo:<br><input type="number" step="0.01" name="pcusto"><br><br>
    Preço venda:<br><input type="number" step="0.01" name="pvenda"><br><br>
    Estoque inicial:<br><input type="number" name="estoque" value="0"><br><br>
    Categoria:<br>
<select name="categoria">
  <option value="">-- nenhum --</option>
<?php
$cats = mysqli_query($con, "SELECT * FROM categoria ORDER BY nome_categoria");
while ($c = mysqli_fetch_assoc($cats)) {
    echo "<option value='".$c['id_categoria']."'>".$c['nome_categoria']."</option>";
}
?>
</select><br><br>
Fornecedor:<br>
<select name="fornecedor">
  <option value="">-- nenhum --</option>
<?php
$for = mysqli_query($con, "SELECT cnpj, nome_fantasia FROM fornecedor ORDER BY nome_fantasia");
while ($f = mysqli_fetch_assoc($for)) {
    echo "<option value='".$f['cnpj']."'>".$f['nome_fantasia']." (".$f['cnpj'].")</option>";
}
?>
</select><br><br>
<input type="submit" value="Salvar">
</form>
<br><a href="index.php">Voltar</a>

<?php
if ($_POST) {
    $sku =  $_POST['sku'];
    $nome = $_POST['nome'];
    $desc = $_POST['descricao'];
    $pc = (float)$_POST['pcusto'];
    $pv = (float)$_POST['pvenda'];
    $est = (int)$_POST['estoque'];
    $cat = $_POST['categoria'] !== '' ? (int)$_POST['categoria'] : "NULL";
    $forn = $_POST['fornecedor'] !== '' ? $_POST['fornecedor'] : "NULL";

    $cat_sql = $cat === "NULL" ? "NULL" : $cat;
    $forn_sql = $forn === "NULL" ? "NULL" : "'$forn'";

    mysqli_query($con, "INSERT INTO produto (sku, nome_produto, descricao, preco_custo, preco_venda, estoque_atual, id_categoria, cnpj_fornecedor)
        VALUES ('$sku', '$nome', '$desc', $pc, $pv, $est, $cat_sql, $forn_sql)");

    echo "<p>Produto cadastrado!</p>";
}
?>
