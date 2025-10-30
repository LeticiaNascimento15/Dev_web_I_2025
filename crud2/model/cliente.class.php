<?php
class Cliente {
    public $id;
    public $nome;
    public $telefone;

    public function __construct($id, $nome, $telefone) {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
    }

    public function cadastrar() {
        $arquivo = fopen("../../data/clientes.txt", "a+");
        fwrite($arquivo, "$this->id|$this->nome|$this->telefone\n");
        fclose($arquivo);
    }

    public function alterar() {
        $clientes = self::listar("");
        $arquivo = fopen("../../data/clientes.txt", "w");
        foreach ($clientes as $c) {
            if ($c->id == $this->id) {
                fwrite($arquivo, "$this->id|$this->nome|$this->telefone\n");
            } else {
                fwrite($arquivo, "$c->id|$c->nome|$c->telefone\n");
            }
        }
        fclose($arquivo);
    }

    public function remover() {
        $clientes = self::listar("");
        $arquivo = fopen("../../data/clientes.txt", "w");
        foreach ($clientes as $c) {
            if ($c->id != $this->id) {
                fwrite($arquivo, "$c->id|$c->nome|$c->telefone\n");
            }
        }
        fclose($arquivo);
    }

    public static function pegaPorId($id) {
        $clientes = self::listar("");
        foreach ($clientes as $c) {
            if ($c->id == $id) return $c;
        }
        return null;
    }

    public static function listar($filtroNome) {
        $lista = [];
        if (file_exists("../../data/clientes.txt")) {
            $arquivo = fopen("../../data/clientes.txt", "r");
            while (!feof($arquivo)) {
                $linha = fgets($arquivo);
                if (trim($linha) == "") continue;
                list($id, $nome, $telefone) = explode("|", trim($linha));
                if ($filtroNome == "" || stripos($nome, $filtroNome) !== false) {
                    $lista[] = new Cliente($id, $nome, $telefone);
                }
            }
            fclose($arquivo);
        }
        return $lista;
    }

    public function montaLinhaDados() {
        return "<tr><td>$this->nome</td><td>$this->telefone</td></tr>";
    }
}
?>
