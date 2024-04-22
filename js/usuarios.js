$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "GET/obtieneUsuarios.php",
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $.each(response, function (index, usuario) {
                var html = `
                <tr>
                    <th scope="row">${usuario.id_usuario}</th>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.apellidos}</td>
                    <td>${usuario.puesto}</td>
                    <th><button type="button" id="enviarEliminar" data-usuario-id="${usuario.id_usuario}" class="btn btn-danger eliminarV"></i> Eliminar</button></th>  
                </tr>
                    `
                $('#tablaUsuarios').append(html);
            });

        },
        error: function () {
            alert("Ocurrió un error al procesar la solicitud.");
        }
    });

    $("#enviarUsuario").click(function () {

        var form = {
            nombre: $("#nombre").val(),
            apellidos: $("#apellidos").val(),
            puesto: $("#puesto").val(),
            password: $("#password").val()
        };
        console.log(form);
        $.ajax({
            type: "POST",
            url: "DAL/procedimientos.php",
            data: form,
            success: function (response) {
                var devuelta = JSON.parse(response);
                console.log(devuelta);


                Swal.fire({
                    position: "top",
                    icon: "success",
                    title: devuelta.mensaje,
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.reload();
                });
                
            },
            error: function () {
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });
    });

    
    $(document).on('click', '.eliminarV', function ()  {
        var IdEliminar = $(this).data('usuario-id');
        console.log(IdEliminar);
        $.ajax({
            type: "POST",
            url: "DAL/procedimientos.php",
            data: { IdEliminar : IdEliminar},
            success: function (response) {
                var devuelta = JSON.parse(response);
                console.log(devuelta);
                Swal.fire({
                    position: "top",
                    icon: "error",
                    title: devuelta.mensaje,
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.reload();
                });
                
            },
            error: function () {
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });
    });

}); 