<?php
require_once 'conexao.php';
$pdo=getPDO();

$inserir=function(array $funcionario) use($pdo):void{
    $sql="INSERT INTO funcionario(nome, cargo, , salario) VALUES (:NOME, :CARGO, :SALARIO");
    $stmt=$pdo->prepare($sql);
    $stmt ->bindValue(':NOME', $funcionario['nome'], PDO::PARAM_STR);
    $stmt -> bindValue(':CARGO', $funcionario,['cargo'], PDO::PARAM_STR);
    $stmt -> bindValue(':SALARIO', $funcionario['salario'], PDO::PARAM_STR);
    $stmt -> execute();
};
?>