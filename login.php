<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    
    <link rel="stylesheet" href="css/normalize.css">    
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body class="body-login">
    <div class="grid">
        <div class="login-main-title">  
         <div>
            <h5>Centro</h5>
            <h5>de</h5>
            <h5>costos</h5>
         </div>
         <div> 

         </div>
        </div>
        <div class="div-login ">
            <form id="loginForm">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h4 class="card-title">Iniciar Sesión</h4>
                      <div class="form-outline mb-4">
                        <input type="text" id="username" name="usernama" class="form-control" />
                        <label class="form-label" for="username">Username</label>
                      </div>
                    
                    
                      <div class="form-outline mb-4">
                        <input type="password" id="password" name="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                      </div>
                      <button type="button" id="btnLogin" class="btn btn-primary">Login</button>
                    </div>
                  </div>
            </form>
            <footer>All rights reserved ©</footer>
        </div>
    </div>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/login.js"></script>
</body>

</html>