<?php
declare(strict_types=1);
require_once '../../util/funcoes.php';
require_once '../model/funcoesBD.php';
require_once '../model/funcoes.php';
$id = validarId($_GET['id']);
$funcionario=null;
$pdo=getPDO();
try{
    /**@var callable $obterPeloId */
    $funcionario = $obterPeloId($id);
}catch(PDOException $e){
    responderJson(["erro" =>"Erro ao obter funcionario {$e->getMessage()}"], 400);
}
 responderJson($funcionario , 200);