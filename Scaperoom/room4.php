<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Habitación 4 - Tornados</title>
<style>
body { margin:0; font-family: Arial, sans-serif; background:#001; color:#eef; text-align:center; }
.contenedor { max-width:800px; margin:40px auto; background:rgba(0,0,0,0.7); padding:25px; border-radius:10px; }
h1{margin-top:0}
.pista{ background:rgba(255,255,255,0.03); padding:15px; margin:15px 0; border-radius:8px; }
img{ max-width:30%; height:auto; border-radius:6px; cursor:pointer; margin:10px 0; }
button{ margin-top:10px; padding:10px 18px; border:none; border-radius:6px; background:#eef; color:#012; font-weight:bold; cursor:pointer; }
.msg{ color:#a8ffb0; margin-top:6px; }
.flex{ display:flex; justify-content:space-around; flex-wrap:wrap; }
input[type="text"] { margin-top:10px; padding:8px; border-radius:4px; border:none; font-size:16px; width:100px; text-align:center; }
a { color:#eef; text-decoration:none; }
</style>
</head>
<body>
<div class="contenedor">
<h1>Habitación 4 — Tornados</h1>
<p>Selecciona los 3 tornados.</p>

<div class="pista flex">
    <img src="imagenes/tornado1.webp" data-tipo="t" onclick="imagenClicada(this)">
    <img src="imagenes/huracan1.webp" data-tipo="h" onclick="imagenClicada(this)">
    <img src="imagenes/tornado2.webp" data-tipo="t" onclick="imagenClicada(this)">
    <img src="imagenes/huracan2.webp" data-tipo="h" onclick="imagenClicada(this)">
    <img src="imagenes/tornado3.webp" data-tipo="t" onclick="imagenClicada(this)">
    <img src="imagenes/huracan3.webp" data-tipo="h" onclick="imagenClicada(this)">
</div>

<p class="msg" id="mensaje"></p>

<div id="inputCodigo" style="display:none;">
    <p>El código es: <b id="codigoRevelado"></b></p>
    <input type="text" id="codigoInput" placeholder="Código">
    <button type="button" onclick="verificarCodigo()">Enviar</button>
</div>

<div id="botonAvanzar" style="display:none; margin-top:10px;">
    <form action="room5.php" method="get">
        <button type="submit">Avanzar a la siguiente habitación</button>
    </form>
</div>

<div style="margin-top:20px;">
    <a href="home.php">Volver atrás</a>
</div>
</div>

<script>
var seleccionados = [];
var codigo_correcto = "958";

function imagenClicada(el) {
    seleccionados.push(el.dataset.tipo);

    if (seleccionados.length === 3) {
        var todosT = true;
        for (var i = 0; i < seleccionados.length; i++) {
            if (seleccionados[i] !== 't') {
                todosT = false;
                break;
            }
        }

        if (todosT) {
            document.getElementById('mensaje').innerHTML = '¡Has encontrado los 3 tornados!';
            document.getElementById('inputCodigo').style.display = 'block';
            document.getElementById('codigoRevelado').innerText = codigo_correcto;
        } else {
            document.getElementById('mensaje').innerHTML = 'Has fallado. ¡Inténtalo de nuevo!';
        }
        seleccionados = [];
    }
}
function verificarCodigo() {
    var clav = document.getElementById('codigoInput').value;
    if (clav === codigo_correcto) {
        document.getElementById('botonAvanzar').style.display = 'block';
        document.getElementById('mensaje').innerHTML = 'Código correcto. ¡Puedes avanzar!';
    } else {
        document.getElementById('mensaje').innerHTML = 'Código incorrecto. Vuelve a intentar los tornados.';
        document.getElementById('inputCodigo').style.display = 'none';
    }
}
</script>
</body>
</html>