<?php
include("../../service/usuario.service.php");

$acao = $_POST['acao'];
$login = $_POST['login'] ?? null;
$senha = $_POST['senha'] ?? null;
$id = $_POST['id'] ?? null;

if ($acao == "cadastrar") {
    cadastrarUsuario($login, $senha);
    echo "Usuário cadastrado com sucesso!";
} elseif ($acao == "alterar") {
    alterarUsuario($id, $login, $senha);
    echo "Usuário alterado com sucesso!";
} elseif ($acao == "remover") {
    removerUsuario($id);
    echo "Usuário removido com sucesso!";
}
?>
