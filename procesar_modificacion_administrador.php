<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Procesar Modificación de Administrador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin-top: 0;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        // Verificar si se recibieron los datos del formulario de modificación
        if (isset($_POST['DNI'], $_POST['NombreYApellido'], $_POST['Puesto'], $_POST['Usuario'], $_POST['Contra'], $_POST['Numero'], $_POST['apikey'])) {
            // Obtener los datos del formulario
            $DNI = $_POST['DNI'];
            $nombreApellido = $_POST['NombreYApellido'];
            $puesto = $_POST['Puesto'];
            $usuario = $_POST['Usuario'];
            $contraseña = $_POST['Contra'];
            $numero = $_POST['Numero'];
            $apikey = $_POST['apikey'];

            // Conectar a la base de datos
            $conexion = new mysqli("localhost", "root", "", "scash");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Preparar la consulta para actualizar los datos del administrador
            $sql = "UPDATE administrador SET NombreYApellido=?, Puesto=?, Usuario=?, Contra=?, Numero=?, apikey=? WHERE DNI=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sssssii", $nombreApellido, $puesto, $usuario, $contraseña, $numero, $apikey, $DNI);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "<h1>Los datos del administrador han sido modificados correctamente.</h1>";
                echo '<a href="pagina.php" class="button">Volver a la pagina principal</a>';
            } else {
                echo "<h1>Error al modificar los datos del administrador: " . $stmt->error . "</h1>";
            }

            // Cerrar la conexión y liberar recursos
            $stmt->close();
            $conexion->close();
        } else {
            // Si no se recibieron todos los datos del formulario, mostrar un mensaje de error
            echo "<h1>Error: No se recibieron todos los datos necesarios.</h1>";
        }
        ?>
    </div>
</body>

</html>
