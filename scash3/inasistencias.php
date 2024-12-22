<!DOCTYPE html>

<html>

	<head>
	<title>S-CASH</title>
	<link rel="shortcut icon" href="Media/logo.ico"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="imagen.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	</head>

	<body style="background-color: white; font-size: 50px;">

    <?php

    // Create connection
    $conexion = new mysqli("localhost", "root", "", "scash");

    // Obtener los valores enviados desde el formulario
    $DNI = $_POST['DNI'];

    // Consultar la tabla "registroasistencia" en la base de datos
    $sql = "SELECT * FROM registroasistencia WHERE DNI = '$DNI' AND HoraEntrada = HoraSalida AND DiaClase = 1";

    $result = $conexion->query($sql);

    echo "Inasistencias del alumno con DNI $DNI: " ;
    echo mysqli_num_rows($result), "<br>";



    /*echo "AAAAAAAAAAAAAAAAA";
    echo var_dump($result);
    */        
                    
    ?>

	</body>
</html>    