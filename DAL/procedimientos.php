<?php
include 'conexion.php'; // Asegúrate de incluir tu archivo de conexión

function solicitarPermisoCompra($usuario_id, $rubro_id, $cantidad, $monto) {
    $conn = Conecta();

    $permiso_id = 0; 
    $mensaje = ""; 

    $stmt = oci_parse($conn, 'BEGIN SP_solicitar_permiso_compra(:p_usuario_id, :p_rubro_id, :p_cantidad, :p_monto, :p_permiso_id, :p_mensaje); END;');

    oci_bind_by_name($stmt, ':p_usuario_id', $usuario_id);
    oci_bind_by_name($stmt, ':p_rubro_id', $rubro_id);
    oci_bind_by_name($stmt, ':p_cantidad', $cantidad);
    oci_bind_by_name($stmt, ':p_monto', $monto);
    oci_bind_by_name($stmt, ':p_permiso_id', $permiso_id, -1, SQLT_INT); // Tipo de dato INTEGER
    oci_bind_by_name($stmt, ':p_mensaje', $mensaje, 100); // Tamaño máximo del mensaje

    $result = oci_execute($stmt);

    if (!$result) {
        $error_message = "Ocurrió un error al ejecutar la sentencia: " . oci_error($stmt);
        error_log($error_message); 
        echo $error_message; 
    } else {
        oci_free_statement($stmt);

        Desconectar($conn);

        return json_encode(array("permiso_id" => $permiso_id, "mensaje" => $mensaje));
    }
}
if(isset($_POST['id_user'], $_POST['rubro'] , $_POST['cantidad'] , $_POST['monto'] )) {
    $id = $_POST['id_user'];
    $rubro = $_POST['rubro'];
    $cantidad = $_POST['cantidad'];
    $monto = $_POST['monto'];
    echo solicitarPermisoCompra($id, $rubro,$cantidad,$monto);
} 






function validarLogin($username, $password) {
    $conn = Conecta();

    $id_usuario = 0; 
    $valido = ""; 

    $stmt = oci_parse($conn, 'BEGIN SP_VALIDAR_LOGIN(:p_username, :p_password, :p_id, :p_valid); END;');

    oci_bind_by_name($stmt, ':p_username', $username);
    oci_bind_by_name($stmt, ':p_password', $password);
    oci_bind_by_name($stmt, ':p_id', $id_usuario, -1, SQLT_INT); 
    oci_bind_by_name($stmt, ':p_valid', $valido, 100); 

    $result = oci_execute($stmt);

    if (!$result) {
        $error_message = "Ocurrió un error al ejecutar la sentencia: " . oci_error($stmt);
        error_log($error_message); 
        echo $error_message; 
    } else {
        oci_free_statement($stmt);

        Desconectar($conn);

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



function insertarUsuario($nombre, $apellidos, $puesto, $password) {
    $conn = Conecta();

    if (!$conn) {
        return json_encode(array("error" => "Error de conexión a la base de datos."));
    }

    $stmt = oci_parse($conn, 'BEGIN SP_InsertarUsuario(:p_Nombre, :p_Apellidos, :p_Puesto, :p_Password); END;');

    oci_bind_by_name($stmt, ':p_Nombre', $nombre);
    oci_bind_by_name($stmt, ':p_Apellidos', $apellidos);
    oci_bind_by_name($stmt, ':p_Puesto', $puesto);
    oci_bind_by_name($stmt, ':p_Password', $password);

    $result = oci_execute($stmt);

    if (!$result) {
        $error_message = "Ocurrió un error al ejecutar el procedimiento almacenado: " . oci_error($stmt);
        error_log($error_message);
        echo $error_message;
    } else {
        oci_free_statement($stmt);

        Desconectar($conn);

        return json_encode(array("mensaje" => "Usuario insertado correctamente."));
    }
}

if(isset($_POST['nombre'], $_POST['apellidos'] , $_POST['puesto'] , $_POST['password'] )) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $puesto = $_POST['puesto'];
    $password = $_POST['password'];
    echo insertarUsuario($nombre, $apellidos,$puesto,$password);
} 

function eliminarUsuario($id_usuario) {
    $conn = Conecta();

    if (!$conn) {
        return json_encode(array("error" => "Error de conexión a la base de datos."));
    }

    $stmt = oci_parse($conn, 'BEGIN SP_EliminarUsuario(:p_ID_Usuario); END;');

    oci_bind_by_name($stmt, ':p_ID_Usuario', $id_usuario, SQLT_INT);

    $result = oci_execute($stmt);

    if (!$result) {
        $error_message = "Ocurrió un error al ejecutar el procedimiento almacenado: " . oci_error($stmt);
        error_log($error_message);
        echo $error_message;
        oci_free_statement($stmt);
        Desconectar($conn);
        return null;
    }

    oci_free_statement($stmt);
    Desconectar($conn);

    return json_encode(array("mensaje" => "Usuario eliminado correctamente."));
}


if(isset($_POST['IdEliminar'])) {
    $IdEliminar = $_POST['IdEliminar'];
 
    echo eliminarUsuario($IdEliminar);
} 
?>
