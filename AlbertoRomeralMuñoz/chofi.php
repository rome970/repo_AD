<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chofi</title>
</head>
<body>
    <form action="batalla1.php" method="post" align="center">
        <label>
            Introduzca un numero del 1 al 3.
        </label>
        <input type="number" name="numero" min="1" max="3">
        &nbsp;&nbsp;&nbsp;
    
          <button type="submit">Resultado</button>
          <br>
            <br>
         <label>
            ¿Que saldrá? :
        </label>
        <select name="opcion" required>

            <option value="menor">jugador menor</option>
            <option value="mayor">jugador mayor</option>
            <option value="igual">iguales</option>

        </select>
     
      
    </form>
</body>
</html>