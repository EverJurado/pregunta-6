<?php
$con = mysqli_connect("localhost", "root", "", "bdever");
$ci = null;
$nombre = null;
$apellido = null;
$rol = null;
$contraseña = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de Usuario</title>
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title">Información de Registro</h2>
                    <form action="validaUSUARIO.php" method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Nombre" name="nombre" value="<?php echo $nombre; ?>" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Apellido" name="apellido" value="<?php echo $apellido; ?>" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="CI" name="ci" value="<?php echo $ci; ?>" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="password" placeholder="Contraseña" name="contraseña" value="<?php echo $contrasena; ?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="password" placeholder="rol" name="rol" value="<?php echo $rol; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/global.js"></script>
</body>
</html>
