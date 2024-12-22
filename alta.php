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

        .confirmacion {
            display: none;
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

        // Obtener los valores enviados desde el formulario
        $DNI = isset($_POST["DNI"]) ? intval($_POST["DNI"]) : 0;
        $NombreYApellido = isset($_POST["NombreYApellido"]) ? $_POST["NombreYApellido"] : "";
        $IDCurso = isset($_POST["IDCurso"]) ? intval($_POST["IDCurso"]) : 0;

        // Validar que los datos sean válidos antes de realizar la inserción
        if ($DNI > 0 && $IDCurso > 0 && $NombreYApellido != "") {
            // Consultar la existencia del alumno en la base de datos antes de agregar
            $sqlExistencia = $conexion->prepare("SELECT DNI FROM Alumno WHERE DNI = ?");
            $sqlExistencia->bind_param("i", $DNI);
            $sqlExistencia->execute();
            $sqlExistencia->store_result();

            // Verificar si se encontró un registro
            if ($sqlExistencia->num_rows == 0) {
                // Mostrar la pregunta
                echo "<p>¿Está seguro de agregar al siguiente alumno?</p>";

                // Mostrar los datos del alumno a confirmar
                echo "<p>Nombre y Apellido: $NombreYApellido</p>";
                echo "<p>DNI: $DNI</p>";
                echo "<p>IDCurso: $IDCurso</p>";

                // Mostrar las opciones de "Sí" o "No"
                echo "<button class='boton' onclick='agregarAlumno()'>Sí, estoy seguro</button>";
                echo "<button class='boton' onclick='cancelarAgregado()'>No, cancelar</button>";

                // Cerrar la consulta de existencia
                $sqlExistencia->close();
            } else {
                echo "Ya existe un alumno con el DNI proporcionado.";
            }
        } else {
            echo "Los datos proporcionados no son válidos.";
        }

        // Cerrar la conexión
        $conexion->close();
        ?>

        <script>
            function agregarAlumno() {
                // Mostrar el formulario de confirmación
                document.getElementById("confirmForm").style.display = "block";
            }

            function cancelarAgregado() {
                // Redirigir a pagina.php si el usuario cancela
                window.location.href = 'pagina.php';
            }
        </script>

        <!-- Formulario para la confirmación -->
        <form method="post" action="confirmar.php" class="confirmacion" id="confirmForm">
            <input type="hidden" name="DNI" value="<?php echo $DNI; ?>">
            <input type="hidden" name="NombreYApellido" value="<?php echo $NombreYApellido; ?>">
            <input type="hidden" name="IDCurso" value="<?php echo $IDCurso; ?>">
            <input type="submit" class="boton" value="Confirmar">
        </form>

    </div>

</body>

</html>