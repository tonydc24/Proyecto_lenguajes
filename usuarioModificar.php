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
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Modificar usuario</h4>
                        </div>
                        <div class="row mt-2">
                            <fieldset disabled>
                                <div class="col-md-6"><label class="labels">ID</label><input type="text" class="form-control" placeholder="ID:01" value=""></div>
                            </fieldset>
                            <div class="col-md-6"><label class="labels">Nombre</label><input type="text" class="form-control" placeholder="Nombre del usuario" value=""></div>
                            <div class="col-md-6"><label class="labels">Apellidos</label><input type="text" class="form-control" value="" placeholder="Apellidos"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Puesto</label><input type="text" class="form-control"  value=""></div>
                            <div class="col-md-6"> <label for="exampleFormControlSelect1">Centro de costo</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <a href="usuarios.php">
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Guardar Perfil</button></div>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</html>