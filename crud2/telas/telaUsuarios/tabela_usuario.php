<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Usuários</title>
</head>
<body>
<form method="post">
<label>Login:</label><input name="filtro"/>
<button>Filtrar</button>
</form>

<?php
include("../../service/usuario.service.php");
$filtro = $_POST["filtro"] ?? "";
listarUsuario($filtro);
?>
</body>
</html>
