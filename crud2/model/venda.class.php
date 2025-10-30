<?php
class Venda {
    public $id;
    public $id_cliente;
    public $id_produto;
    public $quantidade;

    public function __construct($id, $id_cliente, $id_produto, $quantidade) {
        $this->id = $id;
        $this->id_cliente = $id_cliente;
        $this->id_produto = $id_produto;
        $this->quantidade = $quantidade;
    }

    public function cadastrar() {
        $arquivo = fopen("../../data/vendas.txt", "a+");
        fwrite($arquivo, "$this->id|$this->id_cliente|$this->id_produto|$this->quantidade\n");
        fclose($arquivo);
    }

    public function alterar() {
        $vendas = self::listar("");
        $arquivo = fopen("../../data/vendas.txt", "w");
        foreach ($vendas as $v) {
            if ($v->id == $this->id) {
                fwrite($arquivo, "$this->id|$this->id_cliente|$this->id_produto|$this->quantidade\n");
            } else {
                fwrite($arquivo, "$v->id|$v->id_cliente|$v->id_produto|$v->quantidade\n");
            }
        }
        fclose($arquivo);
    }

    public function remover() {
        $vendas = self::listar("");
        $arquivo = fopen("../../data/vendas.txt", "w");
        foreach ($vendas as $v) {
            if ($v->id != $this->id) {
                fwrite($arquivo, "$v->id|$v->id_cliente|$v->id_produto|$v->quantidade\n");
            }
        }
        fclose($arquivo);
    }

    public static function pegaPorId($id) {
        $vendas = self::listar("");
        foreach ($vendas as $v) {
            if ($v->id == $id) return $v;
        }
        return null;
    }

    public static function listar($filtro) {
        $lista = [];
        if (file_exists("../../data/vendas.txt")) {
            $arquivo = fopen("../../data/vendas.txt", "r");
            while (!feof($arquivo)) {
                $linha = fgets($arquivo);
                if (trim($linha) == "") continue;
                list($id, $id_cliente, $id_produto, $quantidade) = explode("|", trim($linha));
                if ($filtro == "" || stripos($id_cliente, $filtro) !== false) {
                    $lista[] = new Venda($id, $id_cliente, $id_produto, $quantidade);
                }
            }
            fclose($arquivo);
        }
        return $lista;
    }

    public function montaLinhaDados() {
        return "<tr><td>$this->id_cliente</td><td>$this->id_produto</td><td>$this->quantidade</td></tr>";
    }
}
?>
