<!DOCTYPE html>
 <?php 
 session_start();
 if(isset($_SESSION['usuario']['login']) && $_SESSION['usuario']['login'] !== true) {
  echo "El ID de usuario es: " . $_SESSION['usuario']['id_usuario'];
  header( 'Location : login.php');
} 
 ?>
 <div class="wrapper">
     <?php 
        require_once "templates/header.html";
      ?>
      <main class="main-index">
        <div class="div-index">
            <h5>Centro</h5>
            <h5>de</h5>
            <h5>costos</h5>
        </div>
      </main>
 </div>
</html>