<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);



require_once "../../util/conexaoI2.php";

try {

    $pdo = getPDO();

    $sql = "SELECT * FROM funcionario";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json; charset=utf-8');

    echo json_encode($funcionarios, JSON_UNESCAPED_UNICODE);

} catch (Throwable $e) {

    http_response_code(500);

    echo json_encode([
        "erro" => $e->getMessage()
    ]);
}