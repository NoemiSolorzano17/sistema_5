

window.onload = function() {
    window.onload=
    //CargarEstados(),
    Recomendaciones_Usuario_Inasisteencia()
    
};

function Recomendaciones_Usuario_Inasisteencia() {


   
    var id = $('#idinasistenciausuario').val();
    var fila="";
    $('#tablausuario_reco').html('');
    

   $.get('MisRecomendaciones/'+id, function (data) { 
        $('#tablausuario_reco').html('');
        
        $.each(data.recomendaciones_usuarios, function(i, item) { //recorre el data 
            var fila="";
            fila+='<tr>';
            fila+='<td >'+ data.name+ ' ' +data.apellidos+ '</td>';
            fila+='<td style="text-align: justify">'+ item.recomendaciones_v2.descripcionRecomendacion + '</td>';
           //fila+='<td>'+ 1 + '</td>';
          fila+= "<td class='row'> <center> <button type='button' class='btn btn-info' onClick='Mostrar_Recomendacion_Estrategias("+item.id+")'>Inacistencia</button></td></tr>";
  //  
          fila+='</tr>';
          
            $('#tablausuario_reco').append(fila);

        });
    });
   
}