const formFuncionario = document.querySelector('#formFuncionario');
const spanErro = document.querySelector('#erro');

function preencheTabela(funcionarios){
    const corpoTbl=document.querySelector('#tblfuncionario tbody');
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
export { preencheTabela,formFuncionario, spanErro }