<?php
require_once('../../db/conexion.php');
$conn = conectar();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_apellido = $_POST['nombre_apellido'];
    $alias = $_POST['alias'];
    $rut = $_POST['rut'];
    $email = $_POST['email'];
    $comuna_id = $_POST['comuna_id'];
    $candidato_id = $_POST['candidato_id'];
    $encuestas = $_POST['encuesta'];

    // Validar que el RUT sea único
    $sql_check = "SELECT COUNT(*) FROM votante WHERE rut = ?";
    // evitamos ataques de inyeccion con la siguiente secuencia 
    $stmt_check = $conn->prepare($sql_check);
    // vinculamos los params
    $stmt_check->bind_param("s", $rut);
    // ejecutamos la secuencia 
    $stmt_check->execute();
    // tomamos el resultado y lo dejamos en la variable count
    $stmt_check->bind_result($count);
    // obtenemos el valor de la consulta
    $stmt_check->fetch();

    // si count es mayor a 0 significa que si existe un rut
    if ($count > 0) {
        $response = ['success' => false, 'message' => 'El RUT ya ha sido registrado.'];
        echo json_encode($response);
    } else {
        $stmt_check = "";
        // Verificar que al menos 2 encuestas se han seleccionado
        // y que exista la encuesta
        if (is_array($encuestas) && count($encuestas) >= 2) {
            // Preparamos la consulta para insertar el voto
            $sql_insert = "INSERT INTO votante (nombre_apellido, alias, rut, email, comuna_id, candidato_id) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);

            if ($stmt_insert === false) {
                die('Error en la preparación de la consulta: ' . $conn->error);
            }

            // Vinculamos los parámetros
            $stmt_insert->bind_param("ssssii", $nombre_apellido, $alias, $rut, $email, $comuna_id, $candidato_id);

            if ($stmt_insert->execute()) {
                // Voto registrado con éxito
                $votante_id = $stmt_insert->insert_id; // Obtener el ID del votante recién insertado

                // Procesar checkboxes de encuesta
                foreach ($encuestas as $encuestaId) {
                    $sql_encuesta = "INSERT INTO votante_encuesta (votante_id, encuesta_id) VALUES (?, ?)";
                    $stmt_encuesta = $conn->prepare($sql_encuesta);
                    $stmt_encuesta->bind_param("ii", $votante_id, $encuestaId);
                    $stmt_encuesta->execute();
                }

                $response = ['success' => true, 'message' => '¡Voto registrado con éxito!'];
                echo json_encode($response);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => 'Error al registrar el voto en la base de datos']);
            }
        } else {
            $response = ['success' => false, 'message' => 'Debes seleccionar al menos 2 encuestas.'];
            echo json_encode($response);
        }
    }
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Solicitud incorrecta']);
}



?>