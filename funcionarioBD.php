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
