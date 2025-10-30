<?php
include("../../service/venda.service.php");

$acao = $_POST['acao'];
$id_cliente = $_POST['id_cliente'] ?? null;
$id_produto = $_POST['id_produto'] ?? null;
$quantidade = $_POST['quantidade'] ?? null;
$id = $_POST['id'] ?? null;

if ($acao == "cadastrar") {
    cadastrarVenda($id_cliente, $id_produto, $quantidade);
    echo "Venda cadastrada com sucesso!";
} elseif ($acao == "alterar") {
    alterarVenda($id, $id_cliente, $id_produto, $quantidade);
    echo "Venda alterada com sucesso!";
} elseif ($acao == "remover") {
    removerVenda($id);
    echo "Venda removida com sucesso!";
}
?>
