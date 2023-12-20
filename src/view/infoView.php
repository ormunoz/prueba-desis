<?php
// Incluye el archivo de conexión
require_once('../../db/conexion.php');

try {
    $conexion = conectar();
} catch (Exception $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tabla de Votantes</title>
    <link rel="stylesheet" href="../public/css/style.css">

</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/desis/src/view/indexView.php">Formulario</a></li>
                <li><a href="/desis/src/view/votacionesView.php">Ver votaciones</a></li>
                <li><a href="/desis/src/view/infoView.php">Votantes</a></li>
                <li><a href="/desis/src/view/encuestaView.php">Encuestas</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1>Información de los Votantes</h1>

            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nombre y Apellido</th>
                    <th>Rut</th>
                    <th>Alias</th>
                    <th>Email</th>
                    <th>Comuna</th>
                </tr>

                <?php
                // Consulta SQL para recuperar información de los votantes
                $sql = "SELECT v.id, v.nombre_apellido, v.rut, v.alias, v.email, c.nombre AS nombre_comuna 
        FROM votante AS v 
        JOIN comuna AS c ON v.comuna_id = c.id";
                // ejecutamos la consulta sql y la almacenamos en resultS
                $result = $conexion->query($sql);
                // Mostrar los resultados en la tabla pero antes debemos preguntar si existe almenos 1 registro
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nombre_apellido"] . "</td>";
                        echo "<td>" . $row["rut"] . "</td>";
                        echo "<td>" . $row["alias"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["nombre_comuna"] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>

    </main>
    <footer>
        <div class="footer-content">
            <p>&copy; Prueba Tecnica, Desis 2023 - Todos los derechos reservados</p>
        </div>
    </footer>
</body>


</html>