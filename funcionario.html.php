<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Funcionários</title>

    <link rel="stylesheet" href="funcionario.css">
</head>
<body>

<h2>Cadastro de Funcionários</h2>

<form method="post" action="funcionario.php">

    <input
        type="hidden"
        name="id"
        value="<?= $funcionario['id'] ?? '' ?>"
    >

    <input
        type="text"
        name="nome"
        placeholder="Nome"
        value="<?= $funcionario['nome'] ?? '' ?>"
        required
    >

    <input
        type="text"
        name="cargo"
        placeholder="Cargo"
        value="<?= $funcionario['cargo'] ?? '' ?>"
        required
    >

    <input
        type="number"
        step="0.01"
        name="salario"
        placeholder="Salário"
        value="<?= $funcionario['salario'] ?? '' ?>"
        required
    >

    <?php if($funcionario): ?>

        <button type="submit" name="alterar">
            Alterar
        </button>

        <a href="funcionario.php">
            Cancelar
        </a>

    <?php else: ?>

        <button type="submit" name="salvar">
            Salvar
        </button>

    <?php endif; ?>

</form>

<hr>

<table>

    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Cargo</th>
        <th>Salário</th>
        <th>Ações</th>
    </tr>

    <?php foreach($funcionarios as $f): ?>

    <tr>

        <td><?= $f['id'] ?></td>
        <td><?= htmlspecialchars($f['nome']) ?></td>
        <td><?= htmlspecialchars($f['cargo']) ?></td>
        <td>R$ <?= number_format($f['salario'],2,',','.') ?></td>

        <td>

            <a href="?editar=<?= $f['id'] ?>">
                Alterar
            </a>

            |

            <a
                href="?excluir=<?= $f['id'] ?>"
                onclick="return confirm('Excluir funcionário?')"
            >
                Excluir
            </a>

        </td>

    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>
