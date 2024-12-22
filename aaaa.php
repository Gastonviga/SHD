<?php
// Create connection
$conexion = new mysqli("localhost", "root", "", "scash");

// Check connection
if ($conexion->connect_error) {
  die("Connection failed: " . $conexion->connect_error);
}

echo "Connected successfully";
?>