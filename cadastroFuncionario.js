document.addEventListener("DOMContentLoaded", (ev) => {
  let formCad = document.getElementById("formCadastroFuncionario");
  let Camposalario = document.getElementById("salario");
  formCad.addEventListener("submit", (ev2) => {
    ev2.preventDefault();
    let Camponome = document.getElementById("nome");
    let Campotelefone = document.getElementById("telefone");
    validaFormulario(Camponome.value, Camposalario.value, Campotelefone.value);
  });
  Camposalario.addEventListener("keypress", (ev2) => {
    if (![1, 2, 3, 4, 5, 6, 7, 8, 9, 0, ","].find(ev2.key))
      (Camposalario.value = Camposalario.value),
        string.substring(0, Camposalario.value.length - 1);
  });
});
let validaFormulario = (nome, salario, Campotelefone) => {
  return true;
};
