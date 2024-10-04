
<!-- Coneccion en la tabla de persona -->
<?php
    $con1 = mysqli_connect("localhost", "root", "", "bdever");

    // Verificar conexión
    if (!$con1) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $sql1 = "select * from persona ";

    $resultado1 = mysqli_query($con1, $sql1);
?>

<?php
    $con2 = mysqli_connect("localhost", "root", "", "bdever");

    // Verificar conexión
    if (!$con2) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $sql2 = " select * from catastro ";

    $resultado2 = mysqli_query($con2, $sql2);
?>

<html>
<head>
    <title> Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <h1 style="text-align: center;">PERSONA Y CATASTRO</h1>
    <p>En esta seccion se puede administrar los registros de las personas, asi como los catastros en general</p>
    <p>Tabla de Personas:</p>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Rol</th>
                <th>Distrito</th>  <!-- Nueva columna para mostrar el distrito -->
                <th>Zona</th>      <!-- Nueva columna para mostrar la zona -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($fila1 = mysqli_fetch_array($resultado1)) {
                    echo "<tr>";
                    echo "<td>{$fila1['ci']}</td>";
                    echo "<td>{$fila1['nombre']}</td>";
                    echo "<td>{$fila1['apellido']}</td>";
                    echo "<td>{$fila1['rol']}</td>";
                    echo "<td>{$fila1['distrito']}</td>";  // Mostrar distrito
                    echo "<td>{$fila1['zona']}</td>";      // Mostrar zona
                    echo "<td>";
                    echo "<a class='btn btn-primary' href='editarP.php?ci={$fila1['ci']}'>Editar</a>";
                    echo " ";
                    echo "<a class='btn btn-danger' href='eliminarP.php?ci={$fila1['ci']}'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <a class='btn btn-success' href = 'adicionarP.php'> Adicionar</a>


    <p>En esta seccion se puede administrar los registros de los catastros</p>
    <p>Tabla de Catastros:</p>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Superficie</th>
                <th>Xinicial</th>
                <th>Xfinal</th>
                <th>Yinicial</th>
                <th>Yfinal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($fila2 = mysqli_fetch_array($resultado2)) {
                    echo "<tr>";
                    echo "<td>{$fila2['id']}</td>";
                    echo "<td>{$fila2['superficie']}</td>";
                    echo "<td>{$fila2['xinicial']}</td>";
                    echo "<td>{$fila2['xFinal']}</td>";
                    echo "<td>{$fila2['yinicial']}</td>";
                    echo "<td>{$fila2['yFinal']}</td>";
                    echo "<td>";
                    echo "<a  class='btn btn-primary' href = 'editarP.php? id= $fila2[id]'> Editar </a>";
                    echo "<a class='btn btn-danger' href = 'eliminaC.php? id= {$fila2['id']}'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a class='btn btn-success' href = 'adicionarC.php'> Adicionar</a>
    <br>
    <br>
    <br>


    <a class='btn btn-success' href = 'impuestos.php'> Mostrar Personas con Impuetsos</a>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <a class='btn btn-success' href = 'index.php'> Regresar</a>
    <br>
    <br>

</body>
</html>