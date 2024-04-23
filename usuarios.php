<?php
session_start();
if (isset($_SESSION['usuario']['login']) && $_SESSION['usuario']['login'] !== true) {
    echo "El ID de usuario es: " . $_SESSION['usuario']['id_usuario'];
    header('Location : login.php');
}
?>
<!DOCTYPE html>

<div class="wrapper">
    <!-- Modal -->
    <div class="modal fade" id="agregarUsuarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Agregar Usuario</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="agregarUsuarioForm">
                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" placeholder="Apellidos">
                        </div>
                        <div class="form-group">
                            <label for="puesto" class="form-label">Puesto</label>
                            <input type="text" class="form-control" id="puesto" placeholder="Puesto">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="enviarUsuario">Guardar</button>
                </div>
            </div>
        </div>
    </div>
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
                            <th scope="col">PUESTO </th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="tablaUsuarios">

                </table>
            </div>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#agregarUsuarioModal">
                <i class="bi bi-pencil-square"></i> Agregar Usuario
            </button>


        </div>
    </main>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/usuarios.js"></script>
</div>

</html>