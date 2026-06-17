<?php
declare(strict_types=1);
require_once '../model/funcoes.php';
require_once '../model/funcoesBD.php';
require_once '../../util/funcoes.php';

$info= file_get_contents('php://input');
$funcionario=json_decode($info,true);

validar($funcionario);

//$aluno['media']= obterMedia((float) $aluno['nota1'], (float) $aluno['nota2']);
//$aluno['grau']= obterGrau($aluno['media']);
try{
    /**@var array $inserir */
    $inserir($funcionario);
} catch (PDOException $e) {
    $codErro = $e->errorInfo[1];
    if($codErro == 1062) 
        responderJson(['erro'=> "erro de VIOLAÇÃO DE CHAVE ÚNICA para funcionario."], 400);
    elseif($codErro == 1265)
        responderJson(['erro'=> "erro de VIOLAÇÃO DE CAMPO ENUM para funcionario."], 400);
    elseif($codErro == 3819)
        responderJson(['erro'=> "erro de VIOLAÇÃO DE REGRA(s) CHECK para funcionario."], 400);
    else
        responderJson(['erro'=> "erro ao inserir aluno.}"], 400);
    responderJson(['erro'=> "erro ao inserir aluno."], 400);
}
responderJson($funcionario, 201);
?>