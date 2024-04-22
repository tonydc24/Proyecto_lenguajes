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
                    <h2>Informe general</h2>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Mes</th>
                            <th scope="col">Compras realizadas</th>
                            <th scope="col">Centros de costos</th>
                            <th scope="col">Permisos de compra</th>
                            <th scope="col">Compras aprobadas</th>
                            <th scope="col">Compras rechazadas</th>
                            <th scope="col">Rubros en sistema</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Marzo</td>
                            <td>3</td>
                            <td>2</td>
                            <td>20</td>
                            <td>3</td>
                            <td>2</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Febrero</td>
                            <td>4</td>
                            <td>6</td>
                            <td>12</td>
                            <td>6</td>
                            <td>7</td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td>Abril</td>
                            <td>4</td>
                            <td>8</td>
                            <td>15</td>
                            <td>9</td>
                            <td>3</td>
                            <td>8</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</main>
</div>

</html>