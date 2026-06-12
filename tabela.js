const formFuncionario = document.querySelector('#formFuncionario');
const spanErro = document.querySelector('#erro');
function preencheDados({nome,cargo,salario}){
    document.querySelector('#dados').textContent="Dados funcionarios";
    document.querySelector('#funcionarioNome').textContent='Nome:${nome}';
    document.querySelector('#funcionarioCargo').textContent='Cargo: ${Cargo}';
    document.querySelector('#funcionarioSalario').textContent='Salario: ${Salario}';

}
function valida({nome, cargo, salario}){
    if(!funcionarioNome) return "Preencha o nome.";
    if(!funcionarioCargo) return "Preencha o cargo.";
    if( Number.isNaN(funcionarioSalario))
        return "Salario precisa conter valores numéricos";
    /*if( nota1<0 || nota1>10 || nota2<0 || nota2>10 )
        return "As notas devem estar entre 0 e 10.";*/
    return null;
}

function preencheForm ({Id, nome, cargo, salario }){
    formFuncionario.id.value = Id;
    formFuncionario.nome.value=nome;
    formFuncionario.cargo.value=cargo;
    formFuncionario.salario.value=salario;
    formFuncionario.btnEnviar.vaalue="Calcular e alterar";

}

function preencheTabela(funcionarios){
    const corpoTbl=document.querySelector('#tblFuncionarios tbody');
    while(corpoTbl.firstChild)
        corpoTbl.removeChild(corpoTbl.firstChild);

    funcionarios.forEach(funcionario => {
        const linha =document.createElement('tr');
        const {id, nome, cargo,salario}=funcionario;
        const[tdId, tdNome, tdCargo, tdSalario, tdAcoes]=
        ['td','td','td','td','td'].map(tagTd=> document.createElement(tagTd));
        tdId.textContent=id;
        tdNome.textContent=nome;
        tdCargo.textContent=cargo;
        tdSalario.textContent=salario;

        const[btnExcluir,btnAlterar]=['button','button'].map(btn =>document.createElement(btn));
        btnExcluir.dataset.id=id;
        btnExcluir.textContent='[EXCLUIR]';
        btnAlterar.dataset.id=id;
        btnAlterar.textContent='[ALTERAR]';
        tdAcoes.append(btnExcluir,btnAlterar);
    linha.append(tdId,tdNome,tdCargo,tdSalario,tdAcoes);
        corpoTbl.appendChild(linha);
    });
}
export { preencheTabela, valida, preencheDados, formFuncionario, spanErro }