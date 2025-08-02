<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .recovery-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        input[type="email"] {
            width: 100%;
            padding: 0.75rem;
            margin: 0.5rem 0 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            background: #2c3e50;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #1a242f;
        }
        .volver {
            display: block;
            margin-top: 1rem;
            text-align: center;
            color: #2c3e50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="recovery-container">
        <h2>¿Olvidaste tu contraseña?</h2>
        <form method="POST" action="enviar_recuperacion.php">
            <input type="email" name="correo" placeholder="Ingresa tu correo" required>
            <input type="submit" value="Enviar enlace de recuperación">
        </form>
        <a class="volver" href="index.php">Volver al login</a>
    </div>
</body>
</html>
