<?php
$con = mysqli_connect("localhost", "root", "", "bdever");

if (isset($_GET['ci']) && isset($_GET['nombre']) && isset($_GET['apellido']) && isset($_GET['rol'])) {
    $ci = mysqli_real_escape_string($con, $_GET['ci']);
    $nombre = mysqli_real_escape_string($con, $_GET['nombre']);
    $apellido = mysqli_real_escape_string($con, $_GET['apellido']);
    $rol = mysqli_real_escape_string($con, $_GET['rol']);

    // Actualizar los datos de la persona
    $sql = "UPDATE persona SET nombre = '$nombre', apellido = '$apellido', rol = '$rol' WHERE ci = '$ci'";

    if (mysqli_query($con, $sql)) {
        echo "Registro modificado con éxito.";
    } else {
        echo "Error al modificar el registro: " . mysqli_error($con);
    }
}

header("Location: administrador.php");
?>
