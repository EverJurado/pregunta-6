<?php
// Conexión a la base de datos
$con = mysqli_connect("localhost", "root", "", "bdever");

// Verificar conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar si el formulario ha sido enviado
if (isset($_GET['aceptar'])) {
    // Obtener los datos del formulario
    $ci = $_GET['ci'];
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $rol = $_GET['rol'];
    $contrasena = $_GET['contrasena'];
    $distrito = $_GET['distrito'];
    $zona = $_GET['zona'];

    // Validar que los campos no estén vacíos
    if (!empty($ci) && !empty($nombre) && !empty($apellido) && !empty($rol) && !empty($contrasena) && !empty($distrito) && !empty($zona)) {
        // Insertar los datos en la tabla persona
        $sql = "INSERT INTO persona (ci, nombre, apellido, rol, contrasena, distrito, zona) VALUES ('$ci', '$nombre', '$apellido', '$rol', '$contrasena', '$distrito', '$zona')";

        if (mysqli_query($con, $sql)) {
            header("Location: administrador.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
}

// Cerrar la conexión
mysqli_close($con);
?>
