const btnCadastrarUsuario = document.querySelector("#cadastrarUsuario");

/**
 * Função construtora de Exemplares da Biblioteca
 * @param {*} nome
 * @param {*} email
 * @param {*} senha
 */
function Usuario(nome, email, senha) {
  this.nome = nome;
  this.email = email;
  this.senha = senha;
}

async function cadastrarUsuario() {
  const url = "http://localhost/LeticiaPHP/Dev_web_I_2025/trabalho_final/backend/index.php?modulo=livro";

  const nome = document.querySelector("#novoNome").value;
  const email = document.querySelector("#novoEmail").value;
  const senha = document.querySelector("#novaSenha").value;

  const response = await fetch(url, {
    method: "POST",
    header: { "Content-Type": "application/json" },
    body: JSON.stringify(new Usuario(nome, email, senha)),
  });
}

btnCadastrarUsuario.addEventListener("click", cadastrarUsuario);