<?php
include("../../model/usuario.class.php");

function cadastrarUsuario($nome, $email, $senha) {
    $usuario = new Usuario(null, $nome, $email, $senha);
    $usuario->cadastrar();
}

function pegaUsuarioPeloId($id) {
    return Usuario::pegaPorId($id);
}

function alterarUsuario($id, $novoNome, $novoEmail, $novaSenha) {
    $usuario = Usuario::pegaPorId($id);
    if ($usuario) {
        $usuario->nome = $novoNome;
        $usuario->email = $novoEmail;
        $usuario->senha = $novaSenha;
        $usuario->alterar();
    }
}

function removerUsuario($id) {
    $usuario = Usuario::pegaPorId($id);
    if ($usuario) {
        $usuario->remover();
    }
}

function listarUsuario($filtroNome) {
    $usuarios = Usuario::listar($filtroNome);
    echo "<table><thead><tr><th>Nome</th><th>Email</th><th>Ações</th></tr></thead><tbody>";
    foreach($usuarios as $u) {
        echo "<tr><td>".$u->nome."</td>";
        echo "<td>".$u->email."</td>";
        echo "<td><a href='cadastro_usuario.php?id=".$u->id."'>Alterar</a> | 
              <a href='cadastro_usuario.php?id=".$u->id."&remover=1'>Remover</a></td></tr>";
    }
    echo "</tbody></table>";
}
?>
