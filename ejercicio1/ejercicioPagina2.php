    <?php
      //  var_export(value:$_POST);

        $num1 = $_POST['numero1']+1;
        $num2 = $_POST['numero2']+1;
        $num3 = $_POST['numero3']-1;
        $suma = $num1 + $num2 + $num3;
        $estilo = "";
        $sumaEscrita = $num1 . ' + ' . $num2 . ' + ' . $num3;
        $imagenVacia = "";


        $imagen1 = "simpson1.webp";
        $imagen2 = "simpson2.webp";
        $imagen3 = "simpson3.webp";

        $numeroRandom =  random_int(0,2);

        if($numeroRandom == 0) {
          $imagenVacia = $imagen1;
        }elseif($numeroRandom == 1) {
          $imagenVacia = $imagen2;
        }elseif($numeroRandom == 2) {
          $imagenVacia = $imagen3;
        }




        if($suma > 15){
          $estilo = "style =' background-color: greenyellow' ";
        }
        


      //   echo "El numero 1 es ". $num1;
      //  echo "El numero 2 es ". $num2;
        

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <br/>
        <input type="text" value="<?php echo $num1?>"/>
        <br/>
        <input type="text" value="<?php echo $num2?>"/>
        <br/>
        <input type="text" value="<?php echo $num3?>"/>
        <br/>
        <input type="text" value="<?php echo $suma?>"/>
        <br/>
        <input type="text" <?php echo $estilo?> value="<?php echo $sumaEscrita?>"/>
        <br/>
        <input type="image" src="<?php echo $imagenVacia?>"/>
      
     </body>
        </html>
