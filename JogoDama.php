<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <?php
$tabuleiro = [
    [null, 'P', null, 'P', null, 'P', null, 'P'],
    ['P', null, 'P', null, 'P', null, 'P', null],
    [null, 'P', null, 'P', null, 'P', null, 'P'],
    [null, null, null, null, null, null, null, null],
    [null, null, null, null, null, null, null, null],
    ['B', null, 'B', null, 'B', null, 'B', null],
    [null, 'B', null, 'B', null, 'B', null, 'B'],
    ['B', null, 'B', null, 'B', null, 'B', null],
];
echo "<table border='1'>";
foreach ($tabuleiro as $linha) {
    echo "<tr>";
    foreach ($linha as $casa) {echo "<td width='50' height='50' align='center'>";
        echo $casa ? $casa : '&nbsp;';
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>

    </table>
</body>
</html>