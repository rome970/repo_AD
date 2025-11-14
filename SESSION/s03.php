<?php

// START THE SESSION
session_start();

// imprimir el estado de los candados

echo ("el candado 1 es: " .$_SESSION["C1"]);
echo ("el candado 2 es: " .$_SESSION["C2"]);
echo ("el candado 3 es: " .$_SESSION["C3"]);



$_SESSION["C2"] = 1;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="cerrarSession.php" method="post">
        <input type="submit" value="CERRAR SESSION!">
    </form>
    
</body>
</html>