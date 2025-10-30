<?php
include("../../service/funcionario_service.php");

$id = $_GET['id'] ?? null;
$remover = $_GET['remover'] ?? null;

if ($remover && $id) {
    removerFuncionario($id);
    header("Location: cadastro_funcionario.php");
    exit;
}

if ($_POST) {
    if ($id) {
        alterarFuncionario($id, $_POST['nome'], $_POST['cargo'], $_POST['salario']);
    } else {
        cadastrarFuncionario($_POST['nome'], $_POST['cargo'], $_POST['salario']);
    }
    header("Location: cadastro_funcionario.php");
    exit;
}

$funcionario = $id ? pegaFuncionarioPeloId($id) : null;
?>

<h2>Cadastro de Funcionários</h2>
<form method="post">
    Nome: <input type="text" name="nome" value="<?= $funcionario->nome ?? '' ?>"><br>
    Cargo: <input type="text" name="cargo" value="<?= $funcionario->cargo ?? '' ?>"><br>
    Salário: <input type="number" step="0.01" name="salario" value="<?= $funcionario->salario ?? '' ?>"><br>
    <button type="submit"><?= $id ? 'Alterar' : 'Cadastrar' ?></button>
</form>

<hr>
<h3>Lista de Funcionários</h3>
<?php listarFuncionario(""); ?>
