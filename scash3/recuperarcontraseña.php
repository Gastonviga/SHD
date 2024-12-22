<!DOCTYPE html>
<html lang="es">

<head>
    <title>S-CASH</title>
    <link rel="shortcut icon" href="Media/logo.ico" />
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="imagen.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f0f0f0; /* Fondo gris claro */
            color: #333; /* Color de letra gris oscuro */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #texto {
            color: black;
            font-size: 18px;
        }

        .divconsulta {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .logoconsulta {
            width: 70px;
            margin-bottom: 20px;
        }

        p {
            margin: 0 0 10px 0;
            font-size: 16px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            color: #555; /* Color de letra gris */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .boton {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .boton:hover {
            background-color: #45a049;
        }

        #volver-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        #volver-btn img {
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <div class="divconsulta">
        <a id="volver-btn" href="paginaadministrador.php">
            Volver
        </a>

        <img src="Media/logo.png" class="logoconsulta">

        <?php

        // Verificar si el formulario ha sido enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Crear conexión
            $conexion = new mysqli("localhost", "root", "", "scash");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Obtener número y DNI
            $Numero = $_POST['numero'];
            $DNI = $_POST['dni'];
            $apikey;

            // Consultar la tabla "administrador" en la base de datos utilizando sentencias preparadas
            $sqlDNI = $conexion->prepare("SELECT DNI FROM administrador WHERE DNI = ?");
            $sqlDNI->bind_param("i", $DNI);
            $sqlDNI->execute();
            $sqlDNI->store_result();

            // Vincular resultados
            $sqlDNI->bind_result($DNIFromDB);

            // Obtener los resultados
            $sqlDNI->fetch();

            // Cerrar la consulta de DNI
            $sqlDNI->close();

            // Consultar la tabla "administrador" en la base de datos utilizando sentencias preparadas
            $sqlNumero = $conexion->prepare("SELECT apikey FROM administrador WHERE Numero = ?");
            $sqlNumero->bind_param("i", $Numero);
            $sqlNumero->execute();
            $sqlNumero->store_result();

            // Vincular resultados
            $sqlNumero->bind_result($apikey);

            // Obtener los resultados
            $sqlNumero->fetch();

            // Cerrar la consulta de número
            $sqlNumero->close();

            // Verificar que el DNI y el número estén asociados a un administrador
            if ($DNIFromDB != null && $Numero != null) {

                $ContraRecuperacion = random_int(100000, 999999);

                $sql = "UPDATE administrador SET Contra = '$ContraRecuperacion' WHERE Numero = '$Numero' AND DNI = '$DNI'";
                $conexion->query($sql);

                // Mensaje de recuperación
                $msg = "Hola, debido a tu petición al sistema de S-CASH, se te asignó una nueva contraseña de recuperación. Tu nueva contraseña es $ContraRecuperacion";

                // URL para enviar el mensaje de recuperación vía WhatsApp
                $url='https://api.callmebot.com/whatsapp.php?source=php&phone='.$Numero.'&text='.urlencode($msg).'&apikey='.$apikey;
                $html=file_get_contents($url);

                echo "<script>alert('Se ha enviado un mensaje con una contraseña de recuperación')</script>";

            } else {
                echo "<script>alert('El número y/o el DNI ingresados no están registrados en la base de datos de administradores')</script>";
            }

        }
        ?>

        <h1 id="texto">Por favor, introduzca el número de celular y el DNI asociados a su usuario de administrador</h1>

        <form method="post" action="recuperarcontraseña.php">
            <label for="numero">Número:</label>
            <input type="number" name="numero" required>

            <label for="dni">DNI:</label>
            <input type="number" name="dni" required>

            <input type="submit" class="boton" value="Enviar">
        </form>

    </div>

</body>

</html>
