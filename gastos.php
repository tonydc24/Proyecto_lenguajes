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
    <main class="gastos-main">
    <input type="hidden" id="id" value="<?php echo $_SESSION['usuario']['id_usuario']; ?>">
        <div>
            <form class="form-gastos">
                <h1 class="title">Solicitud de compra</h1>
                <!-- <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-auto">
                            <label for="disabledTextInput">Comprobante</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Id : 01">
                        </div>
                    </div>
                </fieldset> -->
                <div class="form-group row">
                    <div class="col-auto">
                        <label class="form-label" for="monto">Monto</label>
                        <input type="number" id="monto" class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-auto">
                        <label class="form-label" for="cantidad">Cantidad</label>
                        <input type="number" id="cantidad" class="form-control" />
                    </div>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-auto" id="centroCosto">

                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-auto"> <label for="exampleFormControlSelect1">Rubro</label>
                        <select class="form-control" id="rubros">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btnEnviar">Enviar</button>
                    </div>
                </div>
            </form>
           
        </div>
        <div id="exito">

</div>
    </main>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/gastos.js"></script>
</div>

</html>