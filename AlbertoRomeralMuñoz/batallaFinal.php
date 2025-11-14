<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Batalla Final</title>
</head>
<body>
    <center><h1> CHOFO SACA</h1></center>
    <?php
    $jugador = $_POST['numero'];
    $prediccion1 = $_POST['prediccion1'];
    $prediccion2 = $_POST['prediccion2'];

    $chofoNum = rand(1, 10);

    echo "<h1><p><center>$chofoNum</center></p></h1>";

    $diferencia = abs($chofoNum - $jugador);
    $acierto1 = false;
    $acierto2 = false;

   
    if ($prediccion1 == "igual" && $diferencia == 0) {
        $acierto1 = true;
    } elseif ($prediccion1 == "diferencia1" && $diferencia == 1) {
        $acierto1 = true;
    } elseif ($prediccion1 == "diferencia2" && $diferencia == 2) {
        $acierto1 = true;
    }

    if ($prediccion2 == "iguales" && $chofoNum == $jugador) {
        $acierto2 = true;
    } elseif ($prediccion2 == "menor2" && $chofoNum < $jugador) {
        $acierto2 = true;
    } elseif ($prediccion2 == "mayor2" && $chofoNum > $jugador) {
        $acierto2 = true;
    }

    if ($acierto1 && $acierto2) {
        echo "<center><h1>¡ENHORA BEUNA DE LA BUENA!</h1></center>";
    } else {
        echo "<center><h1>OHHHH!!!</h1></center>";
    }
    ?>
    
</body>
</html>
