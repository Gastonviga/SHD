<?php
// Verificar si el formulario de registro ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario de registro
    $nombre_apellido = $_POST['nombre_apellido'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $usuario_registro = $_POST['usuario_registro'];
    $contra_registro = $_POST['contra_registro'];
    $confirmar_contra = $_POST['confirmar_contra'];

    // Verificar si las contraseñas coinciden
    if ($contra_registro !== $confirmar_contra) {
        echo "<script>alert('Las contraseñas no coinciden. Por favor, inténtelo de nuevo.')</script>";
        echo "<script>window.location.href='paginaadministrador.php';</script>";
        die();
    }

    // Crear conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "scash");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Hash de la contraseña
    $hash_contra_registro = password_hash($contra_registro, PASSWORD_DEFAULT);

    // Insertar datos en la tabla "administrador" (o la tabla correspondiente)
    $sqlInsert = $conexion->prepare("INSERT INTO administrador (NombreYApellido, DNI, Numero, Usuario, Contra) VALUES (?, ?, ?, ?, ?)");
    $sqlInsert->bind_param("sssss", $nombre_apellido, $dni, $telefono, $usuario_registro, $hash_contra_registro);

    // Ejecutar la consulta de inserción
    if ($sqlInsert->execute()) {
        echo "<script>alert('Registro exitoso. Ahora puedes iniciar sesión.')</script>";
        echo "<script>window.location.href='paginaadministrador.php';</script>";
        die();
    } else {
        echo "<script>alert('Error en el registro. Por favor, inténtelo de nuevo.')</script>";
        echo "<script>window.location.href='paginaadministrador.php';</script>";
        die();
    }
}
?>
