<?php
include("../../service/venda_service.php");

$id = $_GET['id'] ?? null;
$remover = $_GET['remover'] ?? null;

if ($remover && $id) {
    removerVenda($id);
    header("Location: cadastro_venda.php");
    exit;
}

if ($_POST) {
    if ($id) {
        alterarVenda($id, $_POST['idCliente'], $_POST['idProduto'], $_POST['quantidade'], $_POST['valorTotal']);
    } else {
        cadastrarVenda($_POST['idCliente'], $_POST['idProduto'], $_POST['quantidade'], $_POST['valorTotal']);
    }
    header("Location: cadastro_venda.php");
    exit;
}

$venda = $id ? pegaVendaPeloId($id) : null;
?>

<h2>Cadastro de Vendas</h2>
<form method="post">
    ID Cliente: <input type="number" name="idCliente" value="<?= $venda->idCliente ?? '' ?>"><br>
    ID Produto: <input type="number" name="idProduto" value="<?= $venda->idProduto ?? '' ?>"><br>
    Quantidade: <input type="number" name="quantidade" value="<?= $venda->quantidade ?? '' ?>"><br>
    Valor Total: <input type="number" step="0.01" name="valorTotal" value="<?= $venda->valorTotal ?? '' ?>"><br>
    <button type="submit"><?= $id ? 'Alterar' : 'Cadastrar' ?></button>
</form>

<hr>
<h3>Lista de Vendas</h3>
<?php listarVenda(""); ?>
