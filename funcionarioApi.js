import { fazRequisicaoAA, verificaErros } from "../js/verifica.js";
const url = '../../api/funcionario/controller/';
export async function insere( funcionario ) {
        let resposta =  await fazRequisicaoAA( url+'inserir2.php' , 'POST', funcionario ); 
        let dados = await verificaErros( resposta );
        if( ! dados )
            throw new Error(' Dados esperados ausentes.  ');
        return dados;
}

export async function lista( ) {
        let resposta =  await fazRequisicaoAA( url+'listar.php' ); 
        let dados = await verificaErros( resposta );
        if( ! dados )
            throw new Error(' Dados esperados ausentes.  ');
        return dados;
}
export async function remove(id) {
    let resposta= await fazRequisicaoAA(url+'remover.php?id='+id, 'DELETE');
    if (resposta.status===204)
        return;
    let dados = await verificaErros(resposta);
    if (!dados)
        throw new Error('Dados esperados ausentes.');
    return dados;
}