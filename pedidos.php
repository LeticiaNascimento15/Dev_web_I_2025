<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pedido</title>

    <script>
        function abrirClientes() {
            window.open(
                'clientes.php',
                'clientes',
                'width=800,height=500,scrollbars=yes'
            );
        }
    </script>
</head>
<body>

<h2>Pedido</h2>

<form method="post">

    Código:<br>
    <input type="text" id="codigo_cliente" name="codigo_cliente" readonly>
    <br><br>

    Cliente:<br>
    <input type="text" id="nome_cliente" name="nome_cliente" size="50" readonly>
    <br><br>

    CNPJ:<br>
    <input type="text" id="cnpj_cliente" name="cnpj_cliente" readonly>
    <br><br>

    <button type="button" onclick="abrirClientes()">
        Selecionar Cliente
    </button>

</form>

</body>
</html>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Clientes</title>

<script>

function selecionarCliente(codigo,nome,cnpj)
{
    window.opener.document.getElementById('codigo_cliente').value = codigo;

    window.opener.document.getElementById('nome_cliente').value = nome;

    window.opener.document.getElementById('cnpj_cliente').value = cnpj;

    window.close();
}

</script>

<style>
table{
    border-collapse:collapse;
    width:100%;
}

th,td{
    border:1px solid #ccc;
    padding:8px;
}
</style>

</head>
<body>

<h2>Seleção de Clientes</h2>

<table>

<tr>
    <th>Código</th>
    <th>Cliente</th>
    <th>CNPJ</th>
    <th>Ação</th>
</tr>

<tr>
    <td>1</td>
    <td>FACINI</td>
    <td>12.345.678/0001-99</td>
    <td>
        <button onclick="selecionarCliente(
            '1',
            'FACINI',
            '12.345.678/0001-99'
        )">
            Selecionar
        </button>
    </td>
</tr>

<tr>
    <td>2</td>
    <td>ABC COMÉRCIO</td>
    <td>98.765.432/0001-11</td>
    <td>
        <button onclick="selecionarCliente(
            '2',
            'ABC COMÉRCIO',
            '98.765.432/0001-11'
        )">
            Selecionar
        </button>
    </td>
</tr>

<tr>
    <td>3</td>
    <td>XPTO LTDA</td>
    <td>55.444.333/0001-22</td>
    <td>
        <button onclick="selecionarCliente(
            '3',
            'XPTO LTDA',
            '55.444.333/0001-22'
        )">
            Selecionar
        </button>
    </td>
</tr>

</table>

</body>
</html>


<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "empresa"
);

$sql = "SELECT * FROM clientes";

$resultado = mysqli_query($conn,$sql);

while($cliente = mysqli_fetch_assoc($resultado))
{
?>
<tr>
    <td><?= $cliente['codigo'] ?></td>
    <td><?= $cliente['nome'] ?></td>
    <td><?= $cliente['cnpj'] ?></td>
    <td>

        <button onclick="selecionarCliente(
            '<?= $cliente['codigo'] ?>',
            '<?= htmlspecialchars($cliente['nome'], ENT_QUOTES) ?>',
            '<?= $cliente['cnpj'] ?>'
        )">
            Selecionar
        </button>

    </td>
</tr>
<?php
}
?>
