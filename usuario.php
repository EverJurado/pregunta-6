<?php
$con = mysqli_connect("localhost", "root", "", "bdever");

// Verificar conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$ciFiltrado = '';  // Variable para almacenar el CI filtrado

// Verificar si se ha enviado el formulario con un CI
if (isset($_POST['ciB']) && !empty($_POST['ciB'])) {
    $ciFiltrado = mysqli_real_escape_string($con, $_POST['ciB']);
    $sql = "SELECT xp.ci, xp.nombre, xp.apellido, xp.rol, 
                   xc.id AS catastro_id, xc.superficie, 
                   xc.xinicial, xc.xFinal, xc.yinicial, xc.yFinal 
            FROM persona xp 
            JOIN tiene xt ON xp.ci = xt.persona_ci 
            JOIN catastro xc ON xt.catastro_id = xc.id
            WHERE xp.ci = '$ciFiltrado'";
} else {
    // Si no hay CI, no se ejecuta ninguna consulta
    $sql = "";
}

$resultado = !empty($sql) ? mysqli_query($con, $sql) : null;
?>

<html>
<head>
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <h1>PERSONA Y CATASTRO</h1>

    <form class="form-inline" method="POST">
        <div class="form-group mx-sm-3 mb-2">
            <label for="ciB" class="sr-only">Ingresa tu CI</label>
            <input type="text" class="form-control" id="ciB" name="ciB" placeholder="CI" required>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
    </form>

    <?php if (!empty($ciFiltrado) && mysqli_num_rows($resultado) > 0): ?>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rol</th>
                    <th>ID Catastro</th>
                    <th>Superficie</th>
                    <th>X Inicial</th>
                    <th>X Final</th>
                    <th>Y Inicial</th>
                    <th>Y Final</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <td><?php echo $fila['ci']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['apellido']; ?></td>
                        <td><?php echo $fila['rol']; ?></td>
                        <td><?php echo $fila['catastro_id']; ?></td>
                        <td><?php echo $fila['superficie']; ?></td>
                        <td><?php echo $fila['xinicial']; ?></td>
                        <td><?php echo $fila['xFinal']; ?></td>
                        <td><?php echo $fila['yinicial']; ?></td>
                        <td><?php echo $fila['yFinal']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php elseif (!empty($ciFiltrado)): ?>
        <p>No se encontraron resultados para el CI ingresado.</p>
    <?php endif; ?>
    <a class='btn btn-success' href = 'index.php'> Regresar</a>
</body>
</html>
