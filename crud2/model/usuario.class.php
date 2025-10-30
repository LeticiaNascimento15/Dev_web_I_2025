<?php
class Usuario {
    public $id;
    public $login;
    public $senha;

    public function __construct($id, $login, $senha) {
        $this->id = $id;
        $this->login = $login;
        $this->senha = $senha;
    }

    public function cadastrar() {
        $arquivo = fopen("../../data/usuarios.txt", "a+");
        fwrite($arquivo, "$this->id|$this->login|$this->senha\n");
        fclose($arquivo);
    }

    public function alterar() {
        $usuarios = self::listar("");
        $arquivo = fopen("../../data/usuarios.txt", "w");
        foreach ($usuarios as $u) {
            if ($u->id == $this->id) {
                fwrite($arquivo, "$this->id|$this->login|$this->senha\n");
            } else {
                fwrite($arquivo, "$u->id|$u->login|$u->senha\n");
            }
        }
        fclose($arquivo);
    }

    public function remover() {
        $usuarios = self::listar("");
        $arquivo = fopen("../../data/usuarios.txt", "w");
        foreach ($usuarios as $u) {
            if ($u->id != $this->id) {
                fwrite($arquivo, "$u->id|$u->login|$u->senha\n");
            }
        }
        fclose($arquivo);
    }

    public static function pegaPorId($id) {
        $usuarios = self::listar("");
        foreach ($usuarios as $u) {
            if ($u->id == $id) return $u;
        }
        return null;
    }

    public static function listar($filtroLogin) {
        $lista = [];
        if (file_exists("../../data/usuarios.txt")) {
            $arquivo = fopen("../../data/usuarios.txt", "r");
            while (!feof($arquivo)) {
                $linha = fgets($arquivo);
                if (trim($linha) == "") continue;
                list($id, $login, $senha) = explode("|", trim($linha));
                if ($filtroLogin == "" || stripos($login, $filtroLogin) !== false) {
                    $lista[] = new Usuario($id, $login, $senha);
                }
            }
            fclose($arquivo);
        }
        return $lista;
    }

    public function montaLinhaDados() {
        return "<tr><td>$this->login</td><td>$this->senha</td></tr>";
    }
}
?>
