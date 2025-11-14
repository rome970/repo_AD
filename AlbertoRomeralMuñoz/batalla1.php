<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Batalla 1</title>
</head>
<body>
    <center><h1>CHOFI SACA</h1></center>
    <?php
    $jugador = $_POST['numero'];
    $opcion = $_POST['opcion'];
    $chofiNum = rand(1, 3);

    echo "<center><p>NUMERO DE CHOFI:$chofiNum</p></center>";
    
    $resultado = '';
    
    
    if ( ($chofiNum < $jugador && $opcion == "menor") || ($chofiNum > $jugador && $opcion == "mayor") || ($chofiNum == $jugador && $opcion == "igual")
    ) {
        $resultado = "¡PERFECTO, CONTINUAS!";
        echo "<p><center>$resultado</p></center>";
        echo '<center><form action="chofo.php" method="post"><button type="submit">Continuar</button></form></center>';
    } else {
        $resultado = "¡MUERTO!";
        echo "<p><center>$resultado</p></center>";
        echo '<center><form action="chofi.php" method="get"><button type="submit">Volver atrás</button></form></center>';
    }
    ?>
</body>
</html>