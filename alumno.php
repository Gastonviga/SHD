<!DOCTYPE html>
<html lang="es">

<head>
    <title>Actualizar DatoHuella</title>
    <link rel="shortcut icon" href="Media/logo.ico" />
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="imagen.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: red;
            color: #000; /* Color de letra negro */
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .divconsulta {
            width: 60%; /* Ajusta el ancho según tus necesidades */
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            color: #000; /* Color de letra negro */
            text-align: center; /* Centrar el contenido */
        }

        .logoconsulta {
            display: block;
            margin: auto;
            width: 70px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="number"] {
            margin: 10px 0;
            padding: 5px; /* Reduce el tamaño del cuadro de entrada */
            width: 20%; /* Ajusta el ancho según tus necesidades */
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="image"] {
            cursor: pointer;
            max-width: 250px; /* Reduce el tamaño de la imagen */
        }

        .button {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            background-color: #007BFF;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

        .button:hover {
            background-color: #0056b3;
        }

        #volver {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 4px;
        }

        #volver:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body class="consulta">

    <div class="divconsulta">

        <a href="cliente.html" id="volver">Volver</a>

        <img src="Media/logo.png" class="logoconsulta">

        <?php
        // Crear conexión
        $conexion = new mysqli("localhost", "root", "", "scash");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Verificar si el formulario ha sido enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Obtener los valores enviados desde el formulario
            $DNI = isset($_POST["DNI"]) ? $_POST["DNI"] : null;

            // Verificar si el DNI es válido
            if (!ctype_digit($DNI)) {
                echo "Error: DNI inválido.";
                $conexion->close();
                exit;
            }

            // Verificar si el alumno existe en la base de datos
            $sqlCheckAlumno = "SELECT DNI FROM Alumno WHERE DNI = ?";
            $stmtCheckAlumno = $conexion->prepare($sqlCheckAlumno);
            $stmtCheckAlumno->bind_param("i", $DNI);
            $stmtCheckAlumno->execute();
            $stmtCheckAlumno->store_result();

            if ($stmtCheckAlumno->num_rows > 0) {
                // Generar un número aleatorio de 3 dígitos para DatoHuella
                $DatoHuella = rand(100, 999);

                // Consulta preparada para actualizar DatoHuella
                $sqlUpdateDatoHuella = "UPDATE Alumno SET DatoHuella = ? WHERE DNI = ?";
                $stmtUpdateDatoHuella = $conexion->prepare($sqlUpdateDatoHuella);
                $stmtUpdateDatoHuella->bind_param("ii", $DatoHuella, $DNI);

                // Ejecutar la consulta
                if ($stmtUpdateDatoHuella->execute() === TRUE) {
                    echo "El DatoHuella del alumno con DNI $DNI ha sido actualizado a $DatoHuella.";
                } else {
                    echo "Error al actualizar DatoHuella: " . $stmtUpdateDatoHuella->error;
                }

                // Cerrar la consulta preparada de actualización
                $stmtUpdateDatoHuella->close();
            } else {
                // Si el alumno no existe, crea un nuevo alumno con solo el campo DatoHuella
                $DatoHuella = rand(100, 999);

                // Consulta preparada para insertar un nuevo alumno con DatoHuella
                $sqlInsertAlumno = "INSERT INTO Alumno (DNI, DatoHuella) VALUES (?, ?)";
                $stmtInsertAlumno = $conexion->prepare($sqlInsertAlumno);
                $stmtInsertAlumno->bind_param("ii", $DNI, $DatoHuella);

                // Ejecutar la consulta
                if ($stmtInsertAlumno->execute() === TRUE) {
                    echo "Nuevo alumno creado con DNI $DNI y DatoHuella $DatoHuella.";
                } else {
                    echo "Error al crear nuevo alumno: " . $stmtInsertAlumno->error;
                }

                // Cerrar la consulta preparada de inserción
                $stmtInsertAlumno->close();
            }

            // Cerrar la consulta preparada de verificación
            $stmtCheckAlumno->close();
        }

        // Cerrar la conexión
        $conexion->close();
        ?>
        

        <!-- Formulario para actualizar DatoHuella de un alumno -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <p>Si desea agregar otra huella a otro alumno, por favor, coloque el DNI.</p>
            <input type="number" name="DNI" required> <br>
            <input type="image" id="sensor" src="Media/lector1.png">
        </form>

    </div>

    <script>
        const sensorElement = document.getElementById("sensor");
        const originalSrc = sensorElement.src;

        sensorElement.addEventListener("mouseover", () => {
            sensorElement.src = 'Media/lector2.png';
        });

        sensorElement.addEventListener("mouseout", () => {
            sensorElement.src = originalSrc;
        });
    </script>
</body>

</html>
