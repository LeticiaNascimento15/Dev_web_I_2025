conexão 
...
funcionarioBD
<?php

require_once 'conexao.php';

$pdo = getPDO();

$inserir = function(array $funcionario) use ($pdo): void {

    $sql = "INSERT INTO funcionario(nome,cargo,salario)
            VALUES(:NOME,:CARGO,:SALARIO)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':NOME', $funcionario['nome']);
    $stmt->bindValue(':CARGO', $funcionario['cargo']);
    $stmt->bindValue(':SALARIO', $funcionario['salario']);

    $stmt->execute();
};

$listar = function() use ($pdo): array {

    $sql = "SELECT * FROM funcionario";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
};

$obterPeloId = function(int $id) use ($pdo): array|null {

    $sql = "SELECT * FROM funcionario WHERE id=:ID";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':ID', $id, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
};

$alterar = function(array $funcionario) use ($pdo): void {

    $sql = "UPDATE funcionario
            SET nome=:NOME,
                cargo=:CARGO,
                salario=:SALARIO
            WHERE id=:ID";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':NOME', $funcionario['nome']);
    $stmt->bindValue(':CARGO', $funcionario['cargo']);
    $stmt->bindValue(':SALARIO', $funcionario['salario']);
    $stmt->bindValue(':ID', $funcionario['id']);

    $stmt->execute();
};

$remover = function(int $id) use ($pdo): void {

    $sql = "DELETE FROM funcionario WHERE id=:ID";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':ID', $id);

    $stmt->execute();
};

funcionário.php
<?php

require_once 'funcionarioDAO.php';

/* SALVAR */

if(isset($_POST['salvar'])){

    $inserir([
        'nome' => $_POST['nome'],
        'cargo' => $_POST['cargo'],
        'salario' => $_POST['salario']
    ]);

    header('Location: funcionario.php');
    exit;
}

/* ALTERAR */

if(isset($_POST['alterar'])){

    $alterar([
        'id' => $_POST['id'],
        'nome' => $_POST['nome'],
        'cargo' => $_POST['cargo'],
        'salario' => $_POST['salario']
    ]);

    header('Location: funcionario.php');
    exit;
}

/* EXCLUIR */

if(isset($_GET['excluir'])){

    $remover($_GET['excluir']);

    header('Location: funcionario.php');
    exit;
}

/* EDITAR */

$funcionario = null;

if(isset($_GET['editar'])){
    $funcionario = $obterPeloId($_GET['editar']);
}

/* LISTAR */

$funcionarios = $listar();

require 'funcionario.html.php';

funcionario.html
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Funcionários</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Cadastro de Funcionários</h2>

<form method="post">

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

style
body{
    font-family: Arial, sans-serif;
    margin: 20px;
}

form{
    margin-bottom: 20px;
}

input{
    padding: 8px;
    margin: 5px;
}

button{
    padding: 8px 15px;
}

table{
    width: 100%;
    border-collapse: collapse;
}

table, th, td{
    border: 1px solid #ccc;
}

th{
    background-color: #f0f0f0;
}

th, td{
    padding: 10px;
    text-align: left;
}

a{
    text-decoration: none;
}
