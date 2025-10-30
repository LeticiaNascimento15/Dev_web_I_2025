<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Funcionários</title>
</head>
<body>
<form method="post">
<label>Nome:</label><input name="filtro"/>
<button>Filtrar</button>
</form>

<?php
include("../../service/funcionario.service.php");
$filtro = $_POST["filtro"] ?? "";
listarFuncionario($filtro);
?>
</body>
</html>
