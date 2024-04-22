<?php
require_once('../DAL/conexion.php');

function obtenerDatosLiquidacion() {
    $conn = Conecta();

    if (!$conn) {
        return json_encode(array("error" => "Error de conexión a la base de datos."));
    }

    $stmt = oci_parse($conn, 'BEGIN :cursor := paquete_datos.obtener_datos_liquidacion; END;');

    $cursor = oci_new_cursor($conn);

    oci_bind_by_name($stmt, ':cursor', $cursor, -1, OCI_B_CURSOR);
    oci_execute($stmt);

    if (!oci_execute($cursor)) {
        $error_message = "Ocurrió un error al ejecutar la sentencia: " . oci_error($stmt);
        error_log($error_message);
        echo $error_message;
        oci_free_statement($stmt);
        Desconectar($conn);
        return null;
    }

    $resultados = array();

    while ($row = oci_fetch_assoc($cursor)) {
        $resultado = array();
        foreach ($row as $key => $value) {
            $resultado[$key] = $value;
        }
        $resultados[] = $resultado;
    }

    oci_free_statement($stmt);
    oci_free_statement($cursor);
    Desconectar($conn);

    return json_encode($resultados);
}

echo obtenerDatosLiquidacion();
?>
