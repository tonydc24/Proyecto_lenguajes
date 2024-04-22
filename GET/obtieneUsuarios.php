<?php 
require_once('../DAL/conexion.php');

function obtenerUsuarios() {
    $conn = Conecta();

    if (!$conn) {
        return json_encode(array("error" => "Error de conexión a la base de datos."));
    }

    $stmt = oci_parse($conn, "BEGIN :usuarios_cursor := FUNC_obtener_usuarios(); END;");

    $usuarios_cursor = oci_new_cursor($conn);

    oci_bind_by_name($stmt, ":usuarios_cursor", $usuarios_cursor, -1, OCI_B_CURSOR);

    oci_execute($stmt);

    oci_execute($usuarios_cursor);

    if (!oci_execute($usuarios_cursor)) {
        $error_message = "Ocurrió un error al ejecutar el cursor de resultado: " . oci_error($usuarios_cursor);
        error_log($error_message);
        echo $error_message;
        oci_free_statement($stmt);
        Desconectar($conn);
        return null;
    }

    $usuarios = array();

    while ($row = oci_fetch_assoc($usuarios_cursor)) {
        $usuario = array(
            "id_usuario" => $row['ID_USUARIO'],
            "nombre" => $row['NOMBRE'],
            "apellidos" => $row['APELLIDOS'],
            "puesto" => $row['PUESTO'],
        );
        $usuarios[] = $usuario;
    }

    oci_free_statement($stmt);
    oci_free_statement($usuarios_cursor);
    Desconectar($conn);

    return json_encode($usuarios);
}
echo obtenerUsuarios();
?>