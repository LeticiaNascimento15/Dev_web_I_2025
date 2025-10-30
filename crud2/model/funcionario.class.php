<?php
class Funcionario {
    public $id;
    public $nome;
    public $cargo;

    public function __construct($id, $nome, $cargo) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cargo = $cargo;
    }

    public function cadastrar() {
        $arquivo = fopen("../../data/funcionarios.txt", "a+");
        fwrite($arquivo, "$this->id|$this->nome|$this->cargo\n");
        fclose($arquivo);
    }

    public function alterar() {
        $funcs = self::listar("");
        $arquivo = fopen("../../data/funcionarios.txt", "w");
        foreach ($funcs as $f) {
            if ($f->id == $this->id) {
                fwrite($arquivo, "$this->id|$this->nome|$this->cargo\n");
            } else {
                fwrite($arquivo, "$f->id|$f->nome|$f->cargo\n");
            }
        }
        fclose($arquivo);
    }

    public function remover() {
        $funcs = self::listar("");
        $arquivo = fopen("../../data/funcionarios.txt", "w");
        foreach ($funcs as $f) {
            if ($f->id != $this->id) {
                fwrite($arquivo, "$f->id|$f->nome|$f->cargo\n");
            }
        }
        fclose($arquivo);
    }

    public static function pegaPorId($id) {
        $funcs = self::listar("");
        foreach ($funcs as $f) {
            if ($f->id == $id) return $f;
        }
        return null;
    }

    public static function listar($filtroNome) {
        $lista = [];
        if (file_exists("../../data/funcionarios.txt")) {
            $arquivo = fopen("../../data/funcionarios.txt", "r");
            while (!feof($arquivo)) {
                $linha = fgets($arquivo);
                if (trim($linha) == "") continue;
                list($id, $nome, $cargo) = explode("|", trim($linha));
                if ($filtroNome == "" || stripos($nome, $filtroNome) !== false) {
                    $lista[] = new Funcionario($id, $nome, $cargo);
                }
            }
            fclose($arquivo);
        }
        return $lista;
    }

    public function montaLinhaDados() {
        return "<tr><td>$this->nome</td><td>$this->cargo</td></tr>";
    }
}
?>
