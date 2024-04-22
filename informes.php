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
            <div class="tabla-liquidacion">
                <table class="table table-striped table-dark">
                    <h2>Liquidaciones</h2>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Concepto</th>
                            <th scope="col">Centro de costo</th>
                            <th scope="col">Saldo</th>

                        </tr>
                    </thead>
                    <tbody id="tablaLiquidacion">
                    </tbody>
                </table>
            </div>
        </div>
</main>
<script src="js/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/informes.js"></script>
</div>

</html>