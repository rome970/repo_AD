<?php
session_start();
$preguntas = [
 ['preg'=>'¿Qué debes hacer primero cuando empieza un terremoto?','op'=>['Salir corriendo al exterior','Buscar un lugar seguro y agacharte','Ponerte debajo del marco de una puerta'],'correcta'=>1],
 ['preg'=>'Si estás dentro de un edificio, ¿qué lugar es más seguro?','op'=>['Cerca de ventanas','Debajo de una mesa resistente','Al lado de un ascensor'],'correcta'=>1],
 ['preg'=>'¿Debes usar el ascensor durante o después de un terremoto?','op'=>['Sí, para bajar más rápido','Solo si es emergencia','No, nunca'],'correcta'=>2],
 ['preg'=>'Si estás en la calle durante un terremoto, ¿qué debes hacer?','op'=>['Alejarte de edificios y postes','Ir a un área abierta','Ponerte debajo de árboles altos'],'correcta'=>0]
];
$mensaje = '';
$mostrarInput = false;
$codigo = '530';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 if (isset($_POST['codigo_ingresado'])) {
  $c = trim($_POST['codigo_ingresado']);
  if ($c == $codigo) {
   $_SESSION['room3_completa'] = true;
   header('Location: room5.php');
   exit;
  } else {
   $mensaje = 'Código incorrecto. Vuelve a hacer el test.';
  }
 } else {
  $aciertos = 0;
  foreach ($preguntas as $i=>$p) {
   $campo = 'p'.$i;
   if (isset($_POST[$campo]) && intval($_POST[$campo]) === intval($p['correcta'])) $aciertos++;
  }
  if ($aciertos === count($preguntas)) {
   $mensaje = '¡Perfecto! Has acertado las 4 preguntas. Código del candado: '.$codigo;
   $mostrarInput = true;
  } else {
   $mensaje = 'Has fallado alguna respuesta. Vuelve a intentarlo.';
  }
 }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Habitación 3 - Terremotos</title>
<style>
body{font-family:Arial;background:#111;color:#fff;text-align:center;margin:0}
.contenedor{max-width:800px;margin:40px auto;padding:20px;background:rgba(0,0,0,0.7);border-radius:8px}
.pregunta{background:#222;padding:12px;margin:12px 0;border-radius:6px;text-align:left}
button{padding:8px 14px;background:#eef;color:#000;border:none;border-radius:6px;margin-top:8px}
input[type="text"]{padding:8px;width:120px;border-radius:6px;border:none;text-align:center}
.msg{margin-top:10px}
a{color:#fff}
label{cursor:pointer}
</style>
</head>
<body>
<div class="contenedor">
<h1>Habitación 3 — Test de Terremotos</h1>
<p>Responde correctamente las 4 preguntas para obtener el código del candado.</p>

<form method="post">
 <?php foreach($preguntas as $i=>$p): ?>
  <div class="pregunta">
   <p><b><?php echo ($i+1).". ".$p['preg'] ?></b></p>
   <?php foreach($p['op'] as $j=>$op): ?>
    <label><input type="radio" name="p<?php echo $i ?>" value="<?php echo $j ?>" required> <?php echo $op ?></label><br>
   <?php endforeach; ?>
  </div>
 <?php endforeach; ?>

 <button type="submit">Enviar respuestas</button>
</form>

<?php if($mensaje!='') echo '<p class="msg">'.$mensaje.'</p>'; ?>

<?php if($mostrarInput): ?>
 <form method="post">
  <p>Introduce el código del candado:</p>
  <input type="text" name="codigo_ingresado" maxlength="3" required>
  <button type="submit">Desbloquear</button>
 </form>
<?php endif; ?>

<p style="margin-top:12px"><a href="home.php">Volver atrás</a></p>
</div>
</body>
</html>