<?php
$dig1 = '';
$dig2 = '';
$dig3 = '';

$msj1 = '';
$msj2 = '';
$msj3 = '';
$msj_candado = '';

$ok_candado = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if ($accion == 'revelar1') {
            $dig1 = '7';
            $msj1 = '¡Primer dígito revelado: ' . $dig1 . '!';
        } else {
            // accion == 'imagen' -> distraer
            $msj1 = 'Seguro? Intentalo de nuevo';
        }
    }
    if (isset($_POST['respuesta2'])) {
        $txt_fuji = strtolower(trim($_POST['respuesta2']));

        if ($txt_fuji == 'monte fuji' || $txt_fuji == 'fuji' || $txt_fuji == 'fujisan') {
            $dig2 = '3';
            $msj2 = '¡Correcto! Has registrado el dígito 2: ' . $dig2 . '!';
        } else {
            $msj2 = 'Respuesta incorrecta.';
        }
    }

    if (isset($_POST['digit3'])) {
        $valor_constante = trim($_POST['digit3']);

        if ($valor_constante == '3.14') {
            $dig3 = '7';
            $msj3 = '¡Correcto! Has registrado el dígito 3: ' . $dig3 . '!';
        } else {
            $msj3 = 'Respuesta incorrecta.';
        }
    }

    if (isset($_POST['candado'])) {
        $clave_escrita = trim($_POST['candado']);

        if ($clave_escrita == '737') {
            $msj_candado = '¡Clave correcta! Pulsa el botón para avanzar a la siguiente habitación.';
            $ok_candado = true;
        } else {
            $msj_candado = 'Clave incorrecta. Intenta de nuevo.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Habitación 1 - Volcanes</title>
<style>
body { margin:0; font-family: Arial, sans-serif; background: url('imagenes/volcanEncendido.webp') no-repeat center center/cover; color:#eef; text-align:center; }
.fondoForm{position:fixed;top:0;left:0;right:0;bottom:0;border:0;margin:0;padding:0;z-index:0}
.fondoBtn{width:100%;height:100%;border:0;background:transparent;cursor:pointer;opacity:0}
.contenedor { position:relative; z-index:2; max-width:700px; margin:40px auto; background:rgba(0,0,0,0.6); padding:25px; border-radius:10px; }
h1{margin-top:0}
.pista{ background:rgba(255,255,255,0.03); padding:15px; margin:15px 0; border-radius:8px; }
.fila{display:flex;justify-content:space-around;flex-wrap:wrap;gap:8px}
.form-img{background:none;border:none;padding:0}
.form-img button{background:none;border:none;padding:0;cursor:pointer}
.form-img img{max-width:30%;height:auto;display:block}
.msg{ color:#a8ffb0; margin-top:6px; }
.candado{ background:rgba(255,255,255,0.05); padding:15px; margin-top:20px; border-radius:8px; }
input[type="text"], input[type="number"]{ padding:8px; border-radius:4px; border:1px solid #333; width:80%; max-width:200px; }
button{ margin-top:10px; padding:10px 18px; border:none; border-radius:6px; background:#eef; color:#012; font-weight:bold; }
a{ color:#eef; text-decoration:none; display:inline-block; margin-top:10px; }
</style>
</head>
<body>
<form method="post" class="fondoForm">
<input type="hidden" name="accion" value="revelar1">
<button type="submit" class="fondoBtn" aria-label="revelar primer digito"></button></form>

<div class="contenedor">
<h1>Habitación 1 — Volcanes</h1>
<p>Resuelve los siguientes acertijos para conseguir el código secreto.</p>

<div class="pista">
<h2>PREGUNTA 1</h2>
<p>¿Cual es el volcán más activo? elija una sola opción.</p>
<div class="fila">
    <form method="post" class="form-img">
        <input type="hidden" name="accion" value="imagen">
        <button type="submit"><img src="imagenes/volcanApagado1.webp" alt="distractor1"></button>
    </form>

    <form method="post" class="form-img">
        <input type="hidden" name="accion" value="imagen">
        <button type="submit"><img src="imagenes/volcanApagado2.webp" alt="distractor2"></button>
    </form>
</div>
<p id="msj1" class="msg"><?php echo $msj1; ?></p>
</div>

<div class="pista">
<h2>PREGUNTA 2</h2>
<p>Soy un volcán no conocido como volcán. Tengo en la cima lo que a lo más caliente del infierno enfría lo más frío del invierno. Pista: Japón</p>
<form method="post">
<input type="text" name="respuesta2" placeholder="Escribe el nombre del volcán">
<button type="submit">Adivinar</button>
</form>
<?php if($msj2 != '') echo '<p class="msg">'.$msj2.'</p>'; ?>
</div>

<div class="pista">
<h2>PREGUNTA 3</h2>
<p>Introduce la constante que falta para completar la fórmula del Índice de Explosividad Volcánica (IEV).</p>
<p>VEI=log10​(V) +  ¿constante? x (10.023 / H)</p>
<form method="post">
<input type="text" name="digit3" placeholder="Constante?">
<button type="submit">Adivinar</button>
</form>
<?php if($msj3 != '') echo '<p class="msg">'.$msj3.'</p>'; ?>
</div>

<div class="candado">
<h2>Ingresa la combinación del candado</h2>
<form method="post">
<input type="text" name="candado" placeholder="XXX">
<button type="submit">Abrir candado</button>
</form>

<?php if($msj_candado != '') echo '<p class="msg">'.$msj_candado.'</p>'; ?>

<?php if($ok_candado): ?>
    <form action="room4.php" method="get" style="margin-top:10px;">
        <button type="submit">Avanzar a la siguiente habitación</button>
    </form>
<?php endif; ?>
</div>

<div class="nav">
<a href="home.php">Volver atrás</a>
</div>
</div>
</body>
</html>