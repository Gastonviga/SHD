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

    //Datos
    $HORA = date("H:i:s");
    $FECHA = date("Y:m:d");
    $DIACLASE = date("w");
    var_dump($DNI);
    var_dump($HORA);
    var_dump($FECHA);
    var_dump($DIACLASE);

    if ($DIACLASE == 0 OR $DIACLASE == 6) {
        $DIACLASE = 0;
    } else {
        $DIACLASE = 1;
    }

    var_dump($DIACLASE);

    //Verificacion

    $sql = "SELECT HoraEntrada FROM registroasistencia WHERE DNI = '$DNI'";

    $result = $conexion->query($sql);

    $sql2 = "SELECT DNI FROM alumno WHERE DNI = '$DNI'";

    $result2 = $conexion->query($sql2);

    echo "var_dump de result : "; var_dump($result);

    echo "var_dump de result2 : "; var_dump($result2);

    if ($result->num_rows == 0 AND $result2->num_rows > 0) {
        
        $sql = "INSERT INTO registroasistencia (Fecha, HoraEntrada, HoraSalida, DNI, DiaClase) VALUES ('$FECHA', '$HORA', 0, '$DNI', '$DIACLASE')";

        $conexion->query($sql);

        echo "la hora de entrada ha sido registrada correctamente";
    }

    else if ($result->num_rows != 0 AND $result2->num_rows > 0) {
        
        $sql = "INSERT INTO registroasistencia (HoraSalida) VALUES ('$HORA')";

        $conexion->query($sql);

        echo "la hora de salida ha sido registrada correctamente";
    }

    else {
        echo "El DNI ingresado no existe en la base de datos";
    }

    /*echo "AAAAAAAAAAAAAAAAA";
    echo var_dump($result);
    */        
                    
    ?>

	</body>
</html>    