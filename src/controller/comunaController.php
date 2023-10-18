<?php
require_once('../../db/conexion.php');
$conn = conectar();

session_start();

if (isset($_GET['region_id'])) {
    $regionId = $_GET['region_id'];

    $sql = "SELECT * FROM comuna WHERE region_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $regionId);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $comunas = array();

        while ($row = $result->fetch_assoc()) {
            $comunas[] = $row;
        }

        echo json_encode($comunas);
    } else {
        echo json_encode(array());
    }
} else {
    echo json_encode(array());
}

$conn->close();
?>
