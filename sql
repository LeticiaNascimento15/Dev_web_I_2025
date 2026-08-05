<?php

require_once 'conexaoP.php';

try {

    $pdo = getPDO();
    $codigo = $_POST['codigo'];

    $sql = "
        SELECT
            p.vltotal AS ValorTotal,
            c.A1_NOME AS Cliente,
            c.A1_COD AS Codigo,
            COUNT(p.codipedi) AS QTD_PEDIDOS
        FROM clientes c
        JOIN pedidos p ON (p.C5_CLIENTE = c.A1_COD)
        WHERE c.A1_COD = ?
        GROUP BY c.A1_COD, c.A1_NOME, p.vltotal
        ORDER BY c.A1_NOME ASC
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$codigo]);
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

<h2>Pedidos</h2>

<table border="1">
    <tr>
        <th>Valor Total</th>
        <th>Cliente</th>
        <th>Código</th>
        <th>Qtd. Pedidos</th>
    </tr>

    <?php
    if (!empty($dados)) {

        foreach ($dados as $linha) {

            echo "<tr>";
            echo "<td>" . $linha['ValorTotal'] . "</td>";
            echo "<td>" . $linha['Cliente'] . "</td>";
            echo "<td>" . $linha['Codigo'] . "</td>";
            echo "<td>" . $linha['QTD_PEDIDOS'] . "</td>";
            echo "</tr>";
        }

    } else {

        echo "
        <tr>
            <td colspan='4'>Pedido não encontrado</td>
        </tr>";
    }
    ?>
</table>

</body>
</html>

SELECT
    SUM(p.vltotal) AS ValorTotal,
    c.A1_NOME AS Cliente,
    c.A1_COD AS Codigo,
    COUNT(p.codipedi) AS QTD_PEDIDOS
FROM clientes c
JOIN pedidos p ON p.C5_CLIENTE = c.A1_COD
WHERE c.A1_COD = ?
GROUP BY c.A1_COD, c.A1_NOME;