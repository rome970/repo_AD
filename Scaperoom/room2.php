<?php
session_start();
$mensaje = '';
$codigo = '472';
$codigoMostrado = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 if (isset($_POST['respuesta'])) {
  $r = trim($_POST['respuesta']);
  $r_low = strtolower($r);
  if ($r_low == 'bahia de lituya' || $r_low == 'bahía de lituya' || $r_low == 'lituya bay') {
   $mensaje = '¡Correcto! Este es el código del candado:';
   $codigoMostrado = $codigo;
  } else {
   $mensaje = 'Respuesta incorrecta. Intenta de nuevo.';
  }
 }
 if (isset($_POST['candado'])) {
  $c = trim($_POST['candado']);
  if ($c == $codigo) {
   $_SESSION['room2_completa'] = true;
   $mensaje = '¡Código correcto! Pulsa para avanzar.';
  } else {
   $mensaje = 'Código incorrecto. Intenta de nuevo.';
  }
 }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Habitación 2 - Tsunamis</title>
<style>
body{font-family:Arial;background:url('imagenes/BahiaLituya.webp')no-repeat center center/cover;color:#fff;text-align:center;margin:0}
.contenedor{max-width:800px;margin:60px auto;background:rgba(0,0,0,0.6);padding:20px;border-radius:8px}
.pista{background:rgba(255,255,255,0.1);padding:12px;border-radius:6px;margin-bottom:12px}
input[type="text"]{padding:8px;width:80%;border-radius:6px;border:none;margin-top:8px}
button{margin-top:8px;padding:8px 14px;border:none;border-radius:6px;background:#eef;color:#012;font-weight:bold}
.msg{margin-top:12px;color:#9cff9c}
.msg.error{color:#ff9c9c}
a{color:#fff;text-decoration:none;display:inline-block;margin-top:12px}
</style>
</head>
<body>
<div class="contenedor">
<h1>Habitación 2 — Tsunamis</h1>
<p>¿Donde fue el tsunami más grande del mundo?</p>
<p class="pista">Bravas Aguas Huracanadas Irrumpieron, Arrasando Desde Espacios Litorales Inundaron Terrenos, Urbes Y Aldeas.</p>

<form method="post">
<input type="text" name="respuesta" placeholder="Escribe tu respuesta..." required>
<br>
<button type="submit">Enviar respuesta</button>
</form>

<?php if($mensaje!='' && $codigoMostrado=='') echo '<p class="msg '.($mensaje=='Respuesta incorrecta. Intenta de nuevo.'?'error':'').'">'.$mensaje.'</p>'; ?>

<?php if($codigoMostrado!='') echo '<p class="msg">'.$codigoMostrado.'</p>'; ?>

<form method="post" style="margin-top:10px">
<input type="text" name="candado" placeholder="Introduce el código..." required>
<br>
<button type="submit">Verificar código</button>
</form>

<?php if($mensaje!='' && $codigoMostrado!='') echo '<p class="msg">'.$mensaje.'</p>'; ?>

<?php if(isset($_SESSION['room2_completa']) && $_SESSION['room2_completa']===true): ?>
<form action="room3.php" method="get" style="margin-top:8px"><button>Avanzar a la habitación 3</button></form>
<?php endif; ?>

<a href="home.php">Volver atrás</a>
</div>
</body>
</html>