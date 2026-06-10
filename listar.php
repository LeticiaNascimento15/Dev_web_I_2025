<?php
echo"passou1";

require_once"../../util/conexaoI2.php";
echo "passou2";
$pdo = getPDO();
echo"passou3";
$sql = "SELECT id, nome, cargo, salario FROM funcionario";
echo"passou4";
$stmt= $pdo->prepare($sql);
echo"passou5";
$stmt= execute();
echo"passou6";

exit;
 
?>