
window.onload=mostrarInforme();
//window.onload=mostrarSubtema();
/*FUNCION PARA INGRESAR LOS INFORME*/


//funcion que valida que la fecha de fin sea mayor o igual que la fecha de inicio 
$('#informe_fechaLimite').change(function () {
   
    if ($('#informe_fecha').val()<=$('#informe_fechaLimite').val()) {
        
    }else{
        alert('Seleccione una fecha valida');
        $('#informe_fechaLimite').val($('#informe_fecha').val());
    }
 
 });

function ingresarInforme(archivof){ 
    //Datos que se envian a la ruta
    
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var FrmData = {
        fechaAprobacion:$('#informe_fecha').val(),
        fechaLimite:$('#informe_fechaLimite').val(),
        memorandoSolicitud: $('#informe_memorando').val(),
        temaExamen: $('#informe_tema').val(),
        porcentajeCumplido: $('#informe_cumplido').val(),
        observacion: $('#informe_Observacion').val(), 
        codigoInforme: $('#informe_codigo').val(),
        estadoInforme: $('#informe_estadoInforme').val(),
        tipoInforme_id:$('#informe_tipo').val(),
        archivo:archivof,
        }
        
    $.ajax({
        url: 'Informe', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            
            mostrarInforme();      
           limpiarInforme();
        },
        complete: function(){
               
            }
    });  
}

$("#form_enviarFileD").submit(function(e){ // este metodo es para el submit de un formulario donde tengas                                     // el input de tipo file # form_enviarFile es el nombre de eese formulario
    e.preventDefault();   // evitamos que se recargue la pagina al ejecutar el formulario
    
    $.ajaxSetup({
        headers: { 
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST", // la ruta tiene que ser port // define una ruta post
        url: 'guardarDocumento',  // en este caso la ruta es esta
        // data: e.serialize(),
        data: new FormData(this), // como dato enviamos el contenido del formulario creando un objeto del mismo
        contentType: false,  // no se pa q es esto xd
        cache: false, // tampoco se
        processData: false, // ni idea
        
       
        success: function (data) { // eso si quiers omitelo
           
            ingresarInforme(data.archivo);
            
        },
            

    }); 
});





/*MOSTRAR TODOS LO INFORME*/
function mostrarInforme(){
    $.get('InformeMostrar', function (data) {
        $("#tablainforme").html("");
        $.each(data, function(i, item) { //recorre el data 
          cargartablaInforme(item); // carga los datos en la tabla
        });      
    });
    
}


function eliminarInforme(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url:'Informe/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
         mostrarInforme(); // carga los datos en la tabla                       
        }
    });
}
/*MUESTRA LOS DATOS DEL INFORME SELECCIONADO  EN EL MODAL */
function prepararactualizarinforme(id){
   
    $.get('prepararInforme/'+id,function(data){
         
        $('#idInforme').val(data.id);
        $('#InformeFecha').val(data.fechaAprobacion);
        $('#InformeFechalimite').val(data.fechaLimite);
        $('#InformeMemorando').val(data.memorandoSolicitud); 
        $('#InformeTema').val(data.temaExamen);
        $('#InformeCumplimiento').val(data.porcentajeCumplido);
        $('#InformeObservacion').val(data.observacion);   
        $('#InformeCodigo').val(data.codigoInforme);
        $('#InformeEstadoInforme').val(data.estadoInforme);  
        $('#informe_tipoinforme').val(data.tipoInforme_id);     
                        
    });
}
/*PARA ACTUALIZAR LOS DATOS DEL INFORME*/
function informeUpdate(){ 
   var FrmData = {
        id: $('#idInforme').val(),
        fechaAprobacion:$('#InformeFecha').val(),
        fechaLimite: $('#InformeFechalimite').val(),
        memorandoSolicitud:$('#InformeMemorando').val(),
        temaExamen:$('#InformeTema').val(),
        porcentajeCumplido:$('#InformeCumplimiento').val(),
        observacion:$('#InformeObservacion').val(),
        codigoInforme:$('#InformeCodigo').val(),
        estadoInforme:$('#InformeEstadoInforme').val(),
        tipoInforme_id:$('#informe_tipoinforme').val(),

     
    
    }
    console.log(FrmData);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'Informe/'+ $('#idInforme').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarInforme(); 
            limpiarinformeupdate();
        },
       
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarInforme(){
    $('#informe_fecha').val("");
    $('#informe_fechaLimite').val("");
    $('#informe_memorando').val("");
     $('#informe_tema').val("");
    $('#informe_cumplido').val("");
    $('#informe_Observacion').val("");
    $('#informe_codigo').val("");
    $('#informe_estadoInforme').val("");
    

}
function limpiarinformeupdate(){
    $('#InformeFecha').val("");
    $('#InformeFechalimite').val("");
    $('#InformeMemorando').val("");
    $('#InformeTema').val("");
    $('#InformeCumplimiento').val("");
    $('#InformeObservacion').val("");
    $('#InformeCodigo').val("");
    $('#InformeEstadoInforme').val("");
}



function  cargartablaInforme(data){
  //debugger
    $("#tablainforme").append(
        "<tr id='fila_cod"+"'>\
        <td>"+ data.fechaAprobacion+"</td>\
        <td>"+ data.codigoInforme+"</td>\
        <td>"+ data.estadoInforme+"</td>\
        <td>"+ data.porcentajeCumplido+"</td>\
        <td>"+ data.tipoinforme_v2.tipoInforme+"</td>\
        <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#datosinformegeneral' onClick='datosinforme("+data.id+")'><i class='fa fa-eye'></i>Ver</button></td>\
        <td class='row'><button type='button' class='btn btn-info' id='btn-confirm' onClick='Mostrar_informe_Subtema("+data.id+")'><i class='fa fa-map-o'></i></button></td>\
        <td class='row'><button type='button' class='btn btn-defaul' id='btn-confirm' onClick='Mostrar_Estado("+data.id+")'><i class='fa fa-exchange'></i></button></td>\
        <td class='row'><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#actualizarInformemodal' onClick='prepararactualizarinforme("+data.id+")'><i class='fa fa-edit'></i></button></td>\
        <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarInforme("+data.id+")'><i class='fa fa-trash'></i></button></td>\
      </tr>"
    );

    
}


////////////////////////////////////////////////////////////////
function datosinforme(val){
    $.get('datosInforme/'+val, function (data) {  //esta la uso para limpiar la tabla en el modulo de asignacion por Jose Sabando
       console.log(data);
       $.each(data, function(a, item) {
           document.getElementById('fechaap').innerHTML = item.fechaAprobacion ;
           document.getElementById('fechalip').innerHTML = item.fechaLimite;
           document.getElementById('Memorandop').innerHTML =  item.memorandoSolicitud;
           document.getElementById('temap').innerHTML = item.temaExamen;
           document.getElementById('porcentajeCumplidopp').innerHTML = item.porcentajeCumplido;
           document.getElementById('obserp').innerHTML = item.observacion;
           document.getElementById('codigop').innerHTML =  item.codigoInforme;
           document.getElementById('estadoInforp').innerHTML = item.estadoInforme;
           document.getElementById('dtipoInfp').innerHTML = item.tipoInforme;
       });
   });
}





$( "#B_Infome" ).keyup(function() {
  
 
    $.get('buscarInforme/'+$( "#B_Infome").val()+'/'+ $('#dtpFechaAprobación').val(), function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablainforme').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablainforme").append(
                      "<tr id='"+item.id+"'>"+
                       "<td>"+ item.fechaAprobacion+"</td>"+
                       "<td>"+ item.fechaLimite+"</td>"+
                         "<td>"+ item.memorandoSolicitud+"</td>"+
                       "<td>"+ item.temaExamen+"</td>"+
                       "<td>"+ item.porcentajeCumplido+"</td>"+
                       "<td>"+ item.observacion+"</td>"+
                       "<td>"+ item.codigoInforme+"</td>"+
                       "<td>"+ item.estadoInforme+"</td>"+
                       "<td>"+ item.tipoinforme_v2.tipoInforme+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarInformemodal' onClick='prepararactualizarinforme("+item.id+")'><i class='fa fa-edit'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarInforme("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});

$( "#dtpFechaAprobación" ).change(function() {
    $.get('buscarInformev2/'+$('#dtpFechaAprobación').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
        // limpia el tbody de la tabla
        //alert(2); 
        $('#tablainforme').html('');
       $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
         $("#tablainforme").append(
                "<tr id='"+item.id+"'>"+
                 "<td>"+ item.fechaAprobacion+"</td>"+
                 "<td>"+ item.fechaLimite+"</td>"+
                 "<td>"+ item.memorandoSolicitud+"</td>"+
                 "<td>"+ item.temaExamen+"</td>"+
                 "<td>"+ item.porcentajeCumplido+"</td>"+
                 "<td>"+ item.observacion+"</td>"+
                 "<td>"+ item.codigoInforme+"</td>"+
                 "<td>"+ item.estadoInforme+"</td>"+
                 "<td>"+ item.tipoinforme_v2.tipoInforme+"</td>"+
                 "<td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#actualizarInformemodal' onClick='prepararactualizarinforme("+item.id+")'><i class='fa fa-edit'></i></button></td>"+
                 "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarInforme("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
          );
          
   }); 
});
});


$( "#btnRefrescarInforme" ).click(function() {
    mostrarInforme();
});

/////////////////////////////////////////////////////////////////////////////////////////
function Mostrar_informe_Subtema(id){
    $('#ventanaModal_Informesubtema').modal('show');
    $('#idns').val(id);
     mostrarSubtema(id);
     
}
/////////////////////////////////////////////////////////////////////////7
function Mostrar_Estado(id){
    $('#ventanaestado').modal('show');
    $('#idInformeM').val(id);
}
//function CambiarEstado(cadena) {
    //$('#estadito').val(cadena);
    //$('#txtObservacion').show();
    //$('#tablaEstados').hide();
//}


/////////////////////////////////////////////////
$('#brnGuardarM').click(function name() {
     //alert("hola");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var FrmData = {
        id:             $('#idInformeM').val(),
        estadoInforme:  $('#estadito').val(),
        observacion:    $('#observacionM').val(),
    }
        
    $.ajax({
        url:'ModificarEstado/'+FrmData, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            //alert("Datos Modificados");
            mostrarInforme();
            $('#ventanaestado').modal('hide');
        },
        error: function(){
              alert("error"); 
            }
    });  
    
});