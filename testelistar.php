<?php
declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../../util/conexaoI2.php";

try{

    $pdo = getPDO();

    $sql = "SELECT * FROM funcionario";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $funcionarios =
        $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');

    echo json_encode(
        $funcionarios,
        JSON_UNESCAPED_UNICODE
    );

}
catch(Throwable $e){

    echo "<pre>";
    echo "ERRO:\n";
    echo $e->getMessage();
    echo "\n\nARQUIVO:\n";
    echo $e->getFile();
    echo "\n\nLINHA:\n";
    echo $e->getLine();
    echo "</pre>";

}