<?php
/*
===========================================================
📘 RESUMEN EXPLICATIVO DE CÓDIGOS PHP BÁSICOS
===========================================================

Este archivo resume los conceptos fundamentales de los ejemplos PHP:
- Uso básico de PHP incrustado en HTML
- Estructuras de control (if, for, switch)
- Formularios con método POST
- Variables, aleatorios, acumuladores
- Envío de datos entre páginas
===========================================================
*/


/* =========================================================
1️⃣ TABLA DE NÚMEROS ALEATORIOS CON DIAGONALES
============================================================
- Se crean variables acumuladoras.
- Se usa un doble bucle "for" para generar una tabla 15x15.
- Cada celda muestra un número aleatorio entre 1 y 9.
- Se calcula la suma total, la diagonal principal y la inversa.
========================================================== */
$acumulador = 0;
$acumDiagonal = 0;
$acumDiagonalInv = 0;
$tam = 15;

for ($i = 0; $i < $tam; $i++) {
    for ($j = 0; $j < $tam; $j++) {
        $valor = rand(1,9);
        $acumulador += $valor;
        if ($j == $i) $acumDiagonal += $valor;              // Diagonal principal
        if ($i + $j == ($tam - 1)) $acumDiagonalInv += $valor; // Diagonal inversa
    }
}
// echo $acumulador, $acumDiagonal, $acumDiagonalInv;


/* =========================================================
2️⃣ "HOLA MUNDO" Y NÚMERO ALEATORIO
============================================================
- Uso básico de "echo".
- Función rand() para generar número aleatorio.
- Condicional if() para mostrar mensaje si el número es 6.
========================================================== */
echo "Hola Mundo<br>";
$num = rand(1,6);
echo "El número del dado es $num<br>";
if ($num == 6) echo "CAMPEÓN<br>";


/* =========================================================
3️⃣ FORMULARIOS CON MÉTODO POST
============================================================
- En un formulario HTML se envían datos a otro archivo (action="b.php").
- El método POST guarda los valores en $_POST['campo'].
- Se puede mostrar su contenido con var_export($_POST).
- Ejemplo de proceso encadenado:
  a.php → b.php → c.php
  - a.php pide datos
  - b.php los modifica (+1 o añade texto)
  - c.php combina resultados finales
========================================================== */
// var_export($_POST);


/* =========================================================
4️⃣ CALCULADORA BÁSICA CON SWITCH
============================================================
- Se reciben dos números (n1, n2) y un operador (op).
- El switch evalúa el valor de "op" y realiza la operación.
- El resultado se muestra en el mismo formulario.
========================================================== */
$res = 0;
switch ($_POST["op"] ?? "") {
    case "+": $res = $_POST["n1"] + $_POST["n2"]; break;
    case "-": $res = $_POST["n1"] - $_POST["n2"]; break;
    case "x": $res = $_POST["n1"] * $_POST["n2"]; break;
    case "/": $res = $_POST["n1"] / $_POST["n2"]; break;
    default: $res = "Error de operación"; break;
}
// echo $res;


/* =========================================================
5️⃣ JUEGO "ADIVINA EL NÚMERO"
============================================================
- Usa variables ocultas (hidden) para mantener el estado entre envíos.
- Si es la primera vez (sin POST), genera un número objetivo aleatorio.
- Cada vez que el usuario envía un número, aumenta el contador de intentos.
- Compara el número enviado con el objetivo:
    → Si es igual → muestra mensaje de éxito con alert()
    → Si es menor → indica "el objetivo es MAYOR"
    → Si es mayor → indica "el objetivo es MENOR"
========================================================== */

$resultado = "Comienza el juego";

if (count($_POST) == 0) {
    // Primera vez que se entra
    $num_objetivo = rand(1,10);
    $num_intentos = 0;
} else {
    // Intentos siguientes
    $num_objetivo = $_POST['objetivo'];
    $num_intentos = $_POST['intentos'] + 1;

    if ($_POST['numero'] == $num_objetivo) {
        $resultado = "¡Enhorabuena! Lo has conseguido.";
    } elseif ($_POST['numero'] < $num_objetivo) {
        $resultado = "El número objetivo es MAYOR";
    } else {
        $resultado = "El número objetivo es MENOR";
    }
}

// echo $resultado, $num_intentos;


/*
===========================================================
📄 CONCEPTOS CLAVE RESUMIDOS
-----------------------------------------------------------
- echo → imprime texto o variables.
- rand(min, max) → número aleatorio.
- if / else / switch → control de flujo.
- $_POST['campo'] → datos de formulario.
- count($_POST) → saber si se enviaron datos.
- for($i=0;$i<$n;$i++) → bucle repetitivo.
- form action="archivo.php" method="post" → envía datos.
- input type="hidden" → guarda valores sin mostrarlos.
- var_export($_POST) → muestra estructura del array POST.
===========================================================
*/
?>
