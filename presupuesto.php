<?php
session_start();
if (isset($_SESSION['usuario']['login']) && $_SESSION['usuario']['login'] !== true) {
    echo "El ID de usuario es: " . $_SESSION['usuario']['id_usuario'];
    header('Location : login.php');
}
?>
<!DOCTYPE html>

<div class="wrapper">
    <?php
    require_once "templates/header.html";
    ?>

    <body class="main-index">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Modificar</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario -->
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="centro1" class="form-label">Centro de costo origen</label>
                                <select class="form-select" id="centro1">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="centro2" class="form-label">Centro de costo destino</label>
                                <select class="form-select" id="centro2">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="monto" class="form-label">Monto</label>
                                <input type="number" class="form-control" id="monto" placeholder="Monto">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="enviarDatos">Modificar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <main>
            <div>
                <div class="Presupuesto">
                    <table class="table table-striped table-dark">
                        <h2>Presupuestos</h2>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"># ID</th>
                                <th scope="col">Mes</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Monto presupuestado</th>
                                <th scope="col">Id Centro de costo</th>
                                <th scope="col">Centro de costo</th>
                            </tr>
                        </thead>
                        <tbody id="tablaPresupuestos">
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" id="open-modal-button">
                    Modificar presupuestos
                </button>
                </div>
            </div>
            <script src="js/jquery-3.7.1.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="js/presupuesto.js"></script>
        </main>
</div>

</html>