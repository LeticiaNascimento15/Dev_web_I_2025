<?php

require_once 'conexao.php';

try {

    $pdo = getPDO();

    $nome = $_POST['nome'];

    $sql = "

        SELECT

            ID,
            NOME,
            CARGO,
            SALARIO

        FROM funcionarios

        WHERE NOME LIKE '%$nome%'

    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $dados = $stmt->fetchAll();

} catch(PDOException $erro) {

    echo $erro->getMessage();

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>

<h2>Resultado da Pesquisa</h2>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Cargo</th>
    <th>Salário</th>
</tr>

<?php

if(!empty($dados)) {

    foreach($dados as $linha) {

        echo "<tr>";

        echo "<td>".$linha['ID']."</td>";
        echo "<td>".$linha['NOME']."</td>";
        echo "<td>".$linha['CARGO']."</td>";
        echo "<td>".$linha['SALARIO']."</td>";

        echo "</tr>";
    }

} else {

    echo "

    <tr>
        <td colspan='4'>
            Nenhum funcionário encontrado
        </td>
    </tr>

    ";
}

?>

</table>

</body>
</html>