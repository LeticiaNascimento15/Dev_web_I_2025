<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <label>Digite um texto: </label><input type="text" name="texto">
        <button>enviar</button>
    </form>
</body>
</html>




<?php

$texto=$_GET['texto'];
$palavra = [];
function contaPalavras($texto){
    $palavra = explode (" ", $texto);
   return count($palavra);
}

contaPalavras($texto);
echo "a quantidade de palavra e".$palavra;
?> 