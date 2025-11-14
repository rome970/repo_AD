<?php
//var_export($_POST);
$resultado="Comienza el juego";
if (count($_POST)==0) // es la primera vez
{
    $num_objetivo = rand(1,10);
    $num_intentos = 0;
}
else // no es la primera vez
{
    //que vaya poniendo número de intentos
    $num_objetivo = $_POST['objetivo'];
    $num_intentos = $_POST['intentos'] + 1;
    if ($_POST['numero']==$num_objetivo)
    {
        $resultado = "Enhorabuena de la buena";
        echo '<script>alert("Enhorabuena lo has conseguido con '.$num_intentos.' intentos")</script>';
    }
    else if  ($_POST['numero']<$num_objetivo)
    {
        $resultado = "El objetivo es MAYOR";
    }
    else
    {
        $resultado = "El objetivo es MENOR";
    }

}
//echo "Número intentos: ".$num_intentos;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Adivina</title>
  </head>
  <body>
<div align="right">
    <span style="font-size: 1.5em;" class="badge bg-warning text-dark"><?php echo $num_intentos?></span>
</div>
<!--script>alert("Enhorabuena de la buena lo has conseguido");</!--script-->
<form action="adivina.php" method="post">
    <input type="hidden" name="objetivo" value="<?php echo $num_objetivo?>">
    <input type="hidden" name="intentos" value="<?php echo $num_intentos?>">
    <div class="container m-5">
        <div class="alert alert-success">
            <strong><?php echo $resultado?></strong>
        </div>
        <div class="mb-3">
            <label class="form-label">Número</label>
            <input type="number" class="form-control" name="numero">
        </div>
        <button type="submit" class="btn btn-primary">Adivina</button>
  </div>
</form>

  </body>
</html>