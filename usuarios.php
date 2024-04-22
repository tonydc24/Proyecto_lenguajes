<?php 
 session_start();
 if(isset($_SESSION['usuario']['login']) && $_SESSION['usuario']['login'] !== true) {
  echo "El ID de usuario es: " . $_SESSION['usuario']['id_usuario'];
  header( 'Location : login.php');
} 
 ?>
<!DOCTYPE html>

<div class="wrapper">
    <?php
    require_once "templates/header.html";
    ?>
    <main>
        <div>
            <div>
                <table class="table table-striped table-dark">
                    <h2>Usuarios</h2>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"># ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Puestos</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Wood</td>
                            <td>Sales</td>
                            <th><a href="usuarioModificar.php"> <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Modificar</button></a></th>  
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Wood</td>
                            <td>Admin</td>
                            <th><a href="usuarioModificar.php"> <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Modificar</button></a></th>  
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>Wood</td>
                            <td>Sales</td>
                            <th><a href="usuarioModificar.php"> <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Modificar</button></a></th>  
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="agregar">           
                    <a href="usuarioAgregar.php"> <button type="button " class="btn btn-info"><i class="bi bi-pencil-square"></i> Agregar usuario</button></a>
        </div>
    </main>
</div>

</html>