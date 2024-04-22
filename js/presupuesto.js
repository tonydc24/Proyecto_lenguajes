$(document).ready(function () {

    $.ajax({
        type: "GET",
        url: "GET/obtienePresupuesto.php",
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $.each(response, function (index, presupuesto) {
                var html = `
                <tr>
                    <th scope="row">${presupuesto.ID_PRESUPUESTO}</th>
                    <td>${presupuesto.MES}</td>
                    <td>${presupuesto.FECHA}</td>
                    <td>${presupuesto.MONTO_PRESUPUESTADO}</td>
                    <td>${presupuesto.ID_CENTROCOSTO}</td>
                    <td>${presupuesto.NOMBRE_CENTROCOSTO}</td>
                </tr>
                    `
                $('#tablaPresupuestos').append(html);
            });

        },
        error: function () {
            alert("Ocurrió un error al procesar la solicitud.");
        }
    });
    $.ajax({
        type: "GET",
        url: "GET/obtienePresupuesto.php",
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $.each(response, function (index, presupuesto) {
                var html = `
                    <option value="${presupuesto.ID_PRESUPUESTO}">${presupuesto.NOMBRE_CENTROCOSTO}</option>
                    `
                $('#centro1').append(html);
            });

        },
        error: function () {
            alert("Ocurrió un error al procesar la solicitud.");
        }
    });
    $.ajax({
        type: "GET",
        url: "GET/obtienePresupuesto.php",
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $.each(response, function (index, presupuesto) {
                var html = `
                    <option value="${presupuesto.ID_PRESUPUESTO}">${presupuesto.NOMBRE_CENTROCOSTO}</option>
                    `
                $('#centro2').append(html);
            });

        },
        error: function () {
            alert("Ocurrió un error al procesar la solicitud.");
        }
    });

    $("#enviarDatos").click(function () {
        event.preventDefault();
        var form = {
            centro1: $("#centro1").val(),
            centro2: $("#centro2").val(),
            monto: $("#monto").val()

        };
        console.log(form);
        $.ajax({
            type: "POST",
            url: "DAL/funciones.php",
            data: form,
            success: function (response) {
                var devuelta = JSON.parse(response);
                Swal.fire({
                    position: "top",
                    icon: "success",
                    title: devuelta,
                    showConfirmButton: false,
                    timer: 3000
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