<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Vendas</title>
</head>
<body>
<form method="post">
<label>Cliente:</label><input name="filtro"/>
<button>Filtrar</button>
</form>

<?php
include("../../service/venda.service.php");
$filtro = $_POST["filtro"] ?? "";
listarVenda($filtro);
?>
</body>
</html>
