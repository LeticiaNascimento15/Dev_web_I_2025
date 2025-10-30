<?php
class Produto {
    public $id;
    public $nome;
    public $preco;
    public $estoque;

    public function __construct($id, $nome, $preco, $estoque) {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function cadastrar() {
        $arquivo = fopen("../../data/produtos.txt", "a+");
        fwrite($arquivo, "$this->id|$this->nome|$this->preco|$this->estoque\n");
        fclose($arquivo);
    }

    public function alterar() {
        $produtos = self::listar("");
        $arquivo = fopen("../../data/produtos.txt", "w");
        foreach ($produtos as $p) {
            if ($p->id == $this->id) {
                fwrite($arquivo, "$this->id|$this->nome|$this->preco|$this->estoque\n");
            } else {
                fwrite($arquivo, "$p->id|$p->nome|$p->preco|$p->estoque\n");
            }
        }
        fclose($arquivo);
    }

    public function remover() {
        $produtos = self::listar("");
        $arquivo = fopen("../../data/produtos.txt", "w");
        foreach ($produtos as $p) {
            if ($p->id != $this->id) {
                fwrite($arquivo, "$p->id|$p->nome|$p->preco|$p->estoque\n");
            }
        }
        fclose($arquivo);
    }

    public static function pegaPorId($id) {
        $produtos = self::listar("");
        foreach ($produtos as $p) {
            if ($p->id == $id) return $p;
        }
        return null;
    }

    public static function listar($filtroNome) {
        $lista = [];
        if (file_exists("../../data/produtos.txt")) {
            $arquivo = fopen("../../data/produtos.txt", "r");
            while (!feof($arquivo)) {
                $linha = fgets($arquivo);
                if (trim($linha) == "") continue;
                list($id, $nome, $preco, $estoque) = explode("|", trim($linha));
                if ($filtroNome == "" || stripos($nome, $filtroNome) !== false) {
                    $lista[] = new Produto($id, $nome, $preco, $estoque);
                }
            }
            fclose($arquivo);
        }
        return $lista;
    }

    public function montaLinhaDados() {
        return "<tr><td>$this->nome</td><td>$this->preco</td><td>$this->estoque</td></tr>";
    }
}
?>
