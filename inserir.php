<?php
declare(strict_types=1);

require_once 'funcaoBD.php';
require_once 'conexao.php';

$info= file_get_contents('php://input');
$funcionario=json_decode($info,true);

validar($funcionario);

try{
    /**@var array $inserir */
    $inserir($funcionario);
} catch (PDOException $e) {
    $codErro = $e->errorInfo[1];
    if($codErro == 1062) 
        responderJson(['erro'=> "erro de VIOLACAO DE CHAVE UNICA para funcionario."], 400);
    elseif($codErro == 1265)
        responderJson(['erro'=> "erro de VIOLACAO DE CAMPO ENUM para funcionario."], 400);
    elseif($codErro == 3819)
        responderJson(['erro'=> "erro de VIOLACAO DE REGRA(s) CHECK para funcionario."], 400);
    else
        responderJson(['erro'=> "erro ao inserir funcionario.}"], 400);
    responderJson(['erro'=> "erro ao inserir funcionario."], 400);
}
responderJson($funcionario, 201);




?>