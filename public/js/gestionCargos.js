
window.onload=mostrarCargos();
/*FUNCION PARA INGRESAR LOS TAREA*/

function ingresarCargos(){ 
    //Datos que se envian a la ruta
    
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var FrmData = {
        descripcionCargo:$('#cargo_Descripcion').val(),
        departamento_id:$('#id_departamento').val(),
        
        
    
    }
    $.ajax({
        url: 'Cargo', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            
            mostrarCargos();  
            limpiar();
        },
        complete: function(){
               
            }
    });  
}


/*MOSTRAR TODOS LO TAREAS*/
function mostrarCargos(){
    $.get('CargoMostrar/', function (data) {
        $("#tablacargos").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargartablaCargos(item); // carga los datos en la tabla
        });      
    });
    
}

 
function eliminarCargos(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'Cargo/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
        mostrarCargos();  // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL TAREA SELECCIONADO  EN EL MODAL */
function prepararactualizarCargos(id){

   
    $.get('preparactualizarcargo/'+id,function(data){      
        $('#idCargo').val(data.id);
        $('#cargo_d').val(data.descripcionCargo);
              
        
                           
    });
}



function limpiarModificarCargos(){
    $('#cargo_d').val('');
    
}
/*PARA ACTUALIZAR LOS DATOS DEL TAREA*/
function CargosUpdate(){ 
   var FrmData = {
        id: $('#idCargo').val(),
        descripcionCargo:$('#cargo_d').val(),
            
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'Cargo/'+ $('#idCargo').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarCargos();
            limpiarModificarCargos();
        },
       
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiar(){
    $('#cargo_Descripcion').val('');
    
    }

   


/*FUNCIÓN PARA CARGAR LOS TAREA EN LA TABLA*/ 

function cargartablaCargos(data){
  
    $("#tablacargos").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.descripcionCargo+"</td>\
         <td>"+ data.departamentos_v2.descripcionDepartamento+"</td>\
         <td class='row'><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#actualizarCargosmodal'onClick='prepararactualizarCargos("+data.id+")'><i class='fa fa-edit'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarCargos("+data.id+")'><i class='fa fa-trash'></i></button></td>\
         </tr>"
    );
}