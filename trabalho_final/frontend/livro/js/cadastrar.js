const btnCadastrarLivro = document.querySelector("#cadastrarLivro")

/**
 * Função construtora de Exemplares da Biblioteca
 * @param {*} issn 
 * @param {*} titulo 
 * @param {*} autor 
 * @param {*} editora 
 * @param {*} ano 
 * @param {*} genero 
 * @param {*} local 
 * @param {*} disponibilidade 
 */
function Livro(ISSN, titulo, autor, editora, anoPublicacao, genero, localizacao, disponibilidade) {
  this.ISSN = ISSN
  this.titulo = titulo
  this.autor = autor
  this.editora = editora
  this.anoPublicacao = anoPublicacao
  this.genero = genero
  this.localizacao = localizacao
  this.disponivel = disponibilidade
}

/**
 * Função que deverá pegar os dados do formulário e gerar um novo 
 * exemplar na lista de livros da biblioteca
*/

async function cadastrarExemplar() { // ok
  console.log("chamando cadastrarExemplar")
  const url = "http://localhost/LeticiaPHP/Dev_web_I_2025/trabalho_final/backend/index.php?modulo=livro"

  const ISSN = document.querySelector("#novoIssn").value
  const titulo = document.querySelector("#novoTitulo").value
  const autor = document.querySelector("#novoAutor").value
  const editora = document.querySelector("#novoEditora").value
  const anoPublicacao = document.querySelector("#novoAno").value
  const genero = document.querySelector("#novoGenero").value
  const localizacao = document.querySelector("#novoLocal").value
  const disponibilidade = "Sim"

  const response = await fetch(url, {
    method: "POST",
    header: { "Content-Type": "application/json" },
    body: JSON.stringify(new Livro(ISSN, titulo, autor, editora, anoPublicacao, genero, localizacao, disponibilidade))
  })
}

/* 
 * Bloco de chamada de eventos
*/

btnCadastrarLivro.addEventListener("click", cadastrarExemplar)