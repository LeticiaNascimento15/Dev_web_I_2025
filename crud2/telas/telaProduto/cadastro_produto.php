<?php
include("../../service/produto_service.php");

$id = $_GET['id'] ?? null;
$remover = $_GET['remover'] ?? null;

if ($remover && $id) {
    removerProduto($id);
    header("Location: cadastro_produto.php");
    exit;
}

if ($_POST) {
    if ($id) {
        alterarProduto($id, $_POST['nome'], $_POST['preco'], $_POST['estoque']);
    } else {
        cadastrarProduto($_POST['nome'], $_POST['preco'], $_POST['estoque']);
    }
    header("Location: cadastro_produto.php");
    exit;
}

$produto = $id ? pegaProdutoPeloId($id) : null;
?>

<h2>Cadastro de Produtos</h2>
<form method="post">
    Nome: <input type="text" name="nome" value="<?= $produto->nome ?? '' ?>"><br>
    Preço: <input type="number" step="0.01" name="preco" value="<?= $produto->preco ?? '' ?>"><br>
    Estoque: <input type="number" name="estoque" value="<?= $produto->estoque ?? '' ?>"><br>
    <button type="submit"><?= $id ? 'Alterar' : 'Cadastrar' ?></button>
</form>

<hr>
<h3>Lista de Produtos</h3>
<?php listarProduto(""); ?>
