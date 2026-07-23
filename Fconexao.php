<?php
function getPDO():PDO {

    $host = 'cloud.uniaomundial.com.br';
    $db = 'uniaoteste';
    $user = 'uniaoteste';
    $pass = 'MunD08dial16unI2019';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    $options = [

        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_PERSISTENT => true

    ];

$pdo=null;

    try {

        return new PDO(
            $dsn,
            $user,
            $pass,
            $options
        );

    } catch(PDOException $erro) {

        die(
            "Erro conexão: " .
            $erro->getMessage()
        );

    }
return $pdo;
}
?>
