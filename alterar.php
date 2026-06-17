<?php
declare(strict_types=1);
//require_once '../model/funcoes.php';
require_once '../model/funcoesBD.php';
require_once '../../util/funcoes.php';

$info= file_get_contents('php://input');
$funcionario=json_decode($info,true);

$funcionario['id']= validarId($funcionario['id']);
validar($funcionario);

//$aluno['media']= obterMedia((float) $aluno['nota1'], (float) $aluno['nota2']);
//$aluno['grau']= obterGrau($aluno['media']);
try{
   /**@var callable $alterar */
    $alterar($funcionario);
}catch(PDOException $e){
    $codErro=$e->errorInfo[1];
    if($codErro==1062)
        responderJson(["erro"=>"Erro de violaçao de chave unica para funcionario"],400);
    elseif($codErro==1265)
        responderJson(["erro"=>"Erro de violaçao de campo enum para funcionario"],400);
    elseif($codErro==3019)
        responderJson(["erro"=>"Erro de violaçao de regra(s) check para funcionario"],400);
      else 
    responderJson(["erro"=>"Erro ao alterar funcionario"],400);

}

responderJson($funcionario, 200);
