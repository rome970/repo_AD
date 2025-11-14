<?php
   // var_export($_POST);
    $res = 0;
    switch ($_POST["op"]) {
        case "+";
        echo "suma";
        $res = $_POST["n1"] + $_POST["n2"];
        break;
        case "-";
        echo "resta";
        $res = $_POST["n1"] - $_POST["n2"];
        break;
        case "x";
        echo "multiplicacion";
        $res = $_POST["n1"] * $_POST["n2"];
        break;
        case "/";
        echo "division";
        $res = $_POST["n1"] / $_POST["n2"];
        break;
        default:
        echo "error de operacion";
        break;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora con php y html</title>
</head>
<body>
    
    <form action="calculadora.php" method="post">

    numero1<input type="text" name="n1" id="n1">
    numero2<input type="text" name="n2" id="n2">
    <br/>
    <input type="submit" name="op" value="+">
    <input type="submit" name="op" value="-">
    <input type="submit" name="op" value="x">
    <input type="submit" name="op" value="/">
    <br/>
    R:<input type="text" value="<?php echo $res; ?>" name="resultado" id="res"> 

    </form>
        
</body>
</html>