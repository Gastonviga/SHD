<!DOCTYPE html>
<html lang="es">

<head>
    <title>S-CASH</title>
    <link rel="shortcut icon" href="Media/logo.ico" />
    <meta charset="utf-8" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .divconsulta {
            text-align: center;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
        }

        .logoconsulta {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .exito {
            color: #4caf50;
            font-size: 24px;
        }

        .boton {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
        }

        .boton:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body class="consulta">

    <div class="divconsulta">

        <img src="Media/logo.png" class="logoconsulta">

        <?php
        // Verificar si el formulario ha sido enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los valores enviados desde el formulario
            $DNI = $_POST["DNI"];
            $NombreYApellido = $_POST["NombreYApellido"];
            $Puesto = $_POST["Puesto"];
            $Usuario = $_POST["Usuario"];
            $Contra = $_POST["Contra"];
            $Numero = $_POST["Numero"];
            $apikey = $_POST["apikey"];

            // Crear conexión
            $conexion = new mysqli("localhost", "root", "", "scash");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Consultar la tabla "Alumno" en la base de datos
            $sql = "UPDATE administrador SET NombreYApellido = ?, Puesto = ?, Usuario = ?, Contra = ?, Numero = ?, apikey = ? WHERE DNI = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ssssiii", $NombreYApellido, $Puesto, $Usuario, $Contra, $Numero, $apikey, $DNI);

            // Ejecutar la consulta preparada
            if ($stmt->execute()) {
                echo "<p class='exito'>La modificación del siguiente administrador ha sido realizada correctamente:</p>";
                echo "<p>Nombre y Apellido: $NombreYApellido</p>";
                echo "<p>DNI: $DNI</p>";
                echo "<p>Puesto: $Puesto</p>";
                echo "<p>Usuario: $Usuario</p>";
                echo "<p>Contra: $Contra</p>";
                echo "<p>apikey: $Numero</p>";
            } else {
                echo "Error al intentar modificar los datos del administrador.";
            }

            // Cerrar la consulta y la conexión
            $stmt->close();
            $conexion->close();
        } else {
            // Redirigir si no se reciben datos
            header("Location: pagina.php");
            exit();
        }
        ?>

        <!-- Botón para volver a la página principal -->
        <form method='post' action='pagina.php'>
            <button class='boton' type='submit'>Volver</button>
        </form>

    </div>

</body>

</html>
