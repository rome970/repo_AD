<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chofo</title>
</head>


<body>
 <center>
    <form action="batallafinal.php" method="post">
        <label>Introduzca un numero del 1 al 10:</label>
        <input type="number" name="numero" min="1" max="10" required>
         &nbsp;&nbsp;&nbsp;

        <button type="submit" align ="center">Resultado</button>
        <br>
        <br>
       
        <label>¿Que saldrá?</label>
        <select name="prediccion1" required>
            <option value="diferencia1">Jugador a dif de 1</option>
            <option value="diferencia2">Jugador a dif de 2</option>
            <option value="igual">Iguales</option>
        </select>
        <br>
        <br>
        <br>
        <label>¿Y que saldrá aqui?</label>
        <select name="prediccion2" required>
            <option value="menor2">Chofo saca menor</option>
            <option value="mayor2">Chofo saca mayor</option>
            <option value="iguales">Chofo saca igual</option>
        </select>
        </center>
      
        
    </form>
</body>
</html>
