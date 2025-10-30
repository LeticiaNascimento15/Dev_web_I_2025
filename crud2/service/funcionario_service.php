<?php
include("../../model/funcionario.class.php");

function cadastrarFuncionario($nome, $cargo, $salario) {
    $funcionario = new Funcionario(null, $nome, $cargo, $salario);
    $funcionario->cadastrar();
}

function pegaFuncionarioPeloId($id) {
    return Funcionario::pegaPorId($id);
}

function alterarFuncionario($id, $novoNome, $novoCargo, $novoSalario) {
    $funcionario = Funcionario::pegaPorId($id);
    if ($funcionario) {
        $funcionario->nome = $novoNome;
        $funcionario->cargo = $novoCargo;
        $funcionario->salario = $novoSalario;
        $funcionario->alterar();
    }
}

function removerFuncionario($id) {
    $funcionario = Funcionario::pegaPorId($id);
    if ($funcionario) {
        $funcionario->remover();
    }
}

function listarFuncionario($filtroNome) {
    $funcionarios = Funcionario::listar($filtroNome);
    echo "<table><thead><tr><th>Nome</th><th>Cargo</th><th>Salário</th><th>Ações</th></tr></thead><tbody>";
    foreach($funcionarios as $f) {
        echo "<tr><td>".$f->nome."</td>";
        echo "<td>".$f->cargo."</td>";
        echo "<td>".$f->salario."</td>";
        echo "<td><a href='cadastro_funcionario.php?id=".$f->id."'>Alterar</a> | 
              <a href='cadastro_funcionario.php?id=".$f->id."&remover=1'>Remover</a></td></tr>";
    }
    echo "</tbody></table>";
}
?>
