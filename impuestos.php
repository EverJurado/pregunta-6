<?php
// Conexión a la base de datos
$con = mysqli_connect("localhost", "root", "", "bdever");

// Verificar conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta SQL para obtener la lista de personas por tipo de impuesto
$query = "
    SELECT 
        p.ci,
        p.nombre,
        p.apellido,
        SUM(CASE WHEN i.tipo = 'Impuesto sobre la renta' THEN 1 ELSE 0 END) AS Impuesto_sobre_la_renta,
        SUM(CASE WHEN i.tipo = 'Impuesto sobre el patrimonio' THEN 1 ELSE 0 END) AS Impuesto_sobre_el_patrimonio,
        SUM(CASE WHEN i.tipo = 'IVA' THEN 1 ELSE 0 END) AS IVA,
        SUM(CASE WHEN i.tipo = 'Otros' THEN 1 ELSE 0 END) AS Otros
    FROM 
        persona p
    JOIN 
        impuesto i ON p.impuesto_id = i.id
    GROUP BY 
        p.ci, p.nombre, p.apellido;
";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($con));
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Personas por Tipo de Impuesto</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4">Lista de Personas por Tipo de Impuesto</h2>
        <table class="table table-dark table-striped mt-4">
            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Impuesto sobre la renta</th>
                    <th>Impuesto sobre el patrimonio</th>
                    <th>IVA</th>
                    <th>Otros</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['ci']}</td>";
                    echo "<td>{$row['nombre']}</td>";
                    echo "<td>{$row['apellido']}</td>";
                    echo "<td>{$row['Impuesto_sobre_la_renta']}</td>";
                    echo "<td>{$row['Impuesto_sobre_el_patrimonio']}</td>";
                    echo "<td>{$row['IVA']}</td>";
                    echo "<td>{$row['Otros']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <a class='btn btn-success' href = 'administrador.php'> Regresar</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Cerrar la conexión
mysqli_close($con);
?>
