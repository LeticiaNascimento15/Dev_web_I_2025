<?php
include("../../service/cliente_service.php");

$id = $_GET['id'] ?? null;
$remover = $_GET['remover'] ?? null;

if ($remover && $id) {
    removerCliente($id);
    header("Location: cadastro_cliente.php");
    exit;
}

if ($_POST) {
    if ($id) {
        alterarCliente($id, $_POST['nome'], $_POST['telefone']);
    } else {
        cadastrarCliente($_POST['nome'], $_POST['telefone']);
    }
    header("Location: cadastro_cliente.php");
    exit;
}

$cliente = $id ? pegaClientePeloId($id) : null;
?>

<h2>Cadastro de Clientes</h2>
<form method="post">
    Nome: <input type="text" name="nome" value="<?= $cliente->nome ?? '' ?>"><br>
    Telefone: <input type="text" name="telefone" value="<?= $cliente->telefone ?? '' ?>"><br>
    <button type="submit"><?= $id ? 'Alterar' : 'Cadastrar' ?></button>
</form>

<hr>
<h3>Lista de Clientes</h3>
<?php listarCliente(""); ?>
