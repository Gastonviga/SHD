<!DOCTYPE html>
<html lang="es">
<head>
    <title>Consulta de Alumno</title>
    <meta charset="utf-8" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .info-container {
            width: 400px;
            margin: 50px auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .info-container h2 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #333333;
            text-align: center;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-item label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .info-item input[type="text"] {
            width: calc(100% - 10px);
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 3px;
        }

        .info-item input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            display: block;
            margin-top: 10px;
        }

        .info-item input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
// Archivo: verificar_dni.php

// Crear conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "scash");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el DNI del formulario (por ejemplo, desde POST)
$dni_a_verificar = $_POST['DNI']; // Ajustar la variable $_POST según el nombre del campo del formulario

// Consulta SQL preparada para verificar el DNI en la tabla alumno
$sql = "SELECT * FROM alumno WHERE DNI = ?";

// Preparar la declaración
$stmt = $conexion->prepare($sql);

// Vincular parámetros
$stmt->bind_param("s", $dni_a_verificar);

// Ejecutar la consulta
$stmt->execute();

// Obtener el resultado de la consulta
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // DNI encontrado en la tabla alumno
    $alumno = $result->fetch_assoc();
    // Mostrar el formulario y la información del alumno
    ?>
    <div class="info-container">
        <h2>Información del Alumno</h2>
        <form action="modificar.php" method="post">
            <input type="hidden" name="dni" value="<?php echo $alumno['DNI']; ?>">
            <div class="info-item">
                <label for="nombreYApellido">Nombre y Apellido:</label>
                <input type="text" name="nombreYApellido" id="nombreYApellido" value="<?php echo $alumno['NombreYApellido']; ?>" required>
            </div>
            <div class="info-item">
                <label for="IDCurso">ID Curso:</label>
                <input type="text" name="IDCurso" id="IDCurso" value="<?php echo $alumno['IDCurso']; ?>" required>
            </div>
            <div class="info-item">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni" value="<?php echo $alumno['DNI']; ?>">
            </div>

            <!-- Agregar más campos aquí si es necesario -->
            <div class="info-item">
                <input type="submit" value="Modificar">
            </div>
        </form>
    </div>
    <?php
} else {
    // DNI no encontrado en la tabla alumno
    // Devolver un mensaje indicando que el DNI no existe
    echo "no_existe";
}

?>
</body>
</html>
