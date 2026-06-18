<?php

require_once 'conexao.php';

try {

    $pdo = getPDO();

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];

    $sql = "

        UPDATE funcionarios

        SET

            NOME = '$nome',
            CARGO = '$cargo',
            SALARIO = '$salario'

        WHERE ID = '$id'

    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    echo "<h2>Funcionário alterado com sucesso!</h2>";

} catch(PDOException $erro) {

    echo $erro->getMessage();

}

?>