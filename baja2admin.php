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

        .boton {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin: 0 10px;
        }

        .boton:hover {
            background-color: #45a049;
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
        // Verificar si el formulario ha sido enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Crear conexión
            $conexion = new mysqli("localhost", "root", "", "scash");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Obtener el DNI enviado desde el formulario
            $DNI = isset($_POST['DNI']) ? intval($_POST['DNI']) : 0;

            // Validar que el DNI sea un número positivo
            if ($DNI > 0) {

                // Consultar la existencia del alumno en la base de datos antes de eliminar
                $sqlExistencia = $conexion->prepare("SELECT DNI FROM administrador WHERE DNI = ?");
                $sqlExistencia->bind_param("i", $DNI);
                $sqlExistencia->execute();
                $sqlExistencia->store_result();

                // Verificar si se encontró un registro
                if ($sqlExistencia->num_rows > 0) {

                    // Eliminar al alumno de la base de datos
                    $sqlEliminar = $conexion->prepare("DELETE FROM administrador WHERE DNI = ?");
                    $sqlEliminar->bind_param("i", $DNI);
                    $sqlEliminar->execute();

                    // Verificar si la eliminación fue exitosa
                    if ($sqlEliminar->affected_rows > 0) {
                        echo "El administrador con DNI $DNI ha sido eliminado de la base de datos";
                    } else {
                        echo "Error al intentar eliminar al administrador. Por favor, inténtalo de nuevo.";
                    }

                    // Cerrar la consulta de eliminación
                    $sqlEliminar->close();

                } else {
                    echo "No se encontró un administrador con el DNI proporcionado.";
                }

                // Cerrar la consulta de existencia
                $sqlExistencia->close();

            } else {
                echo "El DNI proporcionado no es válido.";
            }

            // Cerrar la conexión
            $conexion->close();
        }
        ?>

    </div>

</body>

</html>
