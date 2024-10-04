<?php
session_start(); 
$con = mysqli_connect("localhost", "root", "", "bdever");
// Obtener datos del formulario de inicio session
$nombre = mysqli_real_escape_string($con, $_POST["nombre"]);
$contrasena = mysqli_real_escape_string($con, $_POST["contrasena"]);


$sql = "SELECT rol FROM persona WHERE nombre='$nombre' AND contrasena='$contrasena'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['rol'] = $row['rol'];
    $_SESSION['nombre'] = $nombre; 

    //si es administrador muestra una paguina 
    if ($row['rol'] === 'Administrador') {
        header("Location: administrador.php"); 
        //si no es administradoor muestra otrs
    } else {
        header("Location: usuario.php"); 
    }
} else {
    echo "<script>
            alert('Credenciales incorrectas. Intenta nuevamente.');
            window.location.href = 'inicioSesion.php';
          </script>";
}
?>
