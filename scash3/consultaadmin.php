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

        p {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .resultado {
            margin-top: 20px;
        }

        .no-resultado {
            color: #ff6666;
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

<body class="consulta">

    <a href="pagina.php" class="volver">Volver</a>

    <div class="container">

        <img src="Media/logo.png" class="logo">

        <?php
        // Create connection
        $conexion = new mysqli("localhost", "root", "", "scash");

        // Obtener los valores enviados desde el formulario
        $DNI = $_POST['DNI'];

        $sql = "SELECT * FROM administrador WHERE DNI = $DNI";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar la información del admin
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>DNI:</strong> " . $row["DNI"] . "</p>";
                echo "<p><strong>Nombre y apellido:</strong> " . $row["NombreYApellido"] . "</p>";
                echo "<p><strong>Puesto:</strong> " . $row["Puesto"] . "</p>";
                echo "<p><strong>Usuario:</strong> " . $row["Usuario"] . "</p>";
                echo "<p><strong>Contra:</strong> " . $row["Contra"] . "</p>";
                echo "<p><strong>Numero:</strong> " . $row["Numero"] . "</p>";
                echo "<p><strong>apikey:</strong> " . $row["apikey"] . "</p>";
                // Agregar más campos según la estructura de tu tabla
            }
        } else {
            echo "<p class='no-resultado'>No se encontraron resultados para el DNI: $DNI</p>";
        }
        ?>

    </div>

</body>

</html>
