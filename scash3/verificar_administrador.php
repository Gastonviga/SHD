<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Modificar Administrador</title>
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
        header{
         margin-bottom: 800px;
         margin-right: 250px;
        }
        form {
            background-color: #fff;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-right: 600px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 650px;
        }

        p {
            margin: 10px 0;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
<header>
<a href="pagina.php" class="btn-volver">Volver a la página principal</a>
</header>
<body>
    <h1>Modificar Administrador:</h1>
    <?php
    // Verificar si se recibió un DNI válido
    if (isset($_POST['DNI']) && !empty($_POST['DNI'])) {
        // Obtener el DNI del formulario
        $DNI = $_POST['DNI'];

        // Conectar a la base de datos
        $conexion = new mysqli("localhost", "root", "", "scash");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Consultar si el administrador existe
        $sql = "SELECT * FROM administrador WHERE DNI = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $DNI);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // El administrador existe, mostrar el formulario de modificación
            $administrador = $result->fetch_assoc();
    ?>
            <form method="post" action="procesar_modificacion_administrador.php">
                <input type="hidden" name="DNI" value="<?php echo $administrador['DNI']; ?>">
                <p>Nombre y Apellido:</p>
                <input type="text" name="NombreYApellido" value="<?php echo $administrador['NombreYApellido']; ?>"><br>
                <p>Puesto:</p>
                <input type="text" name="Puesto" value="<?php echo $administrador['Puesto']; ?>"><br>
                <p>Usuario:</p>
                <input type="text" name="Usuario" value="<?php echo $administrador['Usuario']; ?>"><br>
                <p>Contraseña:</p>
                <input type="password" name="Contra" value="<?php echo $administrador['Contra']; ?>"><br>
                <p>Número de celular:</p>
                <input type="text" name="Numero" value="<?php echo $administrador['Numero']; ?>"><br>
                <p>Apikey:</p>
                <input type="text" name="apikey" value="<?php echo $administrador['apikey']; ?>"><br>
                <input type="submit" value="Modificar">
            </form>
        <?php
        } else {
            // El administrador no existe, mostrar un mensaje de error o redirigir a una página de error
            echo "<p>El administrador con el DNI $DNI no existe en la base de datos.</p>";
        }

        // Cerrar la conexión y liberar recursos
        $stmt->close();
        $conexion->close();
    } else {
        // Si no se recibió un DNI válido, mostrar un mensaje de error o redirigir a una página de error
        echo "<p>Error: DNI no proporcionado o inválido.</p>";
    }
    ?>
</body>

</html>
