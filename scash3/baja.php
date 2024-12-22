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

                // Consultar la existencia del alumno en la base de datos
                $sqlExistencia = $conexion->prepare("SELECT DNI, NombreYApellido, IDCurso, DatoHuella FROM Alumno WHERE DNI = ?");
                $sqlExistencia->bind_param("i", $DNI);
                $sqlExistencia->execute();
                $sqlExistencia->store_result();

                // Verificar si se encontró un registro
                if ($sqlExistencia->num_rows > 0) {

                    // Vincular resultados
                    $sqlExistencia->bind_result($DNI, $NombreYApellido, $IDCurso, $DatoHuella);

                    // Obtener los resultados
                    $sqlExistencia->fetch();

                    // Cerrar la consulta de existencia
                    $sqlExistencia->close();

                    // Mostrar datos del alumno y confirmar eliminación
                    echo "<p>¿Estás seguro de eliminar al alumno con los siguientes datos?</p>";
                    echo "<p>DNI: $DNI</p>";
                    echo "<p>Nombre y Apellido: $NombreYApellido</p>";
                    echo "<p>ID Curso: $IDCurso</p>";
                    echo "<p>Dato Huella: $DatoHuella</p>";

                    echo "<form method='post' action='baja2.php'>";
                    echo "<input type='hidden' name='DNI' value='$DNI'>";
                    echo "<input type='submit' class='boton' value='Sí, eliminar'>";
                    echo "</form>";

                    echo "<form method='post' action='pagina.php'>";
                    echo "<input type='submit' class='boton' value='Cancelar'>";
                    echo "</form>";

                } else {
                    echo "No se encontró un alumno con el DNI proporcionado.";
                }

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
