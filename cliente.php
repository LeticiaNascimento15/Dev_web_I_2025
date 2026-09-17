<?php
require_once 'conexaoC.php';
try {
    $pdo = getPDO();
    $nome = $_POST['nome'];
    $sql = "
        SELECT

          A1_COD,
          A1_NOME,
          A1_END,
          A1_EST,
          A1_EMAIL,
          A1_DDD,
          A1_TEL

        FROM clientes
        WHERE A1_NOME LIKE '%$nome%'
        // A1_COD
        ORDER BY A1_COD
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
    <title>Cliente</title>
</head>
<body>
<h2>Resultado da Pesquisa</h2>
<table border="1">
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Endereço</th>
    <th>Estado</th>
    <th>Email</th>
    <th>DDD</th>
    <th>Telefone</th>
</tr>
<?php
if(!empty($dados)) {
    foreach($dados as $linha) {

        echo "<tr>";
        echo "<td>".$linha['A1_COD']."</td>";
        echo "<td>".$linha['A1_NOME']."</td>";
        echo "<td>".$linha['A1_END']."</td>";
        echo "<td>".$linha['A1_EST']."</td>";
        echo "<td>".$linha['A1_EMAIL']."</td>";
        echo "<td>".$linha['A1_DDD']."</td>";
        echo "<td>".$linha['A1_TEL']."</td>";

        echo "</tr>";
    }

} else {
    echo "
    <tr>
        <td colspan='4'>
            Nenhum cliente encontrado
        </td>
    </tr>
    ";
}

?>

</table>
</body>
</html>