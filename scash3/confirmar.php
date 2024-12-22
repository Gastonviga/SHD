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
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            position: relative;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .exito {
            color: #4caf50;
            font-size: 24px;
        }

        .volver {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .volver:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <a href="pagina.php" class="volver">Volver</a>

    <div class="container">

        <img src="Media/logo.png" class="logo">

        <?php
        // Create connection
        $conexion = new mysqli("localhost", "root", "", "scash");

        // Obtener los valores enviados desde el formulario de confirmación
        $DNI = isset($_POST["DNI"]) ? intval($_POST["DNI"]) : 0;
        $NombreYApellido = isset($_POST["NombreYApellido"]) ? $_POST["NombreYApellido"] : "";
        $IDCurso = isset($_POST["IDCurso"]) ? intval($_POST["IDCurso"]) : 0;

        // Validar que los datos sean válidos
        if ($DNI > 0 && $IDCurso > 0 && $NombreYApellido != "") {
            // Realizar la inserción en la base de datos
            $sqlInsercion = $conexion->prepare("INSERT INTO Alumno (DNI, NombreYApellido, IDCurso) VALUES (?, ?, ?)");
            $sqlInsercion->bind_param("iss", $DNI, $NombreYApellido, $IDCurso);
            $sqlInsercion->execute();

            // Verificar si la inserción fue exitosa
            if ($sqlInsercion->affected_rows > 0) {
                echo "<p class='exito'>El alumno $NombreYApellido con DNI $DNI y IDCurso $IDCurso ha sido agregado correctamente a la base de datos.</p>";
            } else {
                echo "Error al intentar agregar al alumno. Por favor, inténtalo de nuevo.";
            }

            // Cerrar la consulta de inserción
            $sqlInsercion->close();
        } else {
            echo "Los datos proporcionados no son válidos.";
        }

        // Cerrar la conexión
        $conexion->close();
        ?>

    </div>

</body>

</html>
