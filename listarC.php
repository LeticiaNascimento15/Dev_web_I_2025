<?php
declare(strict_types=1);
require_once "../../util/conexaoI2.php";
 
$funcionarios= [];
$pdo = getPDO();
 
try{
 $sql = "SELECT id, nome, cargo, salario FROM funcionario";
 $stmt = $pdo-> prepare($sql);
 $stmt -> execute();
 $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
} catch (PDOException $e) {
responderJson(["erro" => "erro ao listar funcionario"], 400);
 
}
 
responderJson($funcionarios , 200);

?>
