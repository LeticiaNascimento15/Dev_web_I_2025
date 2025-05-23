<?php
if(isset($_POST["Masculino"] && isset($_POST["Feminino"] && isset($_POST["Outro"] && isset($_POST["A+"] && isset($_POST["A-"] && isset($_POST["B+"] && isset($_POST["B-"] && isset($_POST["AB+"] && isset($_POST["AB-"] &&  isset($_POST["O+"] && isset($_POST["O-"] && isset($_POST["Leve"] && isset($_POST["Moderada"] && isset($_POST["Grave"] && isset($_POST["Critico"]);

$Masculino=$_POST["Masculino"];
$Femininoo=$_POST["Feminimo"];
$Outro=$_POST["Outro"];
$A+=$_POST["A+"];
$A-=$_POST["A-"];
$B+=$_POST["B+"];
$B-=$_POST["B-"];
$AB+=$_POST["AB+"];
$AB-=$_POST["AB-"];
$O+=$_POST["O+"];
$O-=$_POST["O-"];
$Leve=$_POST["Leve"];
$Moderada=$_POST["Moderada"];
$Grave=$_POST["Grave"];
$Critico=$_POST["Critico"];

$Pacientes=[
"Masculino"=>$Masculino,
"Feminino"=>$Feminino,
"Outro"=>$Outro,
"A+"=>$A+,
"A-"=>$A-,
"B+"=>$B+,
"B-"=>$B-,
"AB+"=>$AB+,
"AB-"=>$AB-,
"O+"=>$O+,
"O-"=>$O-,
"Leve"=>$Leve,
"Moderada"=>$Moderada,
"Grave"=>$Grave,
"Critico"=>$Critico
]

$email_usuario=$_SESSION["email"];
  
if(!isset($_SESSION["pacientes"][$email_usuario])){
  $_SESSION["pacientes"][$email_usuario]=[];
}
$_SESSION["pacientes"][$email_usuario][]=$pacientes;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Lista de Pacientes</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
 
    <form method="POST" action="lista.html">
</body>













