<?php
declare(strict_types=1);
require_once '../../util/conexaoI2.php';
$info= file_get_contents('php://input');
$funcionario=json_decode($info,true);

$cargo=(string) $funcionario['cargo'];
$salario= (float) $funcionario['salario'];
$pdo=getPDO();

try{
    $sql="INSERT  INTO funcionario(Id,nome,cargo,salario) VALUES(:Id, :NOME, :CARGO, :SALARIO)";
    $stmt= $pdo ->prepare($sql);
        $stmt -> bindValue(':Id', $funcionario['Id'], PDO::PARAM_STR);
    $stmt -> bindValue(':NOME', $funcionario['nome'], PDO::PARAM_STR);
    $stmt -> bindValue(':CARGO', $funcionario['cargo'], PDO::PARAM_STR);
    $stmt -> bindValue(':SALARIO', $funcionario['salario'], PDO::PARAM_STR);
    $stmt -> execute();
} catch (PDOException $e) {
    $codErro = $e->errorInfo[1];
    if($codErro == 1062) responderJson(['erro'=> "erro de VIOLAÇÃO DE CHAVE ÚNICA para funcionario. {$e->getMessage()}"], 400);
    elseif($codErro == 1265) responderJson(['erro'=> "erro de VIOLAÇÃO DE CAMPO ENUM para funcionario. {$e->getMessage()}"], 400);
    elseif($codErro == 4025) responderJson(['erro'=> "erro de VIOLAÇÃO DE REGRA(s)  CHECK para funcionario. {$e->getMessage()}"], 400);
    else responderJson(['erro'=> "erro ao inserir funcionario. {$e->getMessage()}"], 400);
       
 
}
 
responderJson($funcionario, 201);
 
?>