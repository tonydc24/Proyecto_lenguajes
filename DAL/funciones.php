<?php
include 'conexion.php';

// Función para obtener los centros de costos de un usuario y devolverlos como JSON
function obtenerCentrosCostosUsuario($id_usuario){
    // Obtener la conexión a la base de datos utilizando la función Conecta() del archivo de conexión
    $conn = Conecta();

    // Verificar la conexión
    if (!$conn) {
        return json_encode(array("error" => "Error de conexión a la base de datos."));
    }

    $sql = "BEGIN CALL_OBTENER_CENTROS_COSTOS_USUARIO(:id_usuario, :nombre_centro); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":id_usuario", $id_usuario);

    // Vincula el parámetro de salida como VARCHAR2 de longitud máxima 100 (ajusta según sea necesario)
    $p_id_centro_costo = null;
    oci_bind_by_name($stmt, ":nombre_centro", $p_id_centro_costo, 100); 

    $result = oci_execute($stmt);

    if (!$result) {
        $error_message = "Ocurrió un error al ejecutar la sentencia: " . oci_error($stmt);
        error_log($error_message);
        echo $error_message;
        oci_free_statement($stmt);
        Desconectar($conn);
        return json_encode(array("error" => "Error al ejecutar la sentencia."));
    }

    oci_free_statement($stmt);
    Desconectar($conn);

    // Devuelve el resultado como un array asociativo
    return json_encode(array("nombre_centro" => $p_id_centro_costo));
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    echo obtenerCentrosCostosUsuario($id);
}

