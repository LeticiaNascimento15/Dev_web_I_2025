<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Produtos</title>
</head>
<body>
<form method="post">
<label>Nome:</label><input name="filtro"/>
<button>Filtrar</button>
</form>

<?php
include("../../service/produto.service.php");
$filtro = $_POST["filtro"] ?? "";
listarProduto($filtro);
?>
</body>
</html>
