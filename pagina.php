<!DOCTYPE html>
<html lang="es">

<head>
    <title>S-CASH</title>
    <link rel="shortcut icon" href="Media/logo.ico" />
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="imagen.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }

        body {
            font-size: 18px;
            margin: 0;
            padding: 0;
            background-color: white; /* Fondo rojo */
            color: #fff; /* Texto blanco */
        }

        .header {
    text-align: center;
    margin: 10px auto 10px auto;
    padding-bottom: 5px;
    width: 98.1%;
    background-color: black;
    color: white;
    border-radius: 20px; /* Bordes redondeados */
}
#ottokrause {
    background-color: black;
    border-radius: 5px;
    transition: 0.4s ease;
    width: 85px;
    margin: 8px 20px 0px 0px;
}
h1 {
    margin: 20px 0; /* Añadido un margen superior e inferior al h1 */
    font-size: 36px; /* Aumenté el tamaño de la fuente */
}

        div {
            padding: 0px 0px 0px 10px;
        }

        #logo {
    background-color: black;
    border-radius: 5px;
    transition: 0.4s ease;
    width: 85px;
    margin: 15px 20px 0px 0px;
}

        #logo:hover {
            background-color: white; /* Background color on hover */
        }

        #logo:active {
            background-color: rgb(175, 0, 0); /* Background color on click */
            transition: 0s ease;
        }

        .boton {
            background-color: white; /* Initial background color */
            color: black;
            margin: 5px 0px 5px 0px;
            padding: 3px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            border: none;
            transition: background-color 0.7s ease, color 0.7s ease, padding 0.4s ease; /* Smooth transition effect for both properties */
        }

        .boton2 {
            background-color: white; /* Initial background color */
            font-size: 30px;
            color: black;
            margin: 20px 0px 20px 0px;
            padding: 3px;
            border-radius: 8px;
            font-weight: bold;
            display: inline-block;
            border: solid rgb(175, 0, 0) 5px;
            transition: background-color 0.7s ease, color 0.7s ease, padding 0.4s ease; /* Smooth transition effect for both properties */
        }

        .boton3 {
    background-color: black; /* Cambio de color del botón Volver */
    color: white;
    margin: 10px 10px 0px 10px; /* Ajustado el margen del botón "Volver" */
    padding: 3px;
    border-radius: 5px;
    font-weight: bold;
    display: inline-block;
    border: none;
    text-decoration: none; /* Eliminación del subrayado del texto */
    transition: background-color 0.7s ease, color 0.7s ease, padding 0.4s ease;
}

        .boton3:hover {
            background-color: rgb(175, 0, 0);
            color: white;
        }

        .boton3:active {
            border: solid white 1px;
            transition: 0s;
        }

        .boton:hover {
            background-color: rgb(175, 0, 0);
            color: white;
            padding: 6px;
        }

        .boton:active {
            border: solid white 1px;
            transition: 0s;
        }

        .boton2:hover {
            background-color: rgb(175, 0, 0);
            color: white;
            padding: 6px;
        }

        .boton2:active {
            border: solid white 1px;
            transition: 0s;
        }

        .left {
    clear: left;
    float: left;
    background-color: black;
    color: white;
    margin: 0px 10px 20px 10px;
    width: 280px;
    height: 250px;
    border-radius: 15px; /* Bordes redondeados */
}

.hoja {
    background-color: black;
    color: white;
    margin: 0 0 0 305px;
    padding: 10px 10px 10px 10px;
    transition: opacity 0.2s ease-in-out;
    width: 1090px;
    border-radius: 15px; /* Bordes redondeados */
}

        table,
        th,
        td {
            border: 1px solid black;
            padding: 4px;
            border-collapse: collapse;
        }

        th,
        td {
            background-color: rgb(175, 0, 0);
        }

        #todo {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 15px; /* Agregado: bordes redondeados */
}

        #todo2 {
            display: block;
            opacity: 0;
        }

        #todo3 {
            opacity: 1;
            transition: opacity 1.5s ease;
            padding: 0;
            margin: 0;
        }

        #start {
            opacity: 0;
        }

        #start2 {
            opacity: 1;
            transition: opacity 3s ease;
        }

        #start3 {
            opacity: 0;
            transition: opacity 1.5s ease;
        }

        #start4 {
            display: none;
        }

        #logeo {
            opacity: 0;
            margin: 100px 0px 0px 0px;
            text-align: center;
        }

        #logeo2 {
            opacity: 1;
            margin: 0px 0px 0px 0px;
            text-align: center;
            transition: 2s ease;
        }

        #logointro {
            width: 200px;
            margin: auto;
            display: block;
        }

        #titulointro {
            font-size: 100px;
            text-align: center;
            margin: 10px 0px 0px 0px;
        }

        #sensor {
            height: 200px;
            width: 300px;
            margin: 30px;
            padding: 7px;
            border-radius: 30px;
            background-color: transparent;
            transition: 300ms;
        }

        #sensor:hover {
            height: 200px;
            width: 300px;
            background-color: rgb(139, 0, 0);
            transition: 550ms;
        }

        #headercliente {
            text-align: center;
            margin-top: 50px;
        }

        #logocliente {
            width: 110px;
            display: inline-block;
        }

        #titulocliente {
            font-size: 75px;
            display: inline-block;
        }

        .divconsulta {
            background-color: black;
            color: white;
            border-radius: 25px;
            padding: 18px;
            min-height: 120px;
        }

        .consulta {
            background-color: white;
            font-size: 30px;
        }

        .logoconsulta {
            float: right;
            width: 120px;
            margin: 0px 20px 0px 0px;
        }
    </style>
</head>
<body>

    <div id="todo">

    <div class="header">
    <a href="index.html" class="boton3">Volver atras</a>
    <img id="logo" src="Media/logo.png" onclick="ocultar('default')" />
    <h1 style="color: white; margin-top: 10px;">Solución de Control y Autenticación con Sistema biométrico</h1>
</div>


        <div class="left">
            <h2>Opciones</h2>
            <p class="boton" onclick="ocultar('default')">Inicio</p> <br>
            <p class="boton" onclick="ocultar('admin')">Gestión de Administradores</p> <br>
            <p class="boton" onclick="ocultar('gestionAlumnos')">Gestión de Alumnos</p> <br>
        </div>

        <div class="hoja" id="default">
            <h2>Solución de Control y Autenticación con Sistema biometrico (S-CASH)</h2>
            <p>Página de acceso del sistema S-CASH.<br> En esta página podrá realizar las siguientes acciones: Agregar alumnos, eliminar alumnos o modificar alumnos al igual que también poder consultar los datos de los alumnos para verificar que estén correctamente almacenados.<br>En esta pagina tambien podra: Agregar, Eliminar, Modificar o consultar datos sobre los administradores.</p>
        </div>

        <div class="hoja" id="consultar" style="opacity: 0;">

            <h2>Consultar</h2>
            <h3>Ingrese el DNI del alumno que desea consultar sus datos en la base de datos:</h3>

            <form method="post" action="consulta.php">
                <input type="int" name="DNI"></input> <br>
                <input type="submit" value="Consultar" class="boton">
            </form>

        </div>

        <div class="hoja" id="agregar" style="opacity: 0;">
            <h2>Altas y bajas</h2>

            <h3>Agregar alumnos a la base de datos</h3>

            <p>Ingrese la información del alumno que desea agregar a la base de datos:</p>
            <form method="post" action="alta.php">
                <p>DNI</p>
                <input type="int" name="DNI"></input>
                <p>Nombre y apellido</p>
                <input type="varchar" name="NombreYApellido"></input>
                <p>IDcurso (dos caracteres)</p>
                <input type="int" name="IDCurso"></input>
                <p>Para agregar DatoHuella, utilice el lector biométrico en la página de "Usuarios".</p>

                <input type="submit" value="Agregar" class="boton">
            </form>

        </div>

        <div class="hoja" id="eliminar" style="opacity: 0;">
            <h2>Dar de baja</h2>
            <h3>Eliminar alumnos de la base de datos.</h3>

            <p>Ingrese el DNI del alumno que desea eliminar de la base de datos.</p>
            <form method="post" action="baja.php">
                <input type="int" name="DNI"></input> <br>
                <input type="submit" value="Eliminar" class="boton">
            </form>

        </div>

        <div class="hoja" id="modificar" style="opacity: 0;">
    <h3>Ingrese el DNI del alumno y sus datos a cambiar:</h3>

    <form method="post" action="modificar.php" onsubmit="return validarDNI()">
        <p>DNI:</p>
        <input type="number" name="DNI" id="DNI_modificar"></input>
        <input type="submit" value="Consultar" class="boton">
    </form>

    <!-- Aquí se mostrarán los campos adicionales después de la consulta -->
    <div id="camposModificar" style="display: none;">
        <!-- Campos adicionales del formulario -->
        <p>Nombre y Apellido:</p>
        <input type="varchar" name="NombreYApellido"></input>
        <p>IDcurso: (dos caracteres)</p>
        <input type="number" name="IDCurso"></input>
        <p>Para modificar DatoHuella, utilice el lector biométrico en la página "Usuarios".</p>
        <input type="submit" value="Modificar" class="boton">
    </div>
</div>
        <div class="hoja" id="admin" style="opacity: 0;">

            <h2>Gestión de Administradores</h2>
            <!-- Nuevas opciones bajo "Gestión de Administradores" -->
            <p class="boton" onclick="ocultar('altaAdmin')">Agregar administrador</p> <br>
            <p class="boton" onclick="ocultar('bajaAdmin')">Eliminar administrador</p> <br>
            <p class="boton" onclick="ocultar('modificarAdmin')">Modificar administrador</p> <br>
            <p class="boton" onclick="ocultar('consultaAdmin')">Consultar administrador</p> <br>

        </div>

        <div class="hoja" id="altaAdmin" style="opacity: 0;">

        <p>Ingrese la información del administrador que desea agregar a la base de datos:</p>
        <form method="post" action="altaadmin.php">
        <p>DNI:</p>
        <input type="int" name="DNI"></input>
        <p>Nombre y Apellido:</p>
        <input type="varchar" name="NombreYApellido"></input>
        <p>Puesto:</p>
        <input type="varchar" name="Puesto"></input>
        <p>Usuario:</p>
        <input type="varchar" name="Usuario"></input>
        <p>Contraseña:</p>
        <input type="varchar" name="Contra"></input>
        <p>Número de celular:</p>
        <input type="int" name="Numero"></input>
        <p>apikey:</p>
        <input type="int" name="apikey"></input>
        <br><br>
        <input type="submit" value="Agregar" class="boton">
</form>
        </div>

        <div class="hoja" id="bajaAdmin" style="opacity: 0;">
            <p>Ingrese el DNI del administrador que desea eliminar de la base de datos.</p>
            <form method="post" action="bajaadmin.php">
                <input type="int" name="DNI"></input> <br><br>
                <input type="submit" value="Eliminar" class="boton">
            </form>
        </div>

        <!-- Agregar esta sección al final del archivo PHP -->

            <div class="hoja" id="modificarAdmin" style="opacity: 0;">
                <h3>Ingrese el DNI del administrador:</h3>
                <form method="post" action="verificar_administrador.php">
                    <p>DNI:</p>
                    <input type="number" name="DNI"></input><br><br>
                    <input type="submit" value="Consultar" class="boton">
                </form>
            </div>

        <div class="hoja" id="consultaAdmin" style="opacity: 0;">
            <h3>Ingrese el DNI del administrador que desea consultar sus datos en la base de datos:</h3>

            <form method="post" action="consultaadmin.php">
                <input type="int" name="DNI"></input> <br><br>
                <input type="submit" value="Consultar" class="boton">
            </form>
        </div>

        <div class="hoja" id="gestionAlumnos" style="opacity: 0;">
            <h2>Gestión de Alumnos</h2>
            <!-- Nuevas opciones bajo "Gestión de Alumnos" -->
            <p class="boton" onclick="ocultar('altaAlumno')">Agregar alumno</p> <br>
            <p class="boton" onclick="ocultar('bajaAlumno')">Eliminar alumno</p> <br>
            <p class="boton" onclick="ocultar('modificarAlumno')">Modificar alumno</p> <br>
            <p class="boton" onclick="ocultar('consultaAlumno')">Consultar alumno</p> <br>
        </div>

        <div class="hoja" id="altaAlumno" style="opacity: 0;">

          <p>Ingrese la información del alumno que desea agregar a la base de datos:</p>
          <form method="post" action="alta.php">
          <p>DNI</p>
          <input type="int" name="DNI"></input>
          <p>Nombre y apellido</p>
          <input type="varchar" name="NombreYApellido"></input>
          <p>IDcurso (dos caracteres)</p>
          <input type="int" name="IDCurso"></input>
          <br><br>
          <input type="submit" value="Agregar" class="boton">
          <p>Para agregar DatoHuella, utilice el lector biométrico en la página de "Usuarios".</p>

</form>

        </div>

        <div class="hoja" id="bajaAlumno" style="opacity: 0;">
            <p>Ingrese el DNI del alumno que desea eliminar de la base de datos.</p>
            <form method="post" action="baja.php">
                <input type="int" name="DNI"></input> <br><br>
                <input type="submit" value="Eliminar" class="boton">
            </form>
        </div>

        <div class="hoja" id="modificarAlumno" style="opacity: 0;">
        <h3>Ingrese el DNI del alumno:</h3>
            <!-- Agregamos un evento onsubmit para llamar a la función validarDNI() -->
            <form method="post" action="verificar_dni.php" onsubmit="return validarDNI()">
                <p>DNI:</p>
                <input type="number" name="DNI" id="DNI_modificar"></input> <br><br>
                <input type="submit" value="Consultar" class="boton">
            </form>
            <!-- Aquí se mostrarán los campos adicionales después de la consulta -->
            <div id="camposModificar" style="display: none;">
                <!-- Campos adicionales del formulario -->
                <p>Nombre y Apellido:</p>
                <input type="varchar" name="NombreYApellido" id="nombreYApellido"></input>
                <p>IDcurso: (dos caracteres)</p>
                <input type="number" name="IDCurso" id="IDCurso"></input>
                <p>Para modificar DatoHuella, utilice el lector biométrico en la página "Usuarios".</p>
                <input type="submit" value="Modificar" class="boton">
            </div>
        </div>
        <div class="hoja" id="consultaAlumno" style="opacity: 0;">
            <h3>Ingrese el DNI del alumno que desea consultar sus datos en la base de datos:</h3>

            <form method="post" action="consulta.php">
                <input type="int" name="DNI"></input> <br><br>
                <input type="submit" value="Consultar" class="boton">
            </form>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function mostrartodo() {
                document.getElementById('todo').id = 'todo2';

                setTimeout(function () {
                    document.getElementById('todo2').id = 'todo3';
                }, 700);
            }, 50);
        });


        function ocultar(hoja) {
            document.getElementById('default').style.opacity = 0;
            document.getElementById('consultar').style.opacity = 0;
            document.getElementById('agregar').style.opacity = 0;
            document.getElementById('eliminar').style.opacity = 0;
            document.getElementById('modificar').style.opacity = 0;
            document.getElementById('admin').style.opacity = 0;
            document.getElementById('altaAdmin').style.opacity = 0;
            document.getElementById('bajaAdmin').style.opacity = 0;
            document.getElementById('modificarAdmin').style.opacity = 0;
            document.getElementById('consultaAdmin').style.opacity = 0;
            document.getElementById('gestionAlumnos').style.opacity = 0;
            document.getElementById('altaAlumno').style.opacity = 0;
            document.getElementById('bajaAlumno').style.opacity = 0;
            document.getElementById('modificarAlumno').style.opacity = 0;
            document.getElementById('consultaAlumno').style.opacity = 0;

            setTimeout(function () {
                document.getElementById('default').style.display = 'none';
                document.getElementById('consultar').style.display = 'none';
                document.getElementById('agregar').style.display = 'none';
                document.getElementById('eliminar').style.display = 'none';
                document.getElementById('modificar').style.display = 'none';
                document.getElementById('admin').style.display = 'none';
                document.getElementById('altaAdmin').style.display = 'none';
                document.getElementById('bajaAdmin').style.display = 'none';
                document.getElementById('modificarAdmin').style.display = 'none';
                document.getElementById('consultaAdmin').style.display = 'none';
                document.getElementById('gestionAlumnos').style.display = 'none';
                document.getElementById('altaAlumno').style.display = 'none';
                document.getElementById('bajaAlumno').style.display = 'none';
                document.getElementById('modificarAlumno').style.display = 'none';
                document.getElementById('consultaAlumno').style.display = 'none';
                mostrar(hoja);
            }, 150);
        }

        function mostrar(ver) {
            document.getElementById(ver).style.display = 'block';
            setTimeout(function () {
                document.getElementById(ver).style.opacity = 1;
            }, 50);
        }
    </script>
    <script>
    function validarDNI() {
    var dni = document.getElementById('DNI_modificar').value;

    // Realiza una petición AJAX para verificar si el DNI existe
    // y obtener los datos actuales del alumno

    // Ejemplo con jQuery:
    $.ajax({
        type: 'POST',
        url: 'verificar_dni.php',
        data: { dni: dni },
        success: function (response) {
            if (response === 'existe') {
                // Si el DNI existe, muestra los campos adicionales
                document.getElementById('camposModificar').style.display = 'block';
                
                // Aquí deberías mostrar los datos del alumno para su modificación
                // Puedes acceder a los datos recibidos en la respuesta AJAX
                // y mostrarlos en los campos correspondientes del formulario
            } else {
                // Si el DNI no existe, muestra un mensaje de error
                alert('El DNI ingresado no existe en la base de datos.');
            }
        }
        error: function () {
            // Manejo de errores en la solicitud AJAX
            alert('Error al verificar el DNI. Por favor, inténtalo de nuevo.');
        }
    });

    return false; // Evita que el formulario se envíe
}
    
</script>
</body>

</html>