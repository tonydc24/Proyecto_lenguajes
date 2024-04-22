
<?php
function Conecta () {
    $username = 'sqlBD';
$password = 'admin123';
$hostname = 'localhost/ORCL';

$conn = oci_connect($username, $password, $hostname);
if (!$conn){
    $error_message = "Ocurrió un error al conectar a la base de datos: " . oci_error();
    error_log($error_message); 
    echo $error_message; 
}
else {
    $success_message = "¡Conexión exitosa!";
    error_log($success_message); 
    return $conn; 
}
};

function Desconectar ($conn){
    oci_close($conn);
}

?>