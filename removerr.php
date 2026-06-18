<?php

require_once 'conexao.php';

try {

    $pdo = getPDO();

    $id = $_POST['id'];

    $sql = "

        DELETE FROM funcionarios

        WHERE ID = '$id'

    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    if($stmt->rowCount() > 0) {

        echo "<h2>Funcionário removido com sucesso!</h2>";

    } else {

        echo "<h2>Erro: funcionário não encontrado!</h2>";

    }

} catch(PDOException $erro) {

    echo $erro->getMessage();

}

?>