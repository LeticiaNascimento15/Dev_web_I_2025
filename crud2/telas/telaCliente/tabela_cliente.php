<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Clientes</title>
</head>
<body>
<form method="post">
<label>Nome:</label><input name="filtro"/>
<button>Filtrar</button>
</form>

<?php
include("../../service/cliente.service.php");
$filtro = $_POST["filtro"] ?? "";
listarCliente($filtro);
?>
</body>
</html>
