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
            <h1>Encuesta</h1>

            <table border="1">
                <tr>
                    <th>Candidatos</th>
                    <th>Cantidad de Votos</th>

                </tr>

                <?php
                // Consulta SQL para recuperar información de los votantes
                $sql = "SELECT c.name AS candidato, COUNT(v.candidato_id) AS votos
                FROM votante v
                INNER JOIN candidato c ON v.candidato_id = c.id
                GROUP BY c.name;";
                $result = $conexion->query($sql);
                // Mostrar los resultados en la tabla
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["candidato"] . "</td>";
                        echo "<td>" . $row["votos"] . "</td>";
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