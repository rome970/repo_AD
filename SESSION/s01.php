<?php

// START THE SESSION
session_start();

// inicializamos los candadis a cerrados, poniendoles un 0
$_SESSION["C1"] = 0;
$_SESSION["C2"] = 0;
$_SESSION["C3"] = 0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="s02.php" method="post">
        <input type="submit" value="dame!!!">
    </form>
    <form action="cerrarSession.php" method="post">
        <input type="submit" value="CERRAR SESSION!">
    </form>
    
</body>
</html>