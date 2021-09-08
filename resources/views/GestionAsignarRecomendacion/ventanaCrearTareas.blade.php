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
       <label for="descripcionTarea">Descripcion</label>
        <input type="text" onkeypress="return soloLetras(event)" class="form-control" name="descripcionTarea" id="tarea_descripcionTarea" placeholder="Ingrese la descripcion"required>
    </div>
    </div>
  

      
    <div class="col-md-6">
    <div class="form-group has-feedback">
        <label for="fechaCreacion">Fecha Creación</label>
        <input type="date" class="form-control" name="fechaCreacion" id="tarea_fechaCreacion" placeholder="Ingrese la fecha"required>

    </div>  
    </div>

  <div class="col-md-6">
    <div class="form-group has-feedback">
        <label for="fechafinalizacion">Fecha Finalización</label>
        <input type="date" class="form-control" name="fechafinalizacion" id="tarea_fechafinalizacion" placeholder="Ingrese la descripcion">

    </div>   
    </div>  
    
    <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">SALIR</button>
          <button type="button" class="btn btn-primary btn-sm" onclick="ingresarTareas();">AGREGAR</button> 
        </div>

        
    <input type="hidden" name="_method" id="idEstrategia_Tarea">

</div>
                
</form>
          
     