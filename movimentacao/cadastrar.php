<?php include("../conexao.php"); ?>
<!doctype html><meta charset="utf-8">
<h1>Registrar Movimentação</h1>
<form method="post">
Produto (SKU):<br>
<select name="sku" required>
  <option value="">-- selecione --</option>
<?php
$prod = mysqli_query($con, "SELECT sku, nome_produto, estoque_atual FROM produto ORDER BY nome_produto");
while ($p = mysqli_fetch_assoc($prod)) {
    echo "<option value='".$p['sku']."'>".$p['nome_produto']." (".$p['sku'].") - Estoque: ".$p['estoque_atual']."</option>";
}
?>
</select><br><br>

Tipo:<br>
<select name="tipo" required>
  <option value="Entrada">Entrada</option>
  <option value="Saida">Saida</option>
</select><br><br>

Quantidade:<br><input type="number" name="quant" min="1" required><br><br>

Data:<br><input type="date" name="data" value="<?php echo date('Y-m-d'); ?>" required><br><br>

<input type="submit" value="Registrar">
</form>
<br><a href="index.php">Voltar</a>

<?php
if ($_POST) {
    $sku = $_POST['sku'];
    $tipo = $_POST['tipo'];
    $quant = (int)$_POST['quant'];
    $data = $_POST['data'];

    $r = mysqli_fetch_assoc(mysqli_query($con, "SELECT estoque_atual FROM produto WHERE sku='$sku'"));
    if (!$r) { echo "<p>Produto não encontrado.</p>"; exit; }
    $estoque = (int)$r['estoque_atual'];

    if ($tipo == 'Saida' && $quant > $estoque) {
        echo "<p>Estoque insuficiente. Atual: $estoque</p>";
        exit;
    }


    if ($tipo == 'Entrada') {
        $novo = $estoque + $quant;
    } else {
        $novo = $estoque - $quant;
    }


    mysqli_query($con, "INSERT INTO movimentacao_estoque (sku_produto, tipo_movimentacao, quantidade, data_movimentacao)
        VALUES ('$sku', '$tipo', $quant, '$data')");


    mysqli_query($con, "UPDATE produto SET estoque_atual = $novo WHERE sku='$sku'");

    echo "<p>Movimentação registrada! Novo estoque: $novo</p>";
}
?>
