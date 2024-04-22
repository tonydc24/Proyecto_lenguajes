<?php
require_once('../DAL/conexion.php');
function obtenerRubros() {
    $conn = Conecta();

    if (!$conn) {
        return json_encode(array("error" => "Error de conexión a la base de datos."));
    }

    $stmt = oci_parse($conn, "BEGIN CALL_OBTENER_RUBROS(:rubros_cursor); END;");

    $rubros_cursor = oci_new_cursor($conn);

    oci_bind_by_name($stmt, ":rubros_cursor", $rubros_cursor, -1, OCI_B_CURSOR);

    oci_execute($stmt);

    oci_execute($rubros_cursor);

    if (!oci_execute($rubros_cursor)) {
        $error_message = "Ocurrió un error al ejecutar el cursor de resultado: " . oci_error($rubros_cursor);
        error_log($error_message);
        echo $error_message;
        oci_free_statement($stmt);
        Desconectar($conn);
        return null;
    }

    $rubros = array();

    while ($row = oci_fetch_assoc($rubros_cursor)) {
        $rubro = array(
            "id_rubro" => $row['ID_RUBRO'],
            "nombre_rubro" => $row['NOMBRE']
        );
        $rubros[] = $rubro;
    }

    oci_free_statement($stmt);
    oci_free_statement($rubros_cursor);
    Desconectar($conn);

    return json_encode($rubros);
}

echo obtenerRubros();
?>