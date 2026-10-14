<?php
require_once 'conexaoP.php';
try {

    $pdo = getPDO();

    $representante = $_POST['representante'];

    $sql = "

        SELECT

            A3_COD,
            A3_NOME

        FROM represen
        WHERE A3_COD = '$representante'
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $dados = $stmt->fetchAll();

} catch(PDOException $erro) {
    echo $erro->getMessage();

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pedidos</title>
    <link rel="stylesheet" href="tela.css">
    <script> 
    function SelecionarClientes(){
        window.open(
            'pedidos.php',
            'pedido',
            'width=800, height=500,scrollbars=yes'
        );
    }
    </script>
</head>


<body>
   <header class="topo">
    <div class="empresa">
          <h1>Representante</h1>
    <table>

        <tr>
            <th>Cód Representante</th>
            <th>Nome Representante</th>
        </tr>
<?php

        if(!empty($dados)) {
            foreach($dados as $linha) {

                echo "<tr>";
                echo "<td>" . $linha['A3_COD'] . "</td>";
                echo "<td>" . $linha['A3_NOME'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "
                <tr>

                    <td colspan='4'>
                        Nenhum cliente encontrado
                    </td>

                </tr>
            ";
        }
        ?>
        
    </table>
    </div>


    <div class="info">
        INFORMAÇÕES
    </div>
</header>

<nav class="menu-principal">
    <h1>Consultas:</h1>
    <ul>
        <li><a href="#">Orçamentos</a></li>
        <li><a href="#">Posição Ped.</a></li>
        <li><a href="#">Clientes</a></li>
        <li><a href="#">Ped. Enviados</a></li>
        <li><a href="#">Histórico Comis.</a></li>
        <li><a href="#">Previsão Comis.</a></li>
        <li><a href="#">Pedidos</a></li>
        <li><a href="#">Prospects</a></li>
    </ul>
</nav>

<nav class="menu-acoes">
    Cadastros:
    <ul>
        <li><a href="#">Pedidos</a></li>
        <li><a href="#" onclick="SelecionarClientes();return false;"> 
            Selecionar Clientes</a></li>
        <li><a href="#">Incluir Produtos</a></li>
        <li><a href="#">Condições de Pagto</a></li>
        <li><a href="#">Descontos</a></li>
        <li><a href="#">Observações</a></li>
        <li><a href="#">Mostruários</a></li>
    </ul>
</nav>

    <div>

    </div>

    
<main class="conteudo">
    <div class="box">
        <h2>Área do Sistema</h2>
    <body>
  <div>
  <div class="headstatus">
      <h2 class="h2text">VENDAS</h2>
      <img src="imagens/um_status/Data_Update_1.png" style="width: 120px;">
    </div>

    <main>
      <section id='teste' style='min-width: 600px; max-width: 1200px' class='panel'>
        <h3 class='text'></h3>
      </section>
      <section id='teste' style="max-width: 395px;" class='panel'>
        <h3 class='text'></h3>
      </section>
      <section id='teste' style="max-width: 395px;" class='panel'>
        <h3 class='text'></h3>
      </section>
    </main>

    <br>

    <div style="display: inline-flex;align-items: baseline;">
      <div class="container2">
        <div class="container3">
          <div class="textlgnd">

            <button class="Lgnd" style="background-color:#ffd400; cursor: auto;">
              <div class="linkpreto Lgnd3">Falta para Meta</div>
            </button>
          </div>

          <div class="textlgnd">
            <button class="Lgnd" style="background-color:#ed1c24; cursor: auto;">
              <div class="linkpreto Lgnd3">Venda Abaixo da Meta</div>
            </button>
          </div>
          
          <div class="textlgnd">
            <button class="Lgnd" style="background-color:#4e79a7; cursor: auto;">
              <div class="linkpreto Lgnd3">Venda Acima da Meta</div>
            </button>
          </div>
        </div>
        <div class="container3">
          <div class="textlgnd">
            <div class="linkpreto Lgnd3"> ___ &nbsp; Meta</div>
          </div>
          <div class="textlgnd">
            <div class="Lgnd2">
              <div class="linkpreto Lgnd3"> ---- &nbsp; Tendência</div>
              <div class="hide3">Previsão de fechamento do período, projetando a média de vendas até o momento</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <br>
    <div class="headstatus">
      <h2 class="h2text">STATUS CLIENTES</h2>
      <img src="imagens/um_status/Data_Update_2.png" style="width: 120px;">
    </div>
    <main>
      <section id='teste2' style="max-width: 600px;" class='panel'>
        <h3 class='text'></h3>
      </section>
      <section id="teste2" style='min-width: 600px; max-width: 1200px' class='panel'>
        <h3 class='text'></h3>
      </section>  
    </main>
    <div style="display: inline-flex;align-items: flex-start;height: 150px;">
      <div class="container2">
        <div class="container3">
          <div class="textlgnd">
            <div class="Lgnd" style="background-color:#24693d;">
              <div class="linkpreto Lgnd3" style="padding-left: 25px;">Clientes Ativos</div>
            </div>
          </div>
          <div class="textlgnd">
            <div class="Lgnd" style="background-color:#b71d3e;">
              <div class="linkpreto Lgnd3" style="padding-left: 25px;">Clientes Inativos</div>
            </div>
          </div>
        </div>
      </div>
      <div class="container2">
        <div class="container3">
          <div class="textlgnd">
            <button class="Lgnd" style="background-color:#f59c3c;">
              <div class="linkpreto" style="margin: 0; padding-left: 20px;">Lead</div>
              <div class="hide">Clientes cadastrados sem compra</div>
            </button>
          </div>
        </div>
        <div class="container3">
          <div class="textlgnd">
            <button class="Lgnd" style="background-color:#85ca77;">
              <div class="linkpreto" style="margin: 0; padding-left: 20px;">Novo</div>
              <div class="hide">Clientes que fizeram sua 1° compra no mês atual</div>
            </button>
          </div>
          <div class="textlgnd">
            <button class="Lgnd" style="background-color:#61a956;">
              <div class="linkpreto" style="margin: 0; padding-left: 20px;">Recente</div>
              <div class="hide">Clientes que estão ativos mas fizeram somente uma compra</div>
            </button>
          </div>
          <div class="textlgnd">
            <button class="Lgnd" style="background-color:#398949;">
              <div class="linkpreto" style="margin: 0; padding-left: 20px;">Reativado</div>
              <div class="hide">Clientes que estavam inativos e compraram novamente no mês atual</div>
            </button>
          </div> 
          <div class="textlgnd">
            <button class="Lgnd" style="background-color:#24693d;">
              <div class="linkpreto" style="margin: 0; padding-left: 20px;">Recorrente</div>
              <div class="hide">Clientes que estão ativos e fizeram mais de uma compra</div>
            </button>
          </div>          
        </div>
        <div class="container3">
          <div class="textlgnd">
            <button class="Lgnd" style="background-color:#e96b20;">
              <div class="linkpreto" style="width:60px; margin: 0; padding-left: 20px;">1 Compra</div>
              <div class="hide">Clientes que estão inativos e fizeram somente uma compra</div>
            </button>
          </div>
          <div class="textlgnd">
            <button class="Lgnd" style="background-color:#b71d3e;">
              <div class="linkpreto" style="margin: 0; padding-left: 20px;">Inativo</div>
              <div class="hide">Clientes que estão inativos e fizeram mais de uma compra</div>
            </button>
          </div>   
        </div>
      </div>
      <div class="container2"> 
        <div class="container3">
          <div class="Lgnd2">
            <img src="imagens/um_status/Fluxograma.png" width='50' height='50'>
            Fluxograma
            <div class="hide2">
              <img src="imagens/um_status/Fluxograma.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="headstatus">
      <h2 class="h2text">CLIENTES INATIVOS</h2>
      <img src="imagens/um_status/Data_Update_2.png" style="width: 120px;">
    </div>
    <main>
      <section id='teste3' style="width: 300px; max-width: 600px" class='panel'>
        <h3 class='text'></h3>
      </section>
      <section id="teste3" style='width: 300px; max-width: 600px' class='panel'>
        <h3 class='text'></h3>
      </section>  
    </main>
    
    <div style="display: inline-flex;align-items: flex-start;height: 150px;">
      <div class="container2">
        <div class="container3">
          <div class="tit">Inativa em:</div>
          <div class="textlgnd">
            <div class="Lgnd" style="background-color:#e15759;">
              <div class="linkpreto Lgnd3" style="padding-left: 25px;">Até 15 dias</div>
            </div>
          </div>
          <div class="textlgnd">
            <div class="Lgnd" style="background-color:#edc948;">
              <div class="linkpreto Lgnd3" style="padding-left: 25px;">16 á 30 dias</div>
            </div>
          </div>
          <div class="textlgnd">
            <div class="Lgnd" style="background-color:#f28e2b;">
              <div class="linkpreto Lgnd3" style="padding-left: 25px;">30 dias ou mais</div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>

<style>
  #teste:nth-of-type(1) {
    background: url("imagens/um_status/000001.png") no-repeat;
    background-color: white;
    background-origin: content-box;
    background-size: 100% 100%;
  }
  #teste:nth-of-type(2) {
    background: url("imagens/um_status/000001_1.png") no-repeat;
    background-color: white;
    background-origin: content-box;
    background-size: 100% 100%;
  }
  #teste:nth-of-type(3) {
    background: url("imagens/um_status/000001_2.png") no-repeat;
    background-color: white;
    background-origin: content-box;
    background-size: 100% 100%;
  }
  #teste2:nth-of-type(1) {
    background: url("imagens/um_status/000001_3.png") no-repeat;
    background-color: white; 
    background-origin: content-box;
    background-size: 100% 100%; 
  }
  #teste2:nth-of-type(2) {
    background: url("imagens/um_status/000001_4.png") no-repeat;
    background-color: white;
    background-origin: content-box;
    background-size: 100% 100%;
  }
  #teste3:nth-of-type(1) {
    background: url("imagens/um_inatividade/000001_1.png") no-repeat;
    background-color: white; 
    background-origin: content-box;
    background-size: 100% 100%; 
  }
  #teste3:nth-of-type(2) {
    background: url("imagens/um_inatividade/000001_2.png") no-repeat;
    background-color: white;
    background-origin: content-box;
    background-size: 100% 100%;
  }
  .tit{
    padding: 8px;
    font-weight: bold;
    text-align: center;
  }
</style>
    </div>

</main> 


</form>
</script>


</body>
</html>