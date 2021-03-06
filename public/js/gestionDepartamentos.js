window.onload=llenarDepartamento();

function ingresarDepartamento(){
 
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

        var FrmData = {
            descripcionDepartamento:$('#descripcionDepartamento').val(),
          
        }
        $.ajax({
            url:'Departamento', // Url que se envia para la solicitud
            method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
             llenarDepartamento();
              $('#descripcionDepartamento').val("");
            },
            complete: function(){
               
            }
        });
}


function llenarDepartamento(){
      
        $.get('DepartamentoCargar', function (data) { 
             $('#tablaDepartamento').html(''); // limpia el tbody de la tabla
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                // agregaso uno a uno los valores del objero json como una fila
                // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
                $('#tablaDepartamento').append(
                    '<tr>'+
                        '<td>'+item.descripcionDepartamento+'</td>'+
                        '<td>'+
                        '  <button type="button" class="btn btn-info btn-sm" onclick="Mostrar_Cargos_Departamento('+item.id+')"><i class="fa fa-trash"></button>'+
                        '</td>'+
                        '<td>'+
                        '<button type="button" class="btn btn-warning btn-sm " onclick="editartipoDepartamento('+item.id+')"><i class="fa fa-edit"></i></button>'+
                        '</td>'+
                        '<td>'+
                          '  <button type="button" class="btn btn-danger btn-sm" onclick="eliminarDepartamento('+item.id+')"><i class="fa fa-trash"></button>'+
                        '</td>'+
                    '</tr>'
                );
         });
    });
}



 function eliminarDepartamento(id){
     
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url:'Departamento/' + id,
            success: function (data) {
              
             llenarDepartamento();
                
               
            },  
        });
 }


function editartipoDepartamento(id){
        $.get('Departamento/'+id+'/edit', function (data) {
              $('#descripcionDepartamento').val(data.descripcionDepartamento);
              $('#btnD').attr('class','btn btn-warning');
              $('#btnD').html("modificar");
              $('#btnD').attr('onclick','ActualizarDepartamento('+id+')');
             
        });

        limpiarDepartamento();
 
}
function limpiarDepartamento(){
    $('#descripcionDepartamento').val("");
}



function ActualizarDepartamento(id){
        if ($('#descripcionDepartamento').val()=='') {return;}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        var FrmData = {
            descripcionDepartamento: $('#descripcionDepartamento').val(),
        }
        $.ajax({
            url:'Departamento/'+id, // Url que se envia para la solicitud
            type: 'PUT',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            //dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
                llenarDepartamento();
                limpiarDepartamento();
                 $('#btnD').attr('class','btn btn-primary ');
                 $('#btnD').attr('onclick','ingresarDepartamento()');
                 $('#btnD').html("Guardar");
            }
        });
}

function Mostrar_Cargos_Departamento(id){
    $('#ventanaAgregarCargos').modal('show');
    $('#id_departamento').val(id);
    mostrarCargos(id);
       
}




 