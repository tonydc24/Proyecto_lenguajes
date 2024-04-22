$(document).ready(function(){
        var id = $("#id").val();
        $.ajax({
            type: "POST",
            url: "DAL/funciones.php", 
            data: {id: id},
            success: function(response){
                
                var idGasto = JSON.parse (response);
                console.log (idGasto);
                html =`
                <label for="idCentro">Centro de costo</label>
                <input type="text" id="idCentro" class="form-control" value="${idGasto.nombre_centro}">
                `
                $('#centroCosto').append(html);
            },
            error: function(){
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });

        $.ajax({
            type: "GET",
            url: "GET/obtieneRubros.php", 
            dataType:'json',
            success: function(response){
                console.log (response);
                $.each(response, function (index, rubro) {
                     var html =`
                    <option value="${rubro.id_rubro}">${rubro.nombre_rubro}</option>
                    `
                    $('#rubros').append(html);
                });
                
            },
            error: function(){
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });


        $("#btnEnviar").click(function(){
   
            event.preventDefault();
            var form ={
                 id : $("#id").val(),
                 rubro : $("#rubros").val(),
                 cantidad : $("#cantidad").val(),
                monto : $("#monto").val()
            };
            console.log (form);
            $.ajax({
                type: "POST",
                url: "DAL/procedimientos.php", 
                data:form,
                success: function(response){
                    
                    console.log (response);    
                    html =`
                    <h1 >${exito.permiso_id}</h1>
                    <h1 >Tu id :${exito.mensaje}</h1>`
                    $('#exito').append(html);
                },
                error: function(){
                    alert("Ocurrió un error al procesar la solicitud.");
                }
            });
        });

}); 