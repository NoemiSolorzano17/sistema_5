window.onload = function() {
    window.onload=
    //CargarEstados(),
    RecomendacionesUsuarioAsignar()
    
};

function RecomendacionesUsuarioAsignar() {
    var id = $('#iduser').val();
    var fila="";
    $('#tablaRecomendaciones').html('');
    

   $.get('MisRecomendaciones/'+id, function (data) { 
        $('#tablaRecomendaciones').html('');
        
        $.each(data.recomendaciones_usuarios, function(i, item) { //recorre el data 
            var fila="";
            fila+='<tr>';
            fila+='<td style="text-align: justify">'+ item.recomendaciones_v2.descripcionRecomendacion + '</td>';
            fila+='<td>'+ item.recomendaciones_v2.porcentajeCumplimiento + '</td>';
            fila+='<td>'+ item.recomendaciones_v2.estadoRecomendacion + '</td>';
           
          //  fila+='<td>'+ 1 + '</td>';
          fila+= "<td class='row'> <center> <button type='button' class='btn btn-info' onClick='Mostrar_Recomendacion_Estrategias("+item.id+")'>Estrategias</button></td></tr>";
  //  
          fila+='</tr>';
          
            $('#tablaRecomendaciones').append(fila);

        });
    });
   
}
/////////////////////////////////////////////////////////////////////////////////////////

     


function Mostrar_Recomendacion_Estrategias(id){
    $('#AgregarEstrategiasmodal').modal('show');
    $('#idEstrategiasReco').val(id);
    mostrarEstrategia(id);
    
          
}


