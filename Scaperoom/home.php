<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScapeRoom - Fenómenos Naturales</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-align: center;
            background-image: url('imagenes/imagenHome.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .contenedor {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px 40px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
        }
        h1 {
            margin-top: 0;
            font-size: 26px;
        }
        p {
            font-size: 16px;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 25px;
            background-color: #ffffff;
            color: #000000;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        a:hover {
            background-color: #e0e0e0;
            transform: scale(1.05);
        }
        .creditos {
            margin-top: 20px;
            font-size: 14px;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Bienvenido al ScapeRoom: Fenómenos Naturales</h1>
        <p>Pulse la habitacion deseada a la que quiere avanzar!!</p>
        <a href="room1.php">HABITACION 1</a>
        <a href="room2.php">HABITACION 2</a>
        <p>Hecho por Alberto Romeral</p>
    </div>
</body>
</html>