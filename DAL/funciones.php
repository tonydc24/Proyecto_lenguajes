<?php
include 'conexion.php';

function obtenerCentrosCostosUsuario($id_usuario){
    $conn = Conecta();

    if (!$conn) {
        return json_encode(array("error" => "Error de conexión a la base de datos."));
    }

    $sql = "BEGIN CALL_OBTENER_CENTROS_COSTOS_USUARIO(:id_usuario, :nombre_centro); END;";
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ":id_usuario", $id_usuario);

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

    return json_encode(array("nombre_centro" => $p_id_centro_costo));
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    echo obtenerCentrosCostosUsuario($id);
}

function modificarPresupuesto($centro_origen_id, $centro_destino_id, $monto_modificacion) {
    $conn = Conecta();

    $stmt = oci_parse($conn, 'BEGIN :resultado := modificar_presupuesto(:centro_origen_id, :centro_destino_id, :monto_modificacion); END;');

    oci_bind_by_name($stmt, ':resultado', $resultado, 200);
    oci_bind_by_name($stmt, ':centro_origen_id', $centro_origen_id);
    oci_bind_by_name($stmt, ':centro_destino_id', $centro_destino_id);
    oci_bind_by_name($stmt, ':monto_modificacion', $monto_modificacion);

    oci_execute($stmt);

    oci_free_statement($stmt);

    Desconectar($conn);

    return json_encode($resultado);
}

if (isset($_POST['centro1'],$_POST['centro2'],$_POST['monto'])) {
    $centro1 = $_POST['centro1'];
    $centro2 = $_POST['centro2'];
    $monto = $_POST['monto'];
    echo modificarPresupuesto($centro1,$centro2,$monto);
}

