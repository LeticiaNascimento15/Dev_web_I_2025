<?php
include("../../service/usuario_service.php");

$id = $_GET['id'] ?? null;
$remover = $_GET['remover'] ?? null;

if ($remover && $id) {
    removerUsuario($id);
    header("Location: cadastro_usuario.php");
    exit;
}

if ($_POST) {
    if ($id) {
        alterarUsuario($id, $_POST['nome'], $_POST['email'], $_POST['senha']);
    } else {
        cadastrarUsuario($_POST['nome'], $_POST['email'], $_POST['senha']);
    }
    header("Location: cadastro_usuario.php");
    exit;
}

$usuario = $id ? pegaUsuarioPeloId($id) : null;
?>

<h2>Cadastro de Usuários</h2>
<form method="post">
    Nome: <input type="text" name="nome" value="<?= $usuario->nome ?? '' ?>"><br>
    Email: <input type="email" name="email" value="<?= $usuario->email ?? '' ?>"><br>
    Senha: <input type="password" name="senha" value="<?= $usuario->senha ?? '' ?>"><br>
    <button type="submit"><?= $id ? 'Alterar' : 'Cadastrar' ?></button>
</form>

<hr>
<h3>Lista de Usuários</h3>
<?php listarUsuario(""); ?>
