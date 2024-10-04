<?php
$con = mysqli_connect("localhost", "root", "", "bdever");

$ci = $_GET["ci"];
$sql = "select * from persona where ci = $ci";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);
$cii = $fila["ci"];
$nombre = $fila["nombre"];
$apellido = $fila["apellido"];
$rol = $fila["rol"];
//header("Location: index.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 4 Stacked Form Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <style>
        form {
            padding: 40px 40px 30px !important;
            background: #ebeff2;
        }

        .mt32 {
            margin-top: 32px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mt32" style="text-align: center;">Seccion de Edicion de Persona</h2>

        <form class="mt32" action="validaEDITAR.php" method="GET">
            <div class="form-group">
                <label for="ci" class="control-label">CI</label>
                <input type="text" class="form-control" id="ci" name="ci" placeholder="ci" value="<?php echo $cii; ?>"
                    readonly>
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre"
                    value="<?php echo $nombre; ?>">
            </div>
            <div class="form-group">
                <label for="apellido" class="control-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido"
                    value="<?php echo $apellido; ?>">
            </div>
            <div class="form-group">
                <label for="rol" class="control-label">Rol</label>
                <input type="text" class="form-control" id="rol" name="rol" placeholder="rol"
                    value="<?php echo $rol; ?>">
            </div>
            <button type="submit" class="btn btn-primary">MODIFICAR</button>
        </form>
    </div>
</body>

</html>