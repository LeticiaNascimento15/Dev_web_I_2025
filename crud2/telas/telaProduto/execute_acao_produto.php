<?php
include("../../service/produto.service.php");

$acao = $_POST['acao'];
$nome = $_POST['nome'] ?? null;
$preco = $_POST['preco'] ?? null;
$estoque = $_POST['estoque'] ?? null;
$id = $_POST['id'] ?? null;

if ($acao == "cadastrar") {
    cadastrarProduto($nome, $preco, $estoque);
    echo "Produto cadastrado com sucesso!";
} elseif ($acao == "alterar") {
    alterarProduto($id, $nome, $preco, $estoque);
    echo "Produto alterado com sucesso!";
} elseif ($acao == "remover") {
    removerProduto($id);
    echo "Produto removido com sucesso!";
}
?>
