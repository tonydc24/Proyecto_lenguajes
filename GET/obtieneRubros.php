<?php
require_once('../DAL/conexion.php');
function obtenerRubros() {
    // Obtener la conexión a la base de datos utilizando la función Conecta() del archivo de conexión
    $conn = Conecta();

    // Verificar la conexión
    if (!$conn) {
        return json_encode(array("error" => "Error de conexión a la base de datos."));
    }

    // Preparar la llamada al procedimiento almacenado en Oracle
    $stmt = oci_parse($conn, "BEGIN CALL_OBTENER_RUBROS(:rubros_cursor); END;");

    // Variable para almacenar el cursor de resultado
    $rubros_cursor = oci_new_cursor($conn);

    // Vincular el parámetro de salida (cursor)
    oci_bind_by_name($stmt, ":rubros_cursor", $rubros_cursor, -1, OCI_B_CURSOR);

    // Ejecutar el procedimiento almacenado
    oci_execute($stmt);

    // Ejecutar el cursor
    oci_execute($rubros_cursor);

    if (!oci_execute($rubros_cursor)) {
        $error_message = "Ocurrió un error al ejecutar el cursor de resultado: " . oci_error($rubros_cursor);
        error_log($error_message);
        echo $error_message;
        oci_free_statement($stmt);
        Desconectar($conn);
        return null;
    }

    // Array para almacenar los rubros
    $rubros = array();

    // Iterar sobre las filas devueltas por el cursor
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

    // Devolver los rubros en formato JSON
    return json_encode($rubros);
}

echo obtenerRubros();
