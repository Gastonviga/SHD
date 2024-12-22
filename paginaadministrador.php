<!DOCTYPE html>
<html>

<head>
    <title>S-CASH</title>
    <link rel="shortcut icon" href="Media/logo.ico" />
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="imagen.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: black;
            color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .divconsulta {
            width: 300px;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
            /* Ajusta el margen derecho según sea necesario */
        }

        .logoconsulta {
            width: 70px;
            margin-bottom: 20px;
            margin-right: -10px;
            /* Ajusta el margen derecho según sea necesario */
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 5px;
            color: #555;
        }

        input {
            margin-bottom: 15px;
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 15px;
            box-sizing: border-box;
        }

        .boton {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 15px;
            cursor: pointer;
            font-size: 15px;
        }

        .boton:hover {
            background-color: #007bff;
        }

        .boton3 {
            background-color: transparent;
            color: #007BFF;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 15px;
            font-size: 15px;
        }

        .boton3:hover {
            color: #007bff;
        }

        #volver-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        #volver-btn img {
            margin-right: 5px;
        }

        /* Nuevo estilo para el formulario de registro */
        .registro-form {
            display: none;
        }
    </style>
</head>

<body>

    <a id="volver-btn" href="index.html">
        Volver
    </a>

    <div class="divconsulta">
        <img src="Media/logo.png" class="logoconsulta">

        <?php
        // Verificar si el formulario ha sido enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Crear conexión
            $conexion = new mysqli("localhost", "root", "", "scash");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Obtener el nombre de usuario y la contraseña enviados desde el formulario
            $usuario = $_POST['usuario'];
            $contra = $_POST['contra'];

            // Consultar la tabla "administrador" en la base de datos utilizando sentencias preparadas
            $sqlSelect = $conexion->prepare("SELECT DNI, NombreYApellido, Puesto, Usuario, Contra FROM administrador WHERE Usuario = ?");
            $sqlSelect->bind_param("s", $usuario);

            // Ejecutar la consulta de selección
            $sqlSelect->execute();

            // Vincular resultados
            $sqlSelect->bind_result($DNI, $NombreYApellido, $Puesto, $Usuario, $ContraHash);

            // Obtener los resultados
            $sqlSelect->fetch();

            // Cerrar la consulta de selección
            $sqlSelect->close();

            // Verificar si la contraseña ingresada coincide con la almacenada en la base de datos
            if (password_verify($contra, $ContraHash)) {
                // Autenticación exitosa, redirigir a la página
                header("Location: pagina.php");
                die();
            } else {
                // Autenticación fallida, mostrar mensaje de error y volver a la misma página
                echo "<script>alert('Usuario o contraseña incorrectos, vuelva a intentarlo')</script>";
                echo "<script>window.location.href='paginaadministrador.php';</script>";
                die();
            }
        }
        ?>

        <form method="post" action="paginaadministrador.php" id="login-form">
            <label for="usuario">Nombre de Usuario:</label>
            <input type="text" name="usuario" required>

            <label for="contra">Contraseña:</label>
            <input type="password" name="contra" required>

            <input type="submit" class="boton" value="Iniciar Sesión">
        </form>

        <!-- Agregar opción de recuperar contraseña -->
        <form action='recuperarcontraseña.php'>
            <input type="submit" name="recuperar_contraseña" class="boton3" value="Recuperar Contraseña">
        </form>

        <!-- Nuevo formulario de registro -->
        <form method="post" action="procesar_registro.php" class="registro-form" id="registro-form">
            <label for="nombre_apellido">Nombre y Apellido:</label>
            <input type="text" name="nombre_apellido" required>

            <label for="dni">DNI:</label>
            <input type="text" name="dni" required>

            <label for="telefono">Número de Teléfono:</label>
            <input type="text" name="telefono" required>

            <label for="usuario_registro">Nombre de Usuario:</label>
            <input type="text" name="usuario_registro" required>

            <label for="contra_registro">Contraseña:</label>
            <input type="password" name="contra_registro" required>

            <label for="confirmar_contra">Confirmar Contraseña:</label>
            <input type="password" name="confirmar_contra" required>

            <input type="submit" class="boton" value="Registrarse">
        </form>

        <!-- Agregar enlace para mostrar/ocultar el formulario de registro -->
        <a href="#" id="mostrar_registro" class="boton3">Registrarse</a>

        <script>
            // Script para mostrar/ocultar el formulario de registro
            document.getElementById('mostrar_registro').addEventListener('click', function() {
                var loginForm = document.getElementById('login-form');
                var registroForm = document.getElementById('registro-form');

                // Ocultar formulario de inicio de sesión y mostrar formulario de registro
                loginForm.style.display = 'none';
                registroForm.style.display = 'block';
            });
        </script>
    </div>
    <script>
        document.getElementById('mostrar_registro').addEventListener('click', function() {
            var loginForm = document.getElementById('login-form');
            var registroForm = document.getElementById('registro-form');
            var recuperarContraseñaBtn = document.querySelector('.boton3[name="recuperar_contraseña"]');
            var registrarseBtn = document.getElementById('mostrar_registro');
            var logoConsulta = document.querySelector('.logoconsulta');

            // Ocultar formulario de inicio de sesión y mostrar formulario de registro
            loginForm.style.display = 'none';
            registroForm.style.display = 'block';

            // Ocultar botones de recuperar contraseña y registrarse
            recuperarContraseñaBtn.style.display = 'none';
            registrarseBtn.style.display = 'none';

            // Ocultar el logo
            logoConsulta.style.display = 'none';
        });
    </script>

</body>

</html>
