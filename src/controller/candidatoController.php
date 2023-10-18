<?php
require_once('../../db/conexion.php');
$conn = conectar();

session_start();

function obtenerCandidatos() {
    // Conectar a la base de datos
    $conn = conectar();

    $sql = "SELECT * FROM candidato";

    // Ejecutar la consulta
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicializar un arreglo para almacenar las regiones
        $candidatos = array();

        while ($row = $result->fetch_assoc()) {
            $candidatos[] = $row;
        }

        echo json_encode($candidatos);
    } else {
        echo json_encode(array());
    }

    $conn->close();
}

obtenerCandidatos();
?>