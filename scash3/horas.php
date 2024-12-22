<!DOCTYPE html>

<html>

	<head>
	<title>S-CASH</title>
	<link rel="shortcut icon" href="Media/logo.ico"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="imagen.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	</head>

	<body style="background-color: white; font-size: 50px;">

    <?php

    // Create connection
    $conexion = new mysqli("localhost", "root", "", "scash");

    // Obtener los valores enviados desde el formulario
    $DNI = $_POST['DNI'];

    $sql = "SELECT Fecha, HoraEntrada, HoraSalida FROM registroasistencia WHERE DNI = $DNI";
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

            // Sumar la diferencia al total de horas del alumno
            $totalHoras += $diferenciaTiempo;
        }

        // Imprimir el resultado
        echo "Total de horas del alumno con DNI $DNI: " . gmdate("H:i:s", $totalHoras);
    } else {
        echo "No se encontraron registros de asistencia para el alumno con DNI $DNI";
    }
    ?>

	</body>
</html>    