<?php
// Conexión a la base de datos
$con = mysqli_connect("localhost", "root", "", "bdever");

$ci = null;
$nombre = null;
$apellido = null;
$rol = null;
$contrasena = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulario de Registro con Combo Dependiente</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#distrito').on('change', function() {
            var distritoID = $(this).val();
            if(distritoID) {
                $.ajax({
                    type: 'POST',
                    url: '', // Dejar vacío porque todo está en un solo archivo
                    data: {distrito_id: distritoID},
                    success: function(html) {
                        $('#zona').html(html); // Aquí se llenarán las opciones de zonas
                    }
                });
            } else {
                $('#zona').html('<option value="">Seleccione un distrito primero</option>');
            }
        });
    });
    </script>
</head>

<body>
    <div class="container">
        <h2 class="mt32" style="text-align: center;">Sección de Edición de Persona</h2>

        <form class="mt32" action="validaADICIONARP.php" method="GET">
            <!-- Campos del formulario -->
            <div class="form-group">
                <label for="ci" class="control-label">CI</label>
                <input type="text" class="form-control" id="ci" name="ci" placeholder="CI" value="<?php echo $ci; ?>">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
            </div>
            <div class="form-group">
                <label for="apellido" class="control-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $apellido; ?>">
            </div>
            <div class="form-group">
                <label for="rol" class="control-label">Rol</label>
                <input type="text" class="form-control" id="rol" name="rol" placeholder="Rol" value="<?php echo $rol; ?>">
            </div>
            <div class="form-group">
                <label for="contrasena" class="control-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" value="<?php echo $contrasena; ?>">
            </div>

            <!-- Combo dependiente: Distrito -->
            <div class="form-group">
                <label for="distrito" class="control-label">Distrito</label>
                <select class="form-control" id="distrito" name="distrito">
                    <option value="">Seleccione un distrito</option>
                    <?php
                    // Obtener distritos de la base de datos
                    $result = mysqli_query($con, "SELECT * FROM distrito");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Combo dependiente: Zona -->
            <div class="form-group">
                <label for="zona" class="control-label">Zona</label>
                <select class="form-control" id="zona" name="zona">
                    <option value="">Seleccione una zona</option>
                    <!-- Las zonas se cargarán aquí mediante AJAX -->
                </select>
            </div>

            <input type="submit" name="aceptar" value="ADICIONAR" class="btn btn-primary">
            <input type="submit" name="cancelar" value="CANCELAR" class="btn btn-danger">
        </form>
    </div>
</body>
</html>

<?php
// Manejar la solicitud AJAX para cargar zonas
if (isset($_POST['distrito_id'])) {
    $distrito_id = $_POST['distrito_id'];
    $query = "SELECT * FROM zona WHERE distrito_id = $distrito_id";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo '<option value="">Seleccione una zona</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
        }
    } else {
        echo '<option value="">No hay zonas disponibles</option>';
    }
}
?>
