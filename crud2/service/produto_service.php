<?php
include("../../model/produto.class.php");

function cadastrarProduto($nome, $preco, $estoque) {
    $produto = new Produto(null, $nome, $preco, $estoque);
    $produto->cadastrar();
}

function pegaProdutoPeloId($id) {
    return Produto::pegaPorId($id);
}

function alterarProduto($id, $novoNome, $novoPreco, $novoEstoque) {
    $produto = Produto::pegaPorId($id);
    if ($produto) {
        $produto->nome = $novoNome;
        $produto->preco = $novoPreco;
        $produto->estoque = $novoEstoque;
        $produto->alterar();
    }
}

function removerProduto($id) {
    $produto = Produto::pegaPorId($id);
    if ($produto) {
        $produto->remover();
    }
}

function listarProduto($filtroNome) {
    $produtos = Produto::listar($filtroNome);
    echo "<table><thead><tr><th>Nome</th><th>Preço</th><th>Estoque</th><th>Ações</th></tr></thead><tbody>";
    foreach($produtos as $produto) {
        echo "<tr><td>".$produto->nome."</td>";
        echo "<td>".$produto->preco."</td>";
        echo "<td>".$produto->estoque."</td>";
        echo "<td><a href='cadastro_produto.php?id=".$produto->id."'>Alterar</a> | 
              <a href='cadastro_produto.php?id=".$produto->id."&remover=1'>Remover</a></td></tr>";
    }
    echo "</tbody></table>";
}
?>
