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
            background-color: #f4f4f4;
            color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .divconsulta {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .logoconsulta {
            width: 70px;
            margin-bottom: 20px;
        }

        .mensaje {
            font-size: 34px;
            margin-top: 20px;
        }

        .mensaje-exito {
            color: #28a745;
        }

        .mensaje-error {
            color: #dc3545;
        }

        .datos-alumno {
            margin-top: 20px;
            font-size: 16px;
        }

        .boton-volver {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body class="consulta">

    <a href="cliente.html" class="boton-volver">Volver</a>

    <div class="divconsulta">

        <img src="Media/logo.png" class="logoconsulta">

        <?php
        // Crear conexión
        $conexion = new mysqli("localhost", "root", "", "scash");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Obtener el DNI enviado desde el formulario
        $DNI = $_POST["DNI"];

        // Obtener la fecha y hora actual
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $FECHA = date("Y-m-d");
        $HORA = date("H:i:s");

        // Obtener el día de la semana (0 para domingo, 6 para sábado)
        $DIACLASE = date("w");

        // Convertir el día de la semana a 0 si es domingo o sábado, y 1 en caso contrario
        $DIACLASE = ($DIACLASE == 0 || $DIACLASE == 6) ? 0 : 1;

        // Verificar si el DNI existe en la base de datos
        $sqlCheckAlumno = "SELECT DNI, NombreYApellido, IDCurso FROM alumno WHERE DNI = '$DNI'";
        $resultCheckAlumno = $conexion->query($sqlCheckAlumno);

        if ($resultCheckAlumno->num_rows > 0) {
            $alumno = $resultCheckAlumno->fetch_assoc();

            // Verificar si ya hay una entrada registrada para el alumno en la fecha actual
            $sqlCheckEntry = "SELECT HoraEntrada FROM registroasistencia WHERE DNI = '$DNI' AND Fecha = '$FECHA'";
            $resultCheckEntry = $conexion->query($sqlCheckEntry);

            if ($resultCheckEntry->num_rows == 0) {
                // Insertar nueva entrada
                $sqlInsertEntry = "INSERT INTO registroasistencia (Fecha, HoraEntrada, HoraSalida, DNI, DiaClase) VALUES ('$FECHA', '$HORA', '00:00:00', '$DNI', '$DIACLASE')";

                if ($conexion->query($sqlInsertEntry)) {
                    echo "<div class='mensaje mensaje-exito'>El horario de entrada del alumno ha sido registrado correctamente.</div>";
                    mostrarDatosAlumno($alumno);
                } else {
                    echo "<div class='mensaje mensaje-error'>Error al registrar el horario de entrada: " . $conexion->error . "</div>";
                }
            } else {
                // Actualizar hora de salida
                $sqlUpdateExit = "UPDATE registroasistencia SET HoraSalida = '$HORA' WHERE DNI = '$DNI' AND Fecha = '$FECHA'";
                if ($conexion->query($sqlUpdateExit)) {
                    echo "<div class='mensaje mensaje-exito'>El horario de salida del alumno ha sido registrado correctamente.</div>";
                    mostrarDatosAlumno($alumno);
                } else {
                    echo "<div class='mensaje mensaje-error'>Error al registrar el horario de salida: " . $conexion->error . "</div>";
                }
            }
        } else {
            echo "<div class='mensaje mensaje-error'>El DNI ingresado no existe en la base de datos.</div>";
        }

        // Cerrar la conexión
        $conexion->close();

        function mostrarDatosAlumno($alumno)
        {
            echo "<div class='datos-alumno'>El horario de entrada del alumno:<br>";
            echo "Nombre y Apellido: " . $alumno['NombreYApellido'] . "<br>";
            echo "ID Curso: " . $alumno['IDCurso'] . "<br>";
            echo "han sido registrados correctamente.</div>";
        }
        ?>

    </div>

</body>

</html>
