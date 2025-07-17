<?php

include("../Service/funcionarioService.php");
$acao=$_POST['acao'];
$nome =$_POST['nome'];
$salario=$_POST['salario']?$_POST['salario']:null;
$salario=$_POST['telefone']?$_POST['telefone']:null;
$id=$_POST['id']?$_POST['id']:null;
if($acao=="cadastro"){
    cadastrarFuncionario($nome,$salario,$telefone);
        echo"Cadastrar com sucesso";
}

?>