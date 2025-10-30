<?php
include("../../model/venda.class.php");

function cadastrarVenda($idCliente, $idProduto, $quantidade, $valorTotal) {
    $venda = new Venda(null, $idCliente, $idProduto, $quantidade, $valorTotal);
    $venda->cadastrar();
}

function pegaVendaPeloId($id) {
    return Venda::pegaPorId($id);
}

function alterarVenda($id, $novoCliente, $novoProduto, $novaQtd, $novoValorTotal) {
    $venda = Venda::pegaPorId($id);
    if ($venda) {
        $venda->idCliente = $novoCliente;
        $venda->idProduto = $novoProduto;
        $venda->quantidade = $novaQtd;
        $venda->valorTotal = $novoValorTotal;
        $venda->alterar();
    }
}

function removerVenda($id) {
    $venda = Venda::pegaPorId($id);
    if ($venda) {
        $venda->remover();
    }
}

function listarVenda($filtroCliente) {
    $vendas = Venda::listar($filtroCliente);
    echo "<table><thead><tr><th>ID Cliente</th><th>ID Produto</th><th>Qtd</th><th>Valor Total</th><th>Ações</th></tr></thead><tbody>";
    foreach($vendas as $v) {
        echo "<tr><td>".$v->idCliente."</td>";
        echo "<td>".$v->idProduto."</td>";
        echo "<td>".$v->quantidade."</td>";
        echo "<td>".$v->valorTotal."</td>";
        echo "<td><a href='cadastro_venda.php?id=".$v->id."'>Alterar</a> | 
              <a href='cadastro_venda.php?id=".$v->id."&remover=1'>Remover</a></td></tr>";
    }
    echo "</tbody></table>";
}
?>
