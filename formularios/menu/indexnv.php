<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Estudiantil</title>
    <link rel="icon" href="../../js/css/ui-lightness/images/logo_uedm.png" type="image/x-icon">
    
</head>
<body>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: #00146b;
}

.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    max-width: 1000px;
}

.welcome-panel {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(255, 255, 255, 0.9);
    padding: 0px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    width: 45%;
    text-align: center;
}


.welcome-image {
   
    top: 0;
    left: 0;
    width: 80%;
    height: 80%;
    object-fit: cover;
    border-radius: 10px;
  
}


.welcome-text {
   
    top: 50%;
    left: 50%;
   
   
}

.login-panel {
 background: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    width: 50%;
    height: 320px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Centra verticalmente */
    align-items: center; /* Centra horizontalmente */
}

h1 {
    margin: 0;
    color: #101010;
}

h2 {
    margin: 0;
    color: #333;
}

button {
    background-color: #002fff;
    color: rgb(254, 254, 255);
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #000d5a;
}

.date-slider {
    display: flex;
    overflow: hidden;
    white-space: nowrap;
    margin-top: 20px;
}

.date-item {
    display: inline-block;
    padding: 10px;
    background: rgba(0, 21, 255, 0.733);
    margin-right: 10px;
    border-radius: 5px;
    text-align: center;
    min-width: 120px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
}

    </style>
    <div class="container">
        
        <div class="login-panel">
        <div class="welcome-text">
                <h1>Bienvenido</h1>
                <h1>Portal Estudiantil</h1>
                <a href="../../login/logout.php" class="btn btn-outline-light logout">Cerrar sesión</a>
            </div>
        
            <p>Ingrese para continuar</p>
            <button id="btn-ficha-datos">Ficha de datos</button>
          <script>
            document.getElementById("btn-ficha-datos").addEventListener("click", function() {
              var baseUrl = window.location.origin; // Obtiene la URL base del sitio web
              var url = baseUrl + "/notas2024/Formularios/estudiantes/ficha.php"; // Construye la URL absoluta
              window.location.href = url;
            });
          </script><p></p>
            <button onclick="window.location.href='../../boletin/index2.php'">Boletin de calificaciones</button>

        </div>

        <div class="welcome-panel">
            <img src="../../js/css/ui-lightness/images/logo_uedm.png" class="welcome-image">
           
        </div>
    </div>
</body>



</html>
