<?php
include("../../model/cliente.class.php");

function cadastrarCliente($nome, $telefone) {
    $cliente = new Cliente(null, $nome, $telefone);
    $cliente->cadastrar();
}

function pegaClientePeloId($id) {
    return Cliente::pegaPorId($id);
}

function alterarCliente($id, $novoNome, $novoTelefone) {
    $cliente = Cliente::pegaPorId($id);
    if ($cliente) {
        $cliente->nome = $novoNome;
        $cliente->telefone = $novoTelefone;
        $cliente->alterar();
    }
}

function removerCliente($id) {
    $cliente = Cliente::pegaPorId($id);
    if ($cliente) {
        $cliente->remover();
    }
}

function listarCliente($filtroNome) {
    $clientes = Cliente::listar($filtroNome);
    echo "<table><thead><tr><th>Nome</th><th>Telefone</th><th>Ações</th></tr></thead><tbody>";
    foreach($clientes as $cliente) {
        echo "<tr><td>".$cliente->nome."</td>";
        echo "<td>".$cliente->telefone."</td>";
        echo "<td><a href='cadastro_cliente.php?id=".$cliente->id."'>Alterar</a> | 
              <a href='cadastro_cliente.php?id=".$cliente->id."&remover=1'>Remover</a></td></tr>";
    }
    echo "</tbody></table>";
}
?>
