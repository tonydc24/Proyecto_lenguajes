<?php
include 'conexion.php'; // Asegúrate de incluir tu archivo de conexión

function solicitarPermisoCompra($usuario_id, $rubro_id, $cantidad, $monto) {
    // Conectar a la base de datos
    $conn = Conecta();

    // Definir los parámetros de salida
    $permiso_id = 0; // Salida: inicializamos en 0
    $mensaje = ""; // Salida: mensaje inicial vacío

    // Preparar la sentencia para llamar al procedimiento
    $stmt = oci_parse($conn, 'BEGIN SP_solicitar_permiso_compra(:p_usuario_id, :p_rubro_id, :p_cantidad, :p_monto, :p_permiso_id, :p_mensaje); END;');

    // Vincular los parámetros
    oci_bind_by_name($stmt, ':p_usuario_id', $usuario_id);
    oci_bind_by_name($stmt, ':p_rubro_id', $rubro_id);
    oci_bind_by_name($stmt, ':p_cantidad', $cantidad);
    oci_bind_by_name($stmt, ':p_monto', $monto);
    oci_bind_by_name($stmt, ':p_permiso_id', $permiso_id, -1, SQLT_INT); // Tipo de dato INTEGER
    oci_bind_by_name($stmt, ':p_mensaje', $mensaje, 100); // Tamaño máximo del mensaje

    // Ejecutar la sentencia
    $result = oci_execute($stmt);

    if (!$result) {
        $error_message = "Ocurrió un error al ejecutar la sentencia: " . oci_error($stmt);
        error_log($error_message); 
        echo $error_message; 
    } else {
        // Cerrar el statement
        oci_free_statement($stmt);

        // Desconectar de la base de datos
        Desconectar($conn);

        // Retornar los resultados
        return json_encode(array("permiso_id" => $permiso_id, "mensaje" => $mensaje));
    }
}
if(isset($_POST['id'], $_POST['rubro'] , $_POST['cantidad'] , $_POST['monto'] )) {
    $id = $_POST['id'];
    $rubro = $_POST['rubro'];
    $cantidad = $_POST['cantidad'];
    $monto = $_POST['monto'];
    echo solicitarPermisoCompra($id, $rubro,$cantidad,$monto);
} 

// Ejemplo de uso:
// $resultado = solicitarPermisoCompra(123, 456, 1, 100);
// echo "ID del permiso: " . $resultado['permiso_id'] . "<br>";
// echo "Mensaje: " . $resultado['mensaje'];



function validarLogin($username, $password) {
    // Conectar a la base de datos
    $conn = Conecta();

    // Definir los parámetros de salida
    $id_usuario = 0; // Salida: inicializamos en 0
    $valido = ""; // Salida: inicializamos en vacío

    // Preparar la sentencia para llamar al procedimiento
    $stmt = oci_parse($conn, 'BEGIN SP_VALIDAR_LOGIN(:p_username, :p_password, :p_id, :p_valid); END;');

    // Vincular los parámetros
    oci_bind_by_name($stmt, ':p_username', $username);
    oci_bind_by_name($stmt, ':p_password', $password);
    oci_bind_by_name($stmt, ':p_id', $id_usuario, -1, SQLT_INT); // Tipo de dato INTEGER
    oci_bind_by_name($stmt, ':p_valid', $valido, 100); // Tamaño máximo del mensaje

    // Ejecutar la sentencia
    $result = oci_execute($stmt);

    if (!$result) {
        $error_message = "Ocurrió un error al ejecutar la sentencia: " . oci_error($stmt);
        error_log($error_message); 
        echo $error_message; 
    } else {
        // Cerrar el statement
        oci_free_statement($stmt);

        // Desconectar de la base de datos
        Desconectar($conn);

        // Retornar los resultados
        $resultado= array("id_usuario" => $id_usuario, "valido" => $valido);
        if ($valido === "TRUE") {
            session_start();
            $_SESSION['usuario'] = array(
                'id_usuario' => $id_usuario,
                'login' => true
            );
        }
        $json_resultado = json_encode($resultado);

        return $json_resultado;
    }
}
if(isset($_POST['username'], $_POST['password'] )) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo validarLogin($username, $password );
} 
//Test login
// echo validarLogin('Pedro', 'secreto123' );
?>