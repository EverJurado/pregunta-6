<?php
session_start(); 
$con = mysqli_connect("localhost", "root", "", "bdever");

$ci = $_POST["ci"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$rol = $_POST["rol"];
$contrasena = $_POST["contraseña"];

if (!empty($ci) && !empty($nombre) && !empty($apellido) && !empty($rol) && !empty($contrasena)) {
    $sql = "INSERT INTO persona (ci, nombre, apellido, rol, contrasena) VALUES ('$ci', '$nombre', '$apellido', '$rol', '$contrasena')";
    
    if (mysqli_query($con, $sql)) {
        // Mensaje de confirmación utilizando JavaScript
        echo "<script>
                if(confirm('Registro exitoso. ¿Quieres continuar? Inicie Sesion')) {
                    window.location.href = 'index.php';
                } else {
                    window.location.href = 'usuario.php';
                }
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
} else {
    echo "Error: Faltan datos en el formulario.";
}

// Cerrar la conexión
mysqli_close($con);
?>
