<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmacion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #343a40;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-volver {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-volver:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Modificar Alumno</h2>
    <?php
    // Verificar si se han enviado los datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Crear conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "scash");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Obtener los datos del formulario
        $dni = $_POST['dni'];
        $nombreYApellido = $_POST['nombreYApellido'];
        $idCurso = $_POST['IDCurso'];

        // Consulta SQL preparada para actualizar los datos del alumno
        $sql = "UPDATE alumno SET NombreYApellido=?, IDCurso=? WHERE DNI=?";

        // Preparar la declaración
        $stmt = $conexion->prepare($sql);

        // Vincular parámetros
        $stmt->bind_param("ssi", $nombreYApellido, $idCurso, $dni);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Los datos del alumno han sido modificados correctamente.";
        } else {
            echo "Error al intentar modificar los datos del alumno.";
        }

        // Cerrar la conexión
        $conexion->close();
    } else {
        // Si no se han enviado los datos del formulario, redirigir a alguna página de error o a la página principal
        echo "Ha ocurrido un error. <a href='pagina.php' class='btn-volver'>Volver</a>";
    }
    ?>
    <br><br>
    <a href="pagina.php" class="btn-volver">Volver a la página principal</a>
</div>
</body>
</html>
