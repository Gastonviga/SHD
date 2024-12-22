<?php
// Crear conexión
$conexion = new mysqli("localhost", "root", "", "scash");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los valores enviados desde el formulario
$usuario = isset($_POST['usuario']) ? $conexion->real_escape_string($_POST['usuario']) : '';
$contra = isset($_POST['contra']) ? $_POST['contra'] : '';

// Utilizar sentencias preparadas para proteger contra inyección SQL
$sql = $conexion->prepare("SELECT * FROM administrador WHERE Usuario = ? LIMIT 1");
$sql->bind_param("s", $usuario);
$sql->execute();
$result = $sql->get_result();

// Verificar si se encontró un registro coincidente
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verificar la contraseña utilizando password_verify
    if (password_verify($contra, $row['Contra'])) {
        // Autenticación exitosa, redirigir a la página
        header("Location: pagina.php");
        exit();
    }
}

// Autenticación fallida, mostrar mensaje de error
$error_message = "Usuario o contraseña incorrectos, vuelva a intentarlo";

// Cerrar la conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error de Autenticación</title>
</head>
<body>
    <script>
        alert('<?php echo $error_message; ?>');
        window.location.href = 'index.html';
    </script>
</body>
</html>
