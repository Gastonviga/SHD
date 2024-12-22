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
            max-width: 400px;
            width: 100%;
        }

        .logoconsulta {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .resultados {
            margin-top: 20px;
        }

        .boton {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            display: inline-block;
        }

        .boton:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body class="consulta">

    <div class="divconsulta">

        <img src="Media/logo.png" class="logoconsulta">

        <div class="resultados">

            <?php
            // Create connection
            $conexion = new mysqli("localhost", "root", "", "scash");

            // Validar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Obtener los valores enviados desde el formulario
            $DNI = isset($_POST['DNI']) ? $conexion->real_escape_string($_POST['DNI']) : '';

            // Asistencias
            $sql = "SELECT NombreYApellido FROM alumno WHERE DNI = '$DNI'";
            $result = $conexion->query($sql);

            if ($result) {
                $row = $result->fetch_assoc();
                $nombreApellido = $row ? $row["NombreYApellido"] : '';

                echo "<p>Asistencias del alumno $nombreApellido con DNI $DNI:</p>";

                $sql = "SELECT * FROM registroasistencia WHERE DNI = '$DNI' AND HoraEntrada != HoraSalida AND DiaClase = 1";
                $result = $conexion->query($sql);

                echo "<p>Número de asistencias: " . mysqli_num_rows($result) . "</p>";

                // Inasistencias
                $sql = "SELECT * FROM registroasistencia WHERE DNI = '$DNI' AND HoraEntrada = HoraSalida AND DiaClase = 1";
                $result = $conexion->query($sql);

                echo "<p>Inasistencias: " . mysqli_num_rows($result) . "</p>";

                // Horas
                $sql = "SELECT Fecha, HoraEntrada, HoraSalida FROM registroasistencia WHERE DNI = $DNI AND DiaClase = 1";
                $result = $conexion->query($sql);

                // Crear una variable para almacenar el total de horas del alumno
                $totalHoras = 0;

                if ($result->num_rows > 0) {
                    // Iterar sobre los resultados de la consulta
                    while ($row = $result->fetch_assoc()) {
                        $horaEntrada = strtotime($row['HoraEntrada']);
                        $horaSalida = strtotime($row['HoraSalida']);

                        // Calcular la diferencia de tiempo en segundos
                        $diferenciaTiempo = $horaSalida - $horaEntrada;
                        if (($horaSalida - $horaEntrada) < -15900) {
                            $diferenciaTiempo = 0;
                        }


                        // Sumar la diferencia al total de horas del alumno
                        $totalHoras += $diferenciaTiempo;
                    }


                    

                    // Imprimir el resultado
                    echo "<p>Total de horas del alumno: " . gmdate("H:i:s", $totalHoras) . "</p>";
                } else {
                    echo "<p>No se encontraron registros de asistencia para el alumno con DNI $DNI</p>";
                }
            } else {
                echo "<p>Error al consultar la base de datos</p>";
            }

            // Cerrar conexión
            $conexion->close();

            ?>

        </div>

        <!-- Botón para volver a paginainvitado.php -->
        <a href="paginainvitado.php" class="boton">Volver</a>

    </div>

</body>

</html>
