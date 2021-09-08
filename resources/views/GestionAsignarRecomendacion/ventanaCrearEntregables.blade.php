<form id="formregistromodal"  method="post" enctype="multipart/form-data"> 
              
      <div class="row">
    
    <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>   



       
    <div class="col-md-6">
    <div class="form-group has-feedback">
       <label for="documento">Documento:</label>
        <input type="text" class="form-control" name="documento" id="entregable_documento" placeholder="Ingrese la descripcion">
    </div>
    </div>
  

     <div class="col-md-6">
    <div class="form-group has-feedback">
        <label for="descripcionDocumento">Descripcion</label>
       <input type="text"  onkeypress="return soloLetras(event)" class="form-control" name="descripcionDocumento" id="entregable_descripcion" placeholder="Ingrese el porcentaje">
     
    </div>
    </div>
    
   <div class="col-md-6">
    <div class="form-group has-feedback">
             <label for="asunto">Asunto</label>
        <input type="text" onkeypress="return soloLetras(event)"  class="form-control" name="asunto" id="entregable_asunto" placeholder="Ingrese el estado">
   
    </div>  
    </div>
    
    <div class="col-md-6">
    <div class="form-group has-feedback">
        <label for="codigo">Codigo</label>
        <input type="text" onkeypress="return soloLetras(event)" class="form-control" name="codigo" id="entregable_codigo" placeholder="Ingrese la fecha">

    </div>  
    </div>

  <div class="col-md-6">
    <div class="form-group has-feedback">
        <label for="fechaCargo">Fecha</label>
        <input type="date" class="form-control" name="fechaCargo" id="entregable_fecha" placeholder="Ingrese la descripcion">

    </div>   
    </div>  

    <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">SALIR</button>
          <button type="button" class="btn btn-primary btn-sm" onclick="ingresarEntregables();">AGREGAR</button> 
    </div>
    
    <input type="hidden" name="_method" id="id_Tarea_entregable">

</div>
                
</form>
          
     