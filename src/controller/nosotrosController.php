<?php
require_once('../../db/conexion.php');
$conn = conectar();

session_start();

function obtenerEncuestas() {
    // Conectar a la base de datos
    $conn = conectar();

    $sql = "SELECT * FROM encuesta";

    // Ejecutar la consulta
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $encuestas = array();

        while ($row = $result->fetch_assoc()) {
            $encuestas[] = $row;
        }

        echo json_encode($encuestas);
    } else {
        echo json_encode(array());
    }

    $conn->close();
}

obtenerEncuestas();
?>