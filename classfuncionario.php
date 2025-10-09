abstract class Funcionario {
    protected $nome;
    protected $salario;

    public function __construct($nome, $salario) {
        $this->nome = $nome;
        $this->salario = $salario;
    }
    abstract public function calcularBonus();

    public function getNome() {
        return $this->nome;
    }
}

class Gerente extends Funcionario {
    public function calcularBonus(){
        return $this->salario * 0.20; 
    }
}


class Desenvolvedor extends Funcionario {
    public function calcularBonus() {
        return $this->salario * 0.10; 
    }
}

$funcionarios = [
    new Gerente("Marcos Silva", 10000),
    new Desenvolvedor("Ana Paula", 7000),
    new Desenvolvedor("Carlos Souza", 8500),
    new Gerente("Fernanda Lima", 12000),
    new Desenvolvedor("Juliana Torres", 9000)
];

foreach ($funcionarios as $funcionario) {
    echo "Funcionário: " . $funcionario->getNome() . " | Bônus: R$ " . number_format($funcionario->calcularBonus(), 2, ',', '.') . "<br>";
}
?>
