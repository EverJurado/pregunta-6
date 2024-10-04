<?php
$con = mysqli_connect("localhost", "root", "", "bdever");
$id = null;
$superficie = null;
$xinicial =null;
$xFinal =null;
$yinicial =null;
$yFinal =null;

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

        <form class="mt32" action="validaADICIONARC.php" method="GET">
            <div class="form-group">
                <label for="ci" class="control-label">ID</label>
                <input type="text" class="form-control" id="ci" name="id" placeholder="id" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Superficie</label>
                <input type="text" class="form-control" id="superficie" name="superficie" placeholder="superficie"
                    value="<?php echo $superficie; ?>">
            </div>
            <div class="form-group">
                <label for="apellido" class="control-label">xinicial</label>
                <input type="text" class="form-control" id="xinicial" name="xinicial" placeholder="xinicial"
                    value="<?php echo $xinicial; ?>">
            </div>
            <div class="form-group">
                <label for="rol" class="control-label">xFinal</label>
                <input type="text" class="form-control" id="xFinal" name="xFinal" placeholder="xFinal"
                    value="<?php echo $xFinal; ?>">
            </div>

            <div class="form-group">
                <label for="rol" class="control-label">yinicial</label>
                <input type="text" class="form-control" id="yinicial" name="yinicial" placeholder="yinicial"
                    value="<?php echo $yinicial; ?>">
            </div>

            <div class="form-group">
                <label for="rol" class="control-label">yFinal</label>
                <input type="text" class="form-control" id="yFinal" name="yFinal" placeholder="yFinal"
                    value="<?php echo $yFinal; ?>">
            </div>

            <input type = "submit" name = "aceptar" value = "ADICIONAR" class="btn btn-primary">
		    <input type = "submit" name = "cancelar" value = "CANCELAR" class="btn btn-danger" >
        </form>
    </div>
</body>

</html>