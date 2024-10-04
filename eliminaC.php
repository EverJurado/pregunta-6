<?php
$con = mysqli_connect("localhost", "root", "", "bdever");

if (isset($_GET['id'])) {
    $ci = $_GET['id'];

    // Escapar el valor de `ci` para evitar inyecciones SQL
    $ci = mysqli_real_escape_string($con, $ci);

    // Primero, eliminar las relaciones en la tabla intermedia 'tiene'
    $sql1 = "DELETE FROM tiene WHERE catastro_id = $ci";
    if (mysqli_query($con, $sql1)) {
        echo "Relaciones eliminadas en la tabla 'tiene'.<br>";
    } else {
        echo "Error al eliminar relaciones: " . mysqli_error($con) . "<br>";
    }

    // Luego, eliminar el registro en la tabla 'catastro'
    $sql2 = "DELETE FROM catastro WHERE id = $ci";
    if (mysqli_query($con, $sql2)) {
        echo "Registro eliminado de la tabla 'catastro'.<br>";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($con) . "<br>";
    }
}

// Redirigir después de la eliminación
header("Location: administrador.php");
exit;
?>
