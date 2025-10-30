<?php
abstract class ClassePai {
    public $id;
    protected $nomeArquivo = "";
    const SEPARADOR = "|";

    public function __construct($id, $nomeArquivo) {
        $this->id = $id;
        $this->nomeArquivo = $nomeArquivo;
    }

    // Cada classe filha deve montar sua linha de dados (com seus próprios campos)
    abstract function montaLinhaDados();

    // Encontra o último ID no arquivo para gerar o próximo
    public function encontraUltimoId() {
        if (!file_exists($this->nomeArquivo)) {
            $this->id = 1;
            return;
        }

        $arquivo = fopen($this->nomeArquivo, "r");
        $idTemp = 1;

        while (!feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty(trim($linha))) continue;
            $dados = explode(self::SEPARADOR, trim($linha));
            $idTemp = intval($dados[0]) + 1;
        }

        $this->id = $idTemp;
        fclose($arquivo);
    }

    // Cadastra (grava uma nova linha)
    public function cadastrar() {
        $this->encontraUltimoId();
        $arquivo = fopen($this->nomeArquivo, "a+");
        fwrite($arquivo, $this->montaLinhaDados() . "\n");
        fclose($arquivo);
    }

    // Remove um registro com o ID atual
    public function remover() {
        if (!file_exists($this->nomeArquivo)) return;
        $arquivo = fopen($this->nomeArquivo, "r+");
        $auxiliar = "";

        while (!feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty(trim($linha))) continue;

            $dados = explode(self::SEPARADOR, trim($linha));
            if ($dados[0] != $this->id) {
                $auxiliar .= $linha;
            }
        }

        ftruncate($arquivo, 0);
        rewind($arquivo);
        fwrite($arquivo, $auxiliar);
        fclose($arquivo);
    }

    // Altera o registro do ID atual
    public function alterar() {
        if (!file_exists($this->nomeArquivo)) return;
        $arquivo = fopen($this->nomeArquivo, "r+");
        $auxiliar = "";

        while (!feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty(trim($linha))) continue;

            $dados = explode(self::SEPARADOR, trim($linha));
            if ($dados[0] == $this->id) {
                $auxiliar .= $this->montaLinhaDados() . "\n";
            } else {
                $auxiliar .= $linha;
            }
        }

        ftruncate($arquivo, 0);
        rewind($arquivo);
        fwrite($arquivo, $auxiliar);
        fclose($arquivo);
    }
}
?>
