
window.onload=mostrarTareas();
/*FUNCION PARA INGRESAR LOS TAREA*/

function ingresarTareas(){ 
    //Datos que se envian a la ruta
    
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var FrmData = {
        descripcionTarea:$('#tarea_descripcionTarea').val(),
        fechaCreacion:$('#tarea_fechaCreacion').val(),
        fechafinalizacion:$('#tarea_fechafinalizacion').val(),
        estrategia_id:$('#idEstrategia_Tarea').val(),
        
    
    }
    $.ajax({
        url: 'Tarea', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            
            mostrarTareas($('#idEstrategia_Tarea').val());    
            limpiar();
        },
        complete: function(){
               
            }
    });  
}


/*MOSTRAR TODOS LO TAREAS*/
function mostrarTareas(id){
    $.get('FiltrarTareas/'+id, function (data) {
        $("#tablatareas").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablaTarea(item); // carga los datos en la tabla
        });      
    });
    
}

 
function eliminarTareas(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'Tarea/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
        mostrarTareas($('#idEstrategia_Tarea').val());  // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL TAREA SELECCIONADO  EN EL MODAL */
function prepararactualizarTarea(id){

   
    $.get('preparactualizartareas/'+id,function(data){
      
        $('#idTarea').val(data.id);
        $('#tarea_d').val(data.descripcionTarea);
        $('#tarea_fComienzo').val(data.fechaCreacion);
        $('#tarea_final').val(data.fechafinalizacion);
        //$('#tarea_r').val(data.recomendacionesusuarios_id);
        //$('#tarea_e').val(data.estrategia_id);
       
        
        
                           
    });
}




/*PARA ACTUALIZAR LOS DATOS DEL TAREA*/

function limpiarUpdate(){
    $('#tarea_d').val('');
    $('#tarea_fComienzo').val('');
    $('#tarea_final').val('');
    }

   
function TareasUpdate(){ 
   var FrmData = {
        id: $('#idTarea').val(),
        descripcionTarea:$('#tarea_d').val(),
        fechaCreacion:$('#tarea_fComienzo').val(),
        fechafinalizacion:$('#tarea_final').val(),
        //recomendacionesusuarios_id:$('#tarea_r').val(),
        //estrategia_id:$('#tarea_e').val(),
    
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'Tarea/'+ $('#idTarea').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarTareas($('#idEstrategia_Tarea').val()); 
            limpiarUpdate();
        },
       
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiar(){
    $('#tarea_descripcionTarea').val('');
    $('#tarea_fechaCreacion').val('');
    $('#tarea_fechafinalizacion').val('');
    }

   


/*FUNCIÓN PARA CARGAR LOS TAREA EN LA TABLA*/ 

function cargartablaTarea(data){
  
    $("#tablatareas").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.descripcionTarea+"</td>\
         <td>"+ data.fechaCreacion+"</td>\
         <td>"+ data.fechafinalizacion+"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' onClick='Mostrar_Tarea_Entregables("+data.id+")'><i class= 'fa fa-	fa fa-folder-open-o'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#actualizarTareasmodal'onClick='prepararactualizarTarea("+data.id+")'><i class='fa fa-edit'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarTareas("+data.id+")'><i class='fa fa-trash'></i></button></td>\
         </tr>"
    );
}

function Mostrar_Tarea_Entregables(id){
    $('#ventanaAgregarEntregables').modal('show');
    $('#id_Tarea_entregable').val(id);
    mostrarEntregables(id);
       
}

