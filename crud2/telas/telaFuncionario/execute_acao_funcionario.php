<?php
include("../../service/funcionario.service.php");

$acao = $_POST['acao'];
$nome = $_POST['nome'] ?? null;
$cargo = $_POST['cargo'] ?? null;
$id = $_POST['id'] ?? null;

if ($acao == "cadastrar") {
    cadastrarFuncionario($nome, $cargo);
    echo "Funcionário cadastrado com sucesso!";
} elseif ($acao == "alterar") {
    alterarFuncionario($id, $nome, $cargo);
    echo "Funcionário alterado com sucesso!";
} elseif ($acao == "remover") {
    removerFuncionario($id);
    echo "Funcionário removido com sucesso!";
}
?>
