<?php
include("../../service/cliente.service.php");

$acao = $_POST['acao'];
$nome = $_POST['nome'] ?? null;
$telefone = $_POST['telefone'] ?? null;
$id = $_POST['id'] ?? null;

if ($acao == "cadastrar") {
    cadastrarCliente($nome, $telefone);
    echo "Cliente cadastrado com sucesso!";
} elseif ($acao == "alterar") {
    alterarCliente($id, $nome, $telefone);
    echo "Cliente alterado com sucesso!";
} elseif ($acao == "remover") {
    removerCliente($id);
    echo "Cliente removido com sucesso!";
}
?>
