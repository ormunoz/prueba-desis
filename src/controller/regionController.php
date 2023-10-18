<?php
require_once('../../db/conexion.php');
$conn = conectar();

session_start();

function obtenerRegiones() {
    // Conectar a la base de datos
    $conn = conectar();

    $sql = "SELECT * FROM region";

    // Ejecutar la consulta
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $regiones = array();

        while ($row = $result->fetch_assoc()) {
            $regiones[] = $row;
        }

        echo json_encode($regiones);
    } else {
        echo json_encode(array());
    }

    $conn->close();
}

obtenerRegiones();
?>
