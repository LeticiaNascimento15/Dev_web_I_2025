<?php
declare(strict_types=1);
require_once '../model/funcoesAluno.php';
require_once '../../util/funcoesUtil.php';
$info= file_get_contents('php://input');
$aluno=json_decode($info,true);

$nota1=(float) $aluno['nota1'];
$nota2= (float) $aluno['nota2'];
$media=obterMedia($nota1,$nota2);
$grau=obterGrau($media);

$aluno['media']=$media;
$aluno['grau']=$grau;
$pdo=getPDO();

try{
    $sql="UPDATE aluno SET nome=:NOME, nota1=:NOTA1, nota2=:NOTA2, media=:MEDIA, grau=:GRAU WHERE id =:ID";
    $stmt= $pdo->prepare($sql);
    $stmt->bindValue(':NOME',$aluno['nome'], PDO::PARAM_STR);
    $stmt->bindValue(':NOTA1',$aluno['nota1'], PDO::PARAM_STR);
    $stmt->bindValue(':NOTA2',$aluno['nota2'], PDO::PARAM_STR);
    $stmt->bindValue(':MEDIA',$aluno['media'], PDO::PARAM_STR);
    $stmt->bindValue(':GRAU',$aluno['grau'], PDO::PARAM_STR);
    $stmt->bindValue(':ID',(int) $aluno['id'], PDO::PARAM_INT);
    $stmt->execute();
}catch(PDOException $e){
    $codErro=$e->errorInfo[1];
    if($codErro==1062)
        responderJson(["erro"=>"Erro de violaçao de chave unica para aluno"],400);
    elseif($codErro==1265)
        responderJson(["erro"=>"Erro de violaçao de campo enum para aluno"],400);
    elseif($codErro==3019)
        responderJson(["erro"=>"Erro de violaçao de regra(s) check para aluno"],400);
      else 
    responderJson(["erro"=>"Erro ao alterar aluno {$e->getMessage()}"],400);

}

responderJson($aluno, 200);
