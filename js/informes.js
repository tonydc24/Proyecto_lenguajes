$(document).ready(function () {

    $.ajax({
        type: "GET",
        url: "GET/obtieneLiquidacion.php",
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $.each(response, function (index, liquidacion) {
                var html = `
                <tr>
                    <th scope="row">${liquidacion.ID_LIQUIDACION}</th>
                    <td>${liquidacion.FECHA}</td>
                    <td>${liquidacion.CONCEPTO}</td>
                    <td>${liquidacion.ID_CENTROCOSTO}</td>
                    <td>${liquidacion.SALDO}</td>
                </tr>
                    `
                $('#tablaLiquidacion').append(html);
            });

        },
        error: function () {
            alert("Ocurrió un error al procesar la solicitud.");
        }
    });



}); 
