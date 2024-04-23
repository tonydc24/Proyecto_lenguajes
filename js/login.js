$(document).ready(function(){
    $("#btnLogin").click(function(){
   
        event.preventDefault();
        
        var username = $("#username").val();
        var password = $("#password").val();
        
        $.ajax({
            type: "POST",
            url: "DAL/procedimientos.php", 
            data: {
                username: username,
                password: password
            },
            success: function(response){
                
                var login = JSON.parse (response);
                console.log (login);
                if(login.valido === "TRUE"){
                    alert("Inicio de sesión exitoso");
                    window.location.href = "index.php";
                } else {
                    alert("Inicio de sesión fallido. Por favor, verifica tus credenciales.");
                }
            },
            error: function(){
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });
    });
}); 