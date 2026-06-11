import { limpaElementos, exibeErro, limpaForm } from "../js/verifica.js";
import { spanErro, formFuncionario,preencheTabela,preencheDados, valida } from "./tabela.js";
import { insere, lista, remove } from "./funcionarioApi.js";

document.addEventListener('DOMContentLoaded', async ()=>{
//Requisição para listar
try{
        let funcionarios = await lista();
        preencheTabela(funcionarios);
     } catch (erro) {
        exibeErro(spanErro, erro.message, 3000);
    }     
})

const tblFuncionarios= document.querySelector('#tblFuncionarios tbody');
tblFuncionarios.addEventListener('click',async e=>{
    const alvoClique=e.target;
    const elementoDOM=alvoClique;
    if(elementoDOM.tagName==='BUTTON'){
        const botao=elementoDOM;
        if(botao.textContent==='[EXCLUIR]'){
            if(confirm('Deseja realmene remover o registro de id'+botao.dataset.id+'?')){
                try{
                    await remove(botao.dataset.id);
                    let funcionarios = await lista();
                    preencheTabela(funcionarios);
                }catch(erro){
                    exibeErro(spanErro,erro.message, 3000);
                }
            }
            else if(botao.textContent==='[ALTERAR]'){
                ;
            }
        }
    
    }
})
console.log(formFuncionario);
formFuncionario.addEventListener('submit', async e => {
    e.preventDefault();
    limpaElementos('.info');
    //montar um objeto funcionario a partir dos inputs
    console.log(funcionarioNome);
    let funcionario = {
        nome: document.querySelector('#funcionarioNome').value,
        cargo: document.querySelector('#funcionarioCargo').value,
        salario: Number(document.querySelector('#funcionarioSalario').value)
    }
    //Tratamento de erros
    let msgErro = valida( funcionario );
    if(msgErro){
        exibeErro( spanErro, msgErro, 3000);
        return; //Interrompe
    }
    //Requisição para inserir
    try{
        let dados = await insere( funcionario );
        preencheDados( dados );
        limpaForm(formFuncionario);
        setTimeout(()=>{
            limpaElementos('.info');
        },3000);
        let funcionarios=await lista();
        preencheTabela(funcionarios);
     } catch (erro) {
        exibeErro(spanErro, erro.message, 3000);
    }
})
