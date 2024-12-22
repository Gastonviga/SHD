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
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #todo {
            display: flex;
            flex-direction: column;
            max-width: 600px;
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        #logo {
            max-width: 150px;
            cursor: pointer;
        }

        h1 {
            margin: 10px 0;
            font-size: 24px;
        }

        .left {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .boton {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
            display: inline-block;
        }

        .boton:hover {
            background-color: #45a049;
        }

        .hoja {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        h2, h3, p {
            margin-bottom: 10px;
        }

        form {
            margin-top: 10px;
        }

        input {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        #volver-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #007BFF;
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
    </style>
</head>

<body style="background-color: white;">

    <a id="volver-btn" href="index.html">
        Volver
    </a>

    <div id="todo">

        <div class="header">
            <a href="index.html"><img id="logo" src="Media/logo.png" onclick="ocultar('default')"/></a>
            <h1>Solución de Control y Autenticación con Sistema biometrico</h1>
        </div>

        <div class="left">
            <h2>Opciones</h2>
            <p class="boton" onclick="ocultar('consultar')">Consultar asistencias</p>
        </div>

        <div class="hoja" id="default">
            <h2>Solución de Control y Autenticación con Sistema biometrico (S-CASH)</h2>
            <p>Página de acceso del sistema S-CASH</p>
        </div>

        <div class="hoja" id="consultar">
            <h3>Consultar asistencias, inasistencias y horas de alumnos</h3>
            <p>Ingrese el DNI del alumno</p>
            <form method="post" action="asistencias.php">
                <input type="int" name="DNI">
                <input type="submit" value="Consultar" class="boton">
            </form>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout (function mostrartodo() {
                document.getElementById('todo').id='todo2'; 

                    setTimeout (function() {
                        document.getElementById('todo2').id='todo3';
                    }, 700);        
            }, 50);
        });

        function ocultar(hoja) {
            document.getElementById('default').style.opacity=0;
            document.getElementById('consultar').style.opacity=0;
            setTimeout(function() {
                document.getElementById('default').style.display='none';
                document.getElementById('consultar').style.display='none';
                mostrar(hoja);
            }, 150);
        } 

        function mostrar(ver) {
            document.getElementById(ver).style.display = 'block';
            setTimeout(function() {
                document.getElementById(ver).style.opacity = 1;
            }, 50);
        }
    </script>
</body>

</html>
