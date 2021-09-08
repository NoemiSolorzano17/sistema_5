
window.onload=mostrarEntregables();
/*FUNCION PARA INGRESAR LOS TAREA*/

function ingresarEntregables(){ 
    //Datos que se envian a la ruta
    
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var FrmData = {
        documento:$('#entregable_documento').val(),
        descripcionDocumento:$('#entregable_descripcion').val(),
        asunto:$('#entregable_asunto').val(),
        codigo:$('#entregable_codigo').val(),
        fechaCargo:$('#entregable_fecha').val(),
        tarea_id:$('#id_Tarea_entregable').val(),
        
    
    }
    $.ajax({
        url: 'Entregable', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            
            mostrarEntregables($('#id_Tarea_entregable').val());    
            limpiar();
        },
        complete: function(){
               
            }
    });  
}

function limpiar(){
    $('#entregable_documento').val('');
    $('#entregable_descripcion').val('');
    $('#entregable_asunto').val('');
    $('#entregable_fecha').val('');
    $('#entregable_codigo').val('');
    }


function mostrarEntregables(id){
    $.get('FiltrarEntregables/'+id, function (data) {
        $("#tablaentregables").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablaEntregables(item); // carga los datos en la tabla
        });      
    });
    
}


function eliminarEntregables(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'Entregable/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
        mostrarEntregables($('#id_Tarea_entregable').val());  // carga los datos en la tabla                       
        }
    });
}

function prepararactualizarEntregables(id){

   
    $.get('preparactualizarentregables/'+id,function(data){
      
        $('#identregables').val(data.id);
        $('#entregableDocumento').val(data.documento);
        $('#entregableDescripcion').val(data.descripcionDocumento);
        $('#entregableAsunto').val(data.asunto);
        $('#entregableCodigo').val(data.codigo);
        $('#entregableFecha').val(data.fechaCargo);
          
                      
    });
}



function limpiarModificar(){
    $('#entregableDocumento').val('');
    $('#entregableDescripcion').val('');
    $('#entregableAsunto').val('');
    $('#entregableCodigo').val('');
    $('#entregableFecha').val('');
    }
/*PARA ACTUALIZAR LOS DATOS DEL TAREA*/
function EntregablesUpdate(){ 
   var FrmData = {
        id: $('#identregables').val(),
        documento:$('#entregableDocumento').val(),
        descripcionDocumento:$('#entregableDescripcion').val(),
        asunto:$('#entregableAsunto').val(),
        codigo:$('#entregableCodigo').val(),
        fechaCargo:$('#entregableFecha').val(),

    
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'Entregable/'+ $('#identregables').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarEntregables($('#id_Tarea_entregable').val()); 
            limpiarModificar();
        },
       
    });  


}


function cargartablaEntregables(data){
  
    $("#tablaentregables").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.documento+"</td>\
         <td>"+ data.descripcionDocumento+"</td>\
         <td>"+ data.asunto+"</td>\
         <td>"+ data.codigo+"</td>\
         <td>"+ data.fechaCargo+"</td>\
         <td class='row'><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#actualizarEntregablesmodal'onClick='prepararactualizarEntregables("+data.id+")'><i class='fa fa-edit'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarEntregables("+data.id+")'><i class='fa fa-trash'></i></button></td>\
         </tr>"
    );
}

