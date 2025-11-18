<?php
session_start();

$mensaje = "";
$intentos_max = 3;

if (!isset($_SESSION['room5_intentos'])) {
    $_SESSION['room5_intentos'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $respuesta = trim($_POST['respuesta']);

    if ($respuesta === "2012") {
        $_SESSION['room5_completa'] = true;
        header("Location: end.php");
        exit;
    }

    $_SESSION['room5_intentos']++;

    if ($_SESSION['room5_intentos'] >= $intentos_max) {
        session_unset();
        session_destroy();
        header("Location: home.php");
        exit;
    }

    $restantes = $intentos_max - $_SESSION['room5_intentos'];
    $mensaje = "Respuesta incorrecta. Te quedan " . $restantes . " intento(s).";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Habitación 5 — Fenómenos Naturales</title>
<style>
body {
    margin:0;
    font-family: Arial, sans-serif;
    color:#fff;
    text-align:center;
    background: url('imagenes/John-Cusack.webp') no-repeat center center fixed;
    background-size: cover;
}
.contenedor {
    max-width:800px;
    margin:60px auto;
    background:rgba(0,0,0,0.6);
    padding:25px;
    border-radius:10px;
}
.pregunta {
    font-size:20px;
    font-weight:bold;
    margin-top:15px;
}
input[type="text"] {
    padding:10px;
    width:80%;
    border-radius:6px;
    border:none;
    margin-top:10px;
    font-size:16px;
}
button {
    margin-top:15px;
    padding:10px 20px;
    border:none;
    border-radius:6px;
    background:#eef;
    color:#012;
    font-weight:bold;
    cursor:pointer;
}
.msg {
    margin-top:15px;
    font-size:18px;
    color:#9cff9c;
}
.msg.error {
    color:#ff9c9c;
}
</style>
</head>
<body>
<div class="contenedor">
    <h1>Habitación 5 — Fenómenos Naturales</h1>
    <p class="pregunta">¿En qué película sobrevivió John Cusack a todos estos fenómenos naturales?</p>
    <p>Introduzca el codigo final</p>
    <form method="post">
        <input type="text" name="respuesta" placeholder="Introduce el codigo del candado final" required>
        <br>
        <button type="submit">Enviar</button>
    </form>

    <?php if (!empty($mensaje)): ?>
        <p class="msg error"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <div style="margin-top:20px;">
        <a href="home.php" style="color:#fff; text-decoration:none;">Volver atrás</a>
    </div>
</div>
</body>
</html>