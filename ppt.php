<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header("Location: license.html");
}

// Conexión a la base de datos
include "pdf/one.php"; 
$conn = new mysqli($servidor, $usuario, $password, $db);
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = mysqli_real_escape_string($conn, htmlspecialchars($_POST["nombre"]));
$correo = mysqli_real_escape_string($conn, htmlspecialchars($_POST["correo"]));

// Verificar si el correo ya existe en la base de datos
$query = "SELECT * FROM usuarios WHERE correo = '$correo'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo "Ya existe un usuario con ese correo.";
} else {
    // Insertar los datos en la base de datos
    $query = "INSERT INTO usuarios (nombre, correo) VALUES ('$nombre', '$correo')";
    if ($conn->query($query) === TRUE) {
        echo "Registro exitoso.";
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

header("Location: index.html");
?>
