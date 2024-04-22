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
                    <h2>Presupuestos</h2>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"># ID</th>
                            <th scope="col">Mes</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Monto presupuestado</th>
                            <th scope="col">Centro de costo</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Febrero</td>
                            <td>21/02/2024</td>
                            <td>1.000.000</td>
                            <td>1</td>
                            <th><a href="modificarPresupuesto.php"> <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Modificar</button></a></th>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                            <td>Marzo</td>
                            <td>21/03/2024</td>
                            <td>2.000.000</td>
                            <td>2</td>
                            <th><a href="modificarPresupuesto.php"> <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Modificar</button></a></th>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                            <td>Abril</td>
                            <td>21/04/2024</td>
                            <td>3.000.000</td>
                            <td>3</td>
                            <th><a href="modificarPresupuesto.php"> <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Modificar</button></a></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>

</html>